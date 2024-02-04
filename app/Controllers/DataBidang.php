<?php

namespace App\Controllers;

use App\Models\TabelDataBidang;

use Config\Services;

class DataBidang extends BaseController
{
    public function index()
    {
        $session = Services::session();
        if (!$session->get('user')) {
            // Redirect ke halaman login jika tidak ada sesi login
            return redirect()->to(base_url('login'));
        }
        return view('layout/tabel-master-data-bidang');
    }

    //////////////////////////////////////// Start Of Anggaran Bidang ////////////////////////////////////////
    public function unduhLampiran($fileName, $deskData)
    {
        // Sesuaikan dengan direktori penyimpanan file Anda
        $fileDirectory = WRITEPATH . 'uploads/';

        // Pastikan file ada sebelum mencoba mengunduh
        if (file_exists($fileDirectory . $fileName)) {
            // Lakukan unduhan file

            $formatedDeskData = substr($deskData, 0, 30);
            return $this->response->download($fileDirectory . $fileName, null)->setFileName($formatedDeskData);
        } else {
            // File tidak ditemukan
            return redirect()->to(base_url())->with('error', 'File tidak ditemukan.');
        }
    }
    public function dataDataBidang()
    {
        $request    = Services::request();
        $datatableRaw  = new TabelDataBidang($request);
        $session = Services::session();

        $divisiName     = $session->get('user')['divisi'];
        $datatable  = $datatableRaw->where('nm_bidang', $divisiName);
        $lists      = $datatable->getDatatables();
        $data       = [];
        $no         = $request->getPost('start');

        foreach ($lists as $list) {
            $row    = [];
            $row[]  = $list->id_bidang;
            $row[]  = $list->nm_bidang;
            $row[]  = $list->desk_data;
            $row[]  = $list->target_bidang;
            $row[]  = $list->realisasi_bidang;
            $row[]  = $list->lampiran_bidang;
            $row[]  = $list->updated;
            $data[] = $row;
        }

        $output = [
            'draw'            => $request->getPost('draw'),
            'recordsTotal'    => $datatable->countAll(),
            'recordsFiltered' => $datatable->countFiltered(),
            'data'            => $data
        ];

        return json_encode($output);
    }
    public function dataDataBidangSpec($divisiId)
    {
        $request    = Services::request();
        $datatableRaw  = new TabelDataBidang($request);

        $datatable  = $datatableRaw->where('nm_bidang', $divisiId);
        $lists      = $datatable->getDatatables();
        $data       = [];
        $no         = $request->getPost('start');

        foreach ($lists as $list) {
            $row    = [];
            $row[]  = $list->id_bidang;
            $row[]  = $list->nm_bidang;
            $row[]  = $list->desk_data;
            $row[]  = $list->target_bidang;
            $row[]  = $list->realisasi_bidang;
            $row[]  = $list->lampiran_bidang;
            $row[]  = $list->updated;
            $data[] = $row;
        }

        $output = [
            'draw'            => $request->getPost('draw'),
            'recordsTotal'    => $datatable->countAll(),
            'recordsFiltered' => $datatable->countFiltered(),
            'data'            => $data
        ];

        return json_encode($output);
    }
    public function setDataInFormUbahDataBidang()
    {
        try {
            $request            = Services::request();
            $dataBidang      = new TabelDataBidang($request);
            $post               = $this->request->getPost();

            $dataUbahBidang       = $dataBidang->where('id_bidang', $post["id"])->first();

            $response["status"] = "success";
            $res["id_bidang"] = $dataUbahBidang['id_bidang'];
            $res["desk_data"] = $dataUbahBidang['desk_data'];
            $res["target_bidang"] = $dataUbahBidang['target_bidang'];
            $res["realisasi_bidang"] = $dataUbahBidang['realisasi_bidang'];
            $res["lampiran_bidang"] = $dataUbahBidang['lampiran_bidang'];
        } catch (\Exception $e) {
            $response["status"] = "error";
            $response["msg"] = $e->getMessage();
        }
        return json_encode($res);
    }

    public function hapus_dataBidang()
    {
        try {
            $request    = Services::request();
            $aggDinas   = new TabelDataBidang($request);

            $getDel     = $this->request->getPost('id');

            $getData = $aggDinas->where('id_bidang', $getDel)->first();

            $fileDirectory = WRITEPATH . 'uploads/';
            $fileName = $getData['lampiran_bidang'];

            if (file_exists($fileDirectory . $fileName)) {
                unlink(WRITEPATH . "uploads/" . $fileName);
            }
            $deletedata = $aggDinas->where('id_bidang', $getDel)->delete();
            if ($deletedata) {
                $res_had["status"]  = TRUE;
                $res_had["res"]     = 'Data Berhasil dihapus';
                $res_had["data"]     = $getData['lampiran_bidang'];
            } else {
                $res_had["status"]  = FALSE;
                $res_had["res"]     = 'Data Gagal dihapus';
            }
        } catch (\Exception $e) {
            $res_had["status"]  = FALSE;
            $res_had["res"]     = 'Data Gagal dihapus';
            $res_had["msg"]     = $e->getMessage();
        }
        echo json_encode($res_had);
    }

    public function simpan_dataBidang()
    {
        try {
            $request            = Services::request();
            $tambahDataBidang = new TabelDataBidang($request);
            $post               = $this->request->getPost();
            if ($post["desk_data"] == NULL) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Isi Kolom Kosong';
            } else if ($post['target_bidang'] < $post['realisasi_bidang']) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Realisasi bidang tidak boleh lebih dari target bidang';
            } else if ($post['target_bidang'] < 0 || 0 > $post['realisasi_bidang']) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Realisasi bidang tidak boleh kurang dari 0';
            } else {
                $session = Services::session();
                $divisiName     = $session->get('user')['divisi'];
                $file = $this->request->getFile('lampiran_bidang');

                if ($file->isValid()) {
                    $extAllowedImages   = ['jpg', 'jpeg', 'png'];
                    $extAllowedVideos   = ['mp4', 'wav'];
                    $extAllowedDocs   = ['docx', 'doc', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx'];

                    $ext = $file->getClientExtension();
                    $size = $file->getSize();

                    // Validasi ekstensi
                    if (in_array($ext, $extAllowedImages)) {
                        // Validasi ukuran file
                        $maxSize      = 2 * 1024 * 1024; // 2MB
                        if ($size > $maxSize) {
                            throw new \Exception('Ukuran foto harus maksimal 2MB.');
                        }
                    } else if (in_array($ext, $extAllowedVideos)) {
                        // Validasi ukuran file
                        $maxSize      = 50 * 1024 * 1024; // 2MB
                        if ($size > $maxSize) {
                            throw new \Exception('Ukuran video harus maksimal 50MB.');
                        }
                    } else if (in_array($ext, $extAllowedDocs)) {
                        // Validasi ukuran file
                        $maxSize      = 50 * 1024 * 1024; // 2MB
                        if ($size > $maxSize) {
                            throw new \Exception('Ukuran berkas harus maksimal 50MB.');
                        }
                    } else {
                        throw new \Exception('Berkas Salah, tidak sesuai ketentuan format');
                    }

                    $hash = md5(uniqid() . time());
                    $ext = $file->getClientExtension();
                    $fileName = $hash . '_' . $divisiName . '.' . $ext;
                    $file->move(WRITEPATH . 'uploads', $fileName);

                    // unlink(FCPATH . "assets/img/profil-bidang/" . $post['old_foto']);
                    // $file->move(FCPATH . 'assets/img/profil-bidang/', $fileName);

                    $data = [
                        "nm_bidang" => $divisiName,
                        "desk_data" => $post["desk_data"],
                        "target_bidang" => $post["target_bidang"],
                        "realisasi_bidang" => $post["realisasi_bidang"],
                        "lampiran_bidang" => $fileName,
                    ];
                    $simpan = $tambahDataBidang->insert($data);
                    $response = [
                        'msg' => 'Data berhasil disimpan',
                        'data' => $data,
                    ];
                    if ($simpan) {
                        $res["status"] = TRUE;
                        $res["res"] = $response;
                    } else {
                        $res["status"] = FALSE;
                        $res["res"] = 'Gagal menyimpan data';
                    }
                } else {
                    $res["status"] = FALSE;
                    $res["res"] = 'Isi file terlebih dahulu';
                }
            }
        } catch (\Exception $e) {
            $res["status"]  = FALSE;
            $res["res"]     = $e->getMessage();
        }
        echo json_encode($res);
    }


    public function ubah_dataBidang()
    {
        try {
            $request            = Services::request();
            $dataBidang      = new TabelDataBidang($request);
            $post               = $this->request->getPost();


            if ($post["desk_data"] == NULL) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Isi Kolom Kosong';
                return json_encode($res);
            } else if ($post['target_bidang'] < $post['realisasi_bidang']) {
                throw new \Exception('Realisasi bidang tidak boleh lebih dari target bidang');
            } else if ($post['target_bidang'] < 0 || 0 > $post['realisasi_bidang']) {
                throw new \Exception('Realisasi bidang tidak boleh kurang dari 0');
            }

            $session = Services::session();
            $divisiName     = $session->get('user')['divisi'];
            $file = $this->request->getFile('new_lampiran_bidang');
            if ($file->isValid()) {
                $extAllowedImages   = ['jpg', 'jpeg', 'png'];
                $extAllowedVideos   = ['mp4', 'wav'];
                $extAllowedDocs   = ['docx', 'doc', 'pdf', 'xls', 'xlsx', 'ppt', 'pptx'];

                $ext = $file->getClientExtension();
                $size = $file->getSize();

                // Validasi ekstensi
                if (in_array($ext, $extAllowedImages)) {
                    // Validasi ukuran file
                    $maxSize      = 2 * 1024 * 1024; // 2MB
                    if ($size > $maxSize) {
                        throw new \Exception('Ukuran foto harus maksimal 2MB.');
                    }
                } else if (in_array($ext, $extAllowedVideos)) {
                    // Validasi ukuran file
                    $maxSize      = 50 * 1024 * 1024; // 2MB
                    if ($size > $maxSize) {
                        throw new \Exception('Ukuran video harus maksimal 50MB.');
                    }
                } else if (in_array($ext, $extAllowedDocs)) {
                    // Validasi ukuran file
                    $maxSize      = 50 * 1024 * 1024; // 2MB
                    if ($size > $maxSize) {
                        throw new \Exception('Ukuran berkas harus maksimal 50MB.');
                    }
                } else {
                    throw new \Exception('Berkas Salah, tidak sesuai ketentuan format');
                }

                $hash = md5(uniqid() . time());
                $ext = $file->getClientExtension();
                $fileName = $hash . '_' . $divisiName . '.' . $ext;
                $file->move(WRITEPATH . 'uploads', $fileName);
                unlink(WRITEPATH . "uploads/" . $post['old_lampiran_bidang']);
            } else {
                $fileName = $post['old_lampiran_bidang'];
            }

            $setUpdateDataBidang = [
                'desk_data'         => $post["desk_data"],
                'target_bidang'    => $post["target_bidang"],
                'realisasi_bidang'                 => $post["realisasi_bidang"],
                'lampiran_bidang'                 => $fileName,
            ];

            $updateDataBidang   = $dataBidang->set($setUpdateDataBidang)->where('id_bidang', $post["id_bidang"])->update();

            if ($updateDataBidang) {
                $res["status"] = TRUE;
                $res["res"]    = 'Update Data Berhasil';
                $res["data"] = $setUpdateDataBidang;
            } else {
                $res["status"] = FALSE;
                $res["res"]    = 'Update Data Gagal';
            }

            echo json_encode($res);
        } catch (\Exception $e) {
            $res["status"] = FALSE;
            $res["res"]    = 'Update Data Gagal';
            $res['msg'] = $e->getMessage();
            echo json_encode($res);
        }
    }

    /////////////////////////////////////// End Of Anggaran Bidang ////////////////////////////////////////


}
