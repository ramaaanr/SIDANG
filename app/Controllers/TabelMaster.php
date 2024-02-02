<?php

namespace App\Controllers;

use App\Models\TabelProfile;
use App\Models\TabelKinerja;
use App\Models\TabelIndikator;
use App\Models\TabelProfilePegawai;
use App\Models\TabelAnggaranBidang;
use App\Models\TabelAnggaranDinas;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Config\Services;

class TabelMaster extends BaseController
{
    public function index()
    {
        // return view('layout/tabel-master');
    }

    public function getUserDivisi()
    {
        $session = Services::session();
        $user = $session->get('user');
        return json_encode($user["divisi"]);
    }
    //////////////////////////////////////// Start Of Profile Bidang ////////////////////////////////////////

    public function dataProfileBidang()
    {
        $request    = Services::request();
        $datatable  = new TabelProfile($request);
        $lists      = $datatable->getDatatables();
        $data       = [];
        $no         = $request->getPost('start');

        foreach ($lists as $list) {
            $row    = [];
            $row[]  = $list->id_bidang;
            $row[]  = $list->nama_bidang;
            $row[]  = $list->deskripsi_bidang;
            $row[]  = $list->foto;
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

    public function setDataInFormUbahProfile()
    {
        $request            = Services::request();
        $inidkator      = new TabelProfile($request);
        $post               = $this->request->getPost();

        $dataUbahProfile       = $inidkator->where('id_bidang', $post["id"])->first();

        $res["id_bidang"] = $post["id"];
        $res["nama_bidang"]      = $dataUbahProfile['nama_bidang'];
        $res["deskripsi_bidang"]   = $dataUbahProfile['deskripsi_bidang'];
        $res["foto"]   = $dataUbahProfile['foto'];

        return json_encode($res);
    }

    public function getNamaBidang($id)
    {
        $request            = Services::request();
        $inidkator      = new TabelProfile($request);

        $dataUbahProfile       = $inidkator->where('id_bidang', $id)->first();

        $res["nama_bidang"]      = $dataUbahProfile['nama_bidang'];

        return json_encode($res);
    }
    public function getProfileBidang()
    {
        $request            = Services::request();
        $inidkator      = new TabelProfile($request);

        $profiles     = $inidkator->findAll();
        $res = [];

        foreach ($profiles as $profile) {
            $res[] = [
                "id_bidang" => $profile['id_bidang'],
                "nama_bidang" => $profile['nama_bidang'],
                "deskripsi_bidang" => $profile['deskripsi_bidang'],
                "deskripsi_bidang" => $profile['deskripsi_bidang'],
                "foto" => $profile['foto'],
            ];
        }

        return json_encode($res);
    }
    public function getSemuaNamaBidang()
    {
        $data = [];
        try {
            $request            = Services::request();
            $inidkator      = new TabelProfile($request);

            $bidangs       = $inidkator->findAll();
            foreach ($bidangs as $bidang) {

                $data[] = [
                    "id_bidang" => $bidang['id_bidang'],
                    "nama_bidang" => $bidang['nama_bidang'],
                ];
            }
            $status = 'TRUE';
            $message = "Berhasil";
        } catch (\Throwable $th) {
            //throw
            $status = "FALSE";
            $message = $th->getMessage();
        }
        return json_encode([
            "status" => $status,
            "data" => $data,
            "message" => $message,
        ]);
    }

    public function ubah_Profile()
    {
        try {
            $request            = Services::request();
            $Profile      = new TabelProfile($request);
            $post               = $this->request->getPost();

            $file = $this->request->getFile('new_foto');
            if ($file->isValid()) {
                $extAllowed   = ['jpg', 'jpeg', 'png'];
                $maxSize      = 2 * 1024 * 1024; // 2MB

                $ext = $file->getClientExtension();
                $size = $file->getSize();

                // Validasi ekstensi
                if (!in_array($ext, $extAllowed)) {
                    throw new \Exception('Format Foto Salah, Harus jpg, jpeg, png.');
                }

                // Validasi ukuran file
                if ($size > $maxSize) {
                    throw new \Exception('Ukuran foto harus maksimal 2MB.');
                }

                $fileName  = $post["id_bidang"] . '.' . $ext;

                unlink(FCPATH . "assets/img/profil-bidang/" . $post['old_foto']);
                $file->move(FCPATH . 'assets/img/profil-bidang/', $fileName);

                // Hapus file lama
            } else {
                $fileName = $post['old_foto'];
            }

            $setUpdateProfile = [
                'nama_bidang'        => $post["nama_bidang"],
                'deskripsi_bidang'     => $post["deskripsi_bidang"],
                'foto' => $fileName,
            ];


            $updateProfile   = $Profile->set($setUpdateProfile)->where('id_bidang', $post["id_bidang"])->update();

            if ($updateProfile) {
                $res["status"] = TRUE;
                $res["res"]    = 'Update Data Berhasil';
            } else {
                $res["status"] = FALSE;
                $res["res"]    = 'Update Data Gagal';
                $res["msg"] = "";
            }
        } catch (\Throwable $th) {

            $res["status"] = FALSE;
            $res["res"]    = 'Update Data Gagal';
            $res["msg"] = $th->getMessage();
        }

        echo json_encode($res);
    }
    //////////////////////////////////////// End Of Profile Bidang ////////////////////////////////////////

    //////////////////////////////////////// Start Of Indikator Bidang ////////////////////////////////////////

    public function dataPegawaiDinas()
    {
        $request    = Services::request();
        $datatable  = new TabelProfilePegawai($request);
        $lists      = $datatable->getDatatables();
        $data       = [];
        $no         = $request->getPost('start');

        foreach ($lists as $list) {
            $row    = [];
            $row[]  = $list->nama;
            $row[]  = $list->nip;
            $row[]  = $list->jabatan;
            $row[]  = $list->divisi;
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
    public function simpan_ProfilePegawai()
    {
        $request            = Services::request();
        $tambahprofilePegawai = new TabelprofilePegawai($request);
        $post               = $this->request->getPost();
        if ($post["nama"] == NULL || $post["nip"] == NULL || $post["jabatan"] == NULL || $post["divisi"] == NULL) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Kolom Kosong';
            return json_encode($res);
        } else {
            $simpan = $tambahprofilePegawai->insert($post);
            $res["status"] = TRUE;
            echo json_encode($res);
        }
    }
    public function hapus_ProfilePegawai()
    {
        $request    = Services::request();
        $aggDinas   = new TabelProfilePegawai($request);

        $getDel     = $this->request->getPost('id');
        $deletedata = $aggDinas->where('nip', $getDel)->delete();

        if ($deletedata) {
            $res_had["status"]  = TRUE;
            $res_had["res"]     = 'Data Berhasil dihapus';
        } else {
            $res_had["status"]  = FALSE;
            $res_had["res"]     = 'Data Gagal dihapus';
        }
        echo json_encode($res_had);
    }
    public function setDataInFormUbahProfilePegawai()
    {
        $request            = Services::request();
        $inidkator      = new TabelProfilePegawai($request);
        $post               = $this->request->getPost();

        $dataUbahProfilePegawai       = $inidkator->where('nip', $post["id"])->first();
        $res["nama"]      = $dataUbahProfilePegawai['nama'];
        $res["nip"]   = $dataUbahProfilePegawai['nip'];
        $res["jabatan"]       = $dataUbahProfilePegawai['jabatan'];
        $res["divisi"]  = $dataUbahProfilePegawai['divisi'];

        return json_encode($res);
    }
    public function ubah_ProfilePegawai()
    {
        $request            = Services::request();
        $ProfilePegawai      = new TabelProfilePegawai($request);
        $post               = $this->request->getPost();

        $setUpdateProfilePegawai = [
            'nama'        => $post["nama"],
            'nip'     => $post["nip"],
            'jabatan'         => $post["jabatan"],
            'divisi'    => $post["divisi"],
        ];

        $updateProfilePegawai   = $ProfilePegawai->set($setUpdateProfilePegawai)->where('nip', $post["id"])->update();

        if ($updateProfilePegawai) {
            $res["status"] = TRUE;
            $res["res"]    = 'Update Data Berhasil';
        } else {
            $res["status"] = FALSE;
            $res["res"]    = 'Update Data Berhasil';
        }

        echo json_encode($res);
    }

    //////////////////////////////////////// End Of Pegawai Dinas ////////////////////////////////////////

    //////////////////////////////////////// Start Of Kinerja DInas ////////////////////////////////////////

    public function dataKinerjaDinas()
    {
        $request    = Services::request();
        $datatable  = new TabelKinerja($request);
        $lists      = $datatable->getDatatables();
        $data       = [];
        $no         = $request->getPost('start');

        foreach ($lists as $list) {
            $row    = [];
            $row[]  = $list->nama_pencapaian;
            $row[]  = $list->deskripsi_pencapaian;
            $row[]  = $list->nilai_pencapaian;
            $row[]  = $list->tahun_pencapaian;
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
    public function simpan_Kinerja()
    {
        $request            = Services::request();
        $tambahKinerja = new TabelKinerja($request);
        $post               = $this->request->getPost();
        if ($post["nama_pencapaian"] == NULL || $post["deskripsi_pencapaian"] == NULL || $post["nilai_pencapaian"] == NULL || $post["tahun_pencapaian"] == NULL) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Kolom Kosong';
            return json_encode($res);
        } else {
            $simpan = $tambahKinerja->insert($post);
            $res["status"] = TRUE;
            echo json_encode($res);
        }
    }
    public function hapus_Kinerja()
    {
        $request    = Services::request();
        $aggDinas   = new TabelKinerja($request);

        $getDel     = $this->request->getPost('id');
        $deletedata = $aggDinas->where('nama_pencapaian', $getDel)->delete();

        if ($deletedata) {
            $res_had["status"]  = TRUE;
            $res_had["res"]     = 'Data Berhasil dihapus';
        } else {
            $res_had["status"]  = FALSE;
            $res_had["res"]     = 'Data Gagal dihapus';
        }
        echo json_encode($res_had);
    }
    public function setDataInFormUbahKinerja()
    {
        $request            = Services::request();
        $inidkator      = new TabelKinerja($request);
        $post               = $this->request->getPost();

        $dataUbahKinerja       = $inidkator->where('nama_pencapaian', $post["id"])->first();

        $res["nama_pencapaian"]      = $dataUbahKinerja['nama_pencapaian'];
        $res["deskripsi_pencapaian"]   = $dataUbahKinerja['deskripsi_pencapaian'];
        $res["nilai_pencapaian"]       = $dataUbahKinerja['nilai_pencapaian'];
        $res["tahun_pencapaian"]  = $dataUbahKinerja['tahun_pencapaian'];

        return json_encode($res);
    }
    public function ubah_Kinerja()
    {
        $request            = Services::request();
        $Kinerja      = new TabelKinerja($request);
        $post               = $this->request->getPost();
        $nilai_pencapaian = $post["nilai_pencapaian"];

        if ($nilai_pencapaian >= 0 && $nilai_pencapaian <= 100) {

            $setUpdateKinerja = [
                'nama_pencapaian'        => $post["nama_pencapaian"],
                'deskripsi_pencapaian'     => $post["deskripsi_pencapaian"],
                'nilai_pencapaian'         => $post["nilai_pencapaian"],
                'tahun_pencapaian'    => $post["tahun_pencapaian"],
            ];

            $updateKinerja   = $Kinerja->set($setUpdateKinerja)->where('nama_pencapaian', $post["id"])->update();

            if ($updateKinerja) {
                $res["status"] = TRUE;
                $res["res"]    = 'Update Data Berhasil';
            } else {
                $res["status"] = FALSE;
                $res["res"]    = 'Update Data Gagal';
            }
        } else {
            $res["status"] = FALSE;
            $res["res"]    = 'Nilai pencapaian tidak boleh kurang dari 0 atau lebih dari 100';
        }

        echo json_encode($res);
    }
    //////////////////////////////////////// End Of Kinerja Dinas ////////////////////////////////////////

    //////////////////////////////////////// Start Of Kinerja Bidang ////////////////////////////////////////

    public function dataIndikatorBidang()
    {
        $request    = Services::request();
        $datatable  = new TabelIndikator($request);

        $post               = $this->request->getPost();
        if (isset($post['data_bidang'])) {
            $session = Services::session();
            $user = $session->get('user');
            $divisi = ($user["divisi"]);
            $lists      = $datatable->where('divisi_indikator', $divisi)->get()->getResult();
        } else {
            $lists      = $datatable->getDatatables();
        }
        $data       = [];
        $no         = $request->getPost('start');



        foreach ($lists as $list) {
            $no++;
            $row    = [];
            $row[]  = $no;
            $row[]  = $list->indikator_dinas;
            $row[]  = $list->divisi_indikator;
            $row[]  = $list->target_indikator;
            $row[]  = $list->triwulan_1;
            $row[]  = $list->triwulan_2;
            $row[]  = $list->triwulan_3;
            $row[]  = $list->triwulan_4;
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

    public function simpan_Indikator()
    {
        $request            = Services::request();
        $tambahIndikator = new TabelIndikator($request);
        $post               = $this->request->getPost();
        if ($post["indikator_dinas"] == NULL || $post["divisi_indikator"] == NULL || $post["target_indikator"] == NULL || $post["triwulan_1"] == NULL || $post["triwulan_2"] == NULL || $post["triwulan_3"] == NULL || $post["triwulan_4"] == NULL) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Kolom Kosong';
        } else if ($post["target_indikator"] < ($post["triwulan_1"] + $post["triwulan_2"] + $post["triwulan_3"] + $post["triwulan_4"])) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Realisasi Melebihi Pagu Anggaran';
        } else if ($post['target_indikator'] < 0 || $post['triwulan_1'] < 0 || $post['triwulan_2'] < 0 || $post['triwulan_3'] < 0 || $post['triwulan_4'] < 0) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Pagu dan realisasi triwulan tidak boleh kurang dari 0';
        } else {
            $simpan = $tambahIndikator->insert($post);
            $res["status"] = TRUE;
        }
        return json_encode($res);
    }
    public function hapus_Indikator()
    {
        $request    = Services::request();
        $aggDinas   = new TabelIndikator($request);

        $getDel     = $this->request->getPost('id');
        $deletedata = $aggDinas->where('indikator_dinas', $getDel)->delete();

        if ($deletedata) {
            $res_had["status"]  = TRUE;
            $res_had["res"]     = 'Data Berhasil dihapus';
        } else {
            $res_had["status"]  = FALSE;
            $res_had["res"]     = 'Data Gagal dihapus';
        }
        echo json_encode($res_had);
    }
    public function setDataInFormUbahIndikator()
    {
        $request            = Services::request();
        $inidkator      = new TabelIndikator($request);
        $post               = $this->request->getPost();

        $dataUbahIndikator       = $inidkator->where('indikator_dinas', $post["id"])->first();

        $res["indikator_dinas"]      = $dataUbahIndikator['indikator_dinas'];
        $res["divisi_indikator"]   = $dataUbahIndikator['divisi_indikator'];
        $res["target_indikator"]       = $dataUbahIndikator['target_indikator'];
        $res["triwulan_1"]  = $dataUbahIndikator['triwulan_1'];
        $res["triwulan_2"]  = $dataUbahIndikator['triwulan_2'];
        $res["triwulan_3"]  = $dataUbahIndikator['triwulan_3'];
        $res["triwulan_4"]  = $dataUbahIndikator['triwulan_4'];

        return json_encode($res);
    }
    public function ubah_Indikator()
    {
        try {
            //code...
            $request            = Services::request();
            $Indikator      = new TabelIndikator($request);
            $post               = $this->request->getPost();

            if ($post["target_indikator"] < ($post["triwulan_1"] + $post["triwulan_2"] + $post["triwulan_3"] + $post["triwulan_4"])) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Realisasi Melebihi Pagu Anggaran';
            } else if ($post['target_indikator'] < 0 || $post['triwulan_1'] < 0 || $post['triwulan_2'] < 0 || $post['triwulan_3'] < 0 || $post['triwulan_4'] < 0) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Pagu dan realisasi triwulan tidak boleh kurang dari 0';
            } else {
                $setUpdateIndikator = [
                    'indikator_dinas'        => $post["indikator_dinas"],
                    'divisi_indikator'     => $post["divisi_indikator"],
                    'target_indikator'         => $post["target_indikator"],
                    'triwulan_1'    => $post["triwulan_1"],
                    'triwulan_2'    => $post["triwulan_2"],
                    'triwulan_3'    => $post["triwulan_3"],
                    'triwulan_4'    => $post["triwulan_4"],
                ];

                $updateIndikator   = $Indikator->set($setUpdateIndikator)->where('indikator_dinas', $post["id"])->update();

                if ($updateIndikator) {
                    $res["status"] = TRUE;
                    $res["res"]    = 'Update Data Berhasil';
                } else {
                    $res["status"] = FALSE;
                    $res["res"]    = 'Update Data Berhasil';
                }
            }
        } catch (\Exception $e) {
            http_response_code(400);
            $res["status"] = FALSE;
            $res["res"]    = $e->getMessage();
        }

        echo json_encode($res);
    }

    //////////////////////////////////////// End Of Indikator Bidang ////////////////////////////////////////

    //////////////////////////////////////// Start Of Anggaran Dinas ////////////////////////////////////////

    public function dataAnggaranDinas()
    {
        $request    = Services::request();
        $datatable  = new TabelAnggaranDinas($request);
        $lists      = $datatable->getDatatables();
        $data       = [];
        $no         = $request->getPost('start');

        foreach ($lists as $list) {
            $row    = [];
            $row[]  = $list->tahun_ag_dinas;
            $row[]  = $list->pagu_dinas;
            $row[]  = $list->realisasi_dinas_tw1;
            $row[]  = $list->realisasi_dinas_tw2;
            $row[]  = $list->realisasi_dinas_tw3;
            $row[]  = $list->realisasi_dinas_tw4;
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

    public function hapus_anggaranDinas()
    {
        $request    = Services::request();
        $aggDinas   = new TabelAnggaranDinas($request);

        $getDel     = $this->request->getPost('tahun_ag_dinas');
        $deletedata = $aggDinas->where('tahun_ag_dinas', $getDel)->delete();

        if ($deletedata) {
            $res_had["status"]  = TRUE;
            $res_had["res"]     = 'Data Berhasil dihapus';
        } else {
            $res_had["status"]  = FALSE;
            $res_had["res"]     = 'Data Gagal dihapus';
        }
        echo json_encode($res_had);
    }

    public function simpan_anggaranDinas()
    {
        $request            = Services::request();
        $tambahAnggaranDinas = new TabelAnggaranDinas($request);
        $post               = $this->request->getPost();
        try {
            if ($post["tahun_ag_dinas"] == NULL || $post["pagu_dinas"] == NULL) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Isi Kolom Kosong';
            } else if ($post["pagu_dinas"] < ($post["realisasi_dinas_tw1"] + $post["realisasi_dinas_tw2"] + $post["realisasi_dinas_tw3"] + $post["realisasi_dinas_tw4"])) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Realisasi Melebihi Pagu Anggaran';
            } else if ($post['pagu_dinas'] < 0 || $post['realisasi_dinas_tw1'] < 0 || $post['realisasi_dinas_tw2'] < 0 || $post['realisasi_dinas_tw3'] < 0 || $post['realisasi_dinas_tw4'] < 0) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Pagu dan realisasi triwulan tidak boleh kurang dari 0';
            } else {
                $simpan = $tambahAnggaranDinas->insert($post);
                $res["status"] = TRUE;
            }
            return json_encode($res);
        } catch (DatabaseException $e) {
            $res["status"] = FALSE;
            $res["res"] = "Tahun Anggaran " . $post["tahun_ag_dinas"] . " Sudah Diinput";
            return json_encode($res);
        } catch (\Throwable $th) {
            $res["status"] = FALSE;
            $res["res"] = $th->getMessage();
            return json_encode($res);
        }
    }

    public function setDataInFormUbahAnggaran()
    {
        $request            = Services::request();
        $anggaranDinas      = new TabelAnggaranDinas($request);
        $post               = $this->request->getPost();

        $dataUbahAnggaran       = $anggaranDinas->where('tahun_ag_dinas', $post["tahu_ag_dinas"])->first();

        $res["tahun_ag_dinas"]      = $dataUbahAnggaran['tahun_ag_dinas'];
        $res["pagu_dinas"]   = $dataUbahAnggaran['pagu_dinas'];
        $res["realisasi_dinas_tw1"]       = $dataUbahAnggaran['realisasi_dinas_tw1'];
        $res["realisasi_dinas_tw2"]       = $dataUbahAnggaran['realisasi_dinas_tw2'];
        $res["realisasi_dinas_tw3"]       = $dataUbahAnggaran['realisasi_dinas_tw3'];
        $res["realisasi_dinas_tw4"]       = $dataUbahAnggaran['realisasi_dinas_tw4'];

        return json_encode($res);
    }

    public function ubah_anggaranDinas()
    {
        try {
            $request            = Services::request();
            $anggaranDinas      = new TabelAnggaranDinas($request);
            $post               = $this->request->getPost();



            if ($post["pagu_dinas"] < ($post["realisasi_dinas_tw1"] + $post["realisasi_dinas_tw2"] + $post["realisasi_dinas_tw3"] + $post["realisasi_dinas_tw4"])) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Realisasi Melebihi Pagu Anggaran';
                return json_encode($res);
            }

            if ($post['pagu_dinas'] < 0 || $post['realisasi_dinas_tw1'] < 0 || $post['realisasi_dinas_tw2'] < 0 || $post['realisasi_dinas_tw3'] < 0 || $post['realisasi_dinas_tw4'] < 0) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Pagu dan realisasi triwulan tidak boleh kurang dari 0';
                return json_encode($res);
            }

            if ($post["tahun_ag_dinas"] == NULL || $post["pagu_dinas"] == NULL) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Isi Kolom Kosong';
                return json_encode($res);
            }

            $setUpdateAnggaranDinas = [
                'tahun_ag_dinas'        => $post["tahun_ag_dinas"],
                'pagu_dinas'     => $post["pagu_dinas"],
                'realisasi_dinas_tw1'         => $post["realisasi_dinas_tw1"],
                'realisasi_dinas_tw2'         => $post["realisasi_dinas_tw2"],
                'realisasi_dinas_tw3'         => $post["realisasi_dinas_tw3"],
                'realisasi_dinas_tw4'         => $post["realisasi_dinas_tw4"],
            ];

            $updateAnggaranDinas   = $anggaranDinas->set($setUpdateAnggaranDinas)->where('tahun_ag_dinas', $post["tahun_ag_dinas"])->update();

            if ($updateAnggaranDinas) {
                $res["status"] = TRUE;
                $res["res"]    = 'Update Data Berhasil';
            } else {
                $res["status"] = FALSE;
                $res["res"]    = 'Update Data Berhasil';
            }

            echo json_encode($res);
        } catch (DatabaseException $e) {
            $res["status"] = FALSE;
            $res["res"]    = 'Tahun Sudah Diinput';
        } catch (\Throwable $th) {
            $res["status"] = FALSE;
            $res["res"]    = $th->getMessage();
        }
    }

    //////////////////////////////////////// End Of Anggaran Dinas ////////////////////////////////////////

    //////////////////////////////////////// Start Of Anggaran Bidang ////////////////////////////////////////

    public function dataAnggaranBidang()
    {
        try {
            $request    = Services::request();
            $datatable  = new TabelAnggaranBidang($request);

            $post               = $this->request->getPost();
            if (isset($post['data_bidang'])) {
                $session = Services::session();
                $user = $session->get('user');
                $divisi = ($user["divisi"]);
                $lists      = $datatable->where('id_bidang', $divisi)->get()->getResult();
            } else {
                $lists      = $datatable->getDatatables();
            }
            $data       = [];
            // // $no         = $request->getPost('start');

            foreach ($lists as $list) {
                $row    = [];
                $row[]  = $list->id_ag;
                $row[]  = $list->id_bidang;
                $row[]  = $list->tahun;
                $row[]  = $list->pagu_bidang;
                $row[]  = $list->realisasi_tw1;
                $row[]  = $list->realisasi_tw2;
                $row[]  = $list->realisasi_tw3;
                $row[]  = $list->realisasi_tw4;
                $data[] = $row;
            }

            $output = [
                'draw'            => $request->getPost('draw'),
                'recordsTotal'    => $datatable->countAll(),
                'recordsFiltered' => $datatable->countFiltered(),
                'data'            => $data
            ];
        } catch (\Throwable $th) {
            //throw $th;
            $output = [
                'status' => 'error',
                'message' => $th->getMessage(),
                'res' => $divisi,
            ];
        }

        return json_encode($output);
    }

    public function setDataInFormUbahAnggaranBidang()
    {
        $request            = Services::request();
        $anggaranDinas      = new TabelAnggaranBidang($request);
        $post               = $this->request->getPost();

        $dataUbahAnggaran       = $anggaranDinas->where('id_ag', $post["id"])->first();

        $res["id_ag"]      = $dataUbahAnggaran['id_ag'];
        $res["tahun"]   = $dataUbahAnggaran['tahun'];
        $res["id_bidang"]       = $dataUbahAnggaran['id_bidang'];
        $res["pagu_bidang"]       = $dataUbahAnggaran['pagu_bidang'];
        $res["realisasi_tw1"]  = $dataUbahAnggaran['realisasi_tw1'];
        $res["realisasi_tw2"]  = $dataUbahAnggaran['realisasi_tw2'];
        $res["realisasi_tw3"]  = $dataUbahAnggaran['realisasi_tw3'];
        $res["realisasi_tw4"]  = $dataUbahAnggaran['realisasi_tw4'];

        return json_encode($res);
    }

    public function hapus_anggaranBidang()
    {
        $request    = Services::request();
        $aggDinas   = new TabelAnggaranBidang($request);

        $getDel     = $this->request->getPost('id');
        $deletedata = $aggDinas->where('id_ag', $getDel)->delete();

        if ($deletedata) {
            $res_had["status"]  = TRUE;
            $res_had["res"]     = 'Data Berhasil dihapus';
        } else {
            $res_had["status"]  = FALSE;
            $res_had["res"]     = 'Data Gagal dihapus';
        }
        echo json_encode($res_had);
    }

    public function simpan_anggaranBidang()
    {
        $request            = Services::request();
        $tambahAnggaranBidang = new TabelAnggaranBidang($request);
        $post               = $this->request->getPost();
        if ($post["tahun"] == NULL || $post["id_bidang"] == NULL || $post["pagu_bidang"] == NULL) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Kolom Kosong';
        } else if ($post["pagu_bidang"] < ($post["realisasi_tw1"] + $post["realisasi_tw2"] + $post["realisasi_tw3"] + $post["realisasi_tw4"])) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Realisasi Melebihi Pagu Anggaran';
        } else if ($post['pagu_bidang'] < 0 || $post['realisasi_tw1'] < 0 || $post['realisasi_tw2'] < 0 || $post['realisasi_tw3'] < 0 || $post['realisasi_tw4'] < 0) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Pagu dan realisasi triwulan tidak boleh kurang dari 0';
        } else {
            $cekBidang = $tambahAnggaranBidang->where('id_bidang', $post["id_bidang"])->first();
            $cekTahun = $tambahAnggaranBidang->where('tahun', $post["tahun"])->first();
            if ($cekTahun != null && $cekBidang != null) {
                $res["status"] = FALSE;
                $res["res"] = "Anggaran Bidang Tahunan sudah diinput";
                return json_encode($res);
            }
            $simpan = $tambahAnggaranBidang->insert($post);
            $res["status"] = TRUE;
        }
        return json_encode($res);
    }
    public function ubah_anggaranBidang()
    {
        try {
            $request            = Services::request();
            $anggaranBidang      = new TabelAnggaranBidang($request);
            $post               = $this->request->getPost();


            if ($post["pagu_bidang"] < ($post["realisasi_tw1"] + $post["realisasi_tw2"] + $post["realisasi_tw3"] + $post["realisasi_tw4"])) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Realisasi Melebihi Pagu Anggaran';
                return json_encode($res);
            }

            if ($post['pagu_bidang'] < 0 || $post['realisasi_tw1'] < 0 || $post['realisasi_tw2'] < 0 || $post['realisasi_tw3'] < 0 || $post['realisasi_tw4'] < 0) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Pagu dan realisasi triwulan tidak boleh kurang dari 0';
                return json_encode($res);
            }

            if ($post["tahun"] == NULL || $post["id_bidang"] == NULL || $post["pagu_bidang"] == NULL) {
                $res["status"]  = FALSE;
                $res["res"]     = 'Isi Kolom Kosong';
                return json_encode($res);
            }

            $setUpdateAnggaranBidang = [
                'id_bidang'        => $post["id_bidang"],
                'tahun'         => $post["tahun"],
                'pagu_bidang'    => $post["pagu_bidang"],
                'realisasi_tw1'    => $post["realisasi_tw1"],
                'realisasi_tw2'                 => $post["realisasi_tw2"],
                'realisasi_tw3'                 => $post["realisasi_tw3"],
                'realisasi_tw4'                 => $post["realisasi_tw4"],
            ];

            $updateAnggaranBidang   = $anggaranBidang->set($setUpdateAnggaranBidang)->where('id_ag', $post["id"])->update();

            if ($updateAnggaranBidang) {
                $res["status"] = TRUE;
                $res["res"]    = 'Update Data Berhasil';
                $res["data"] = $setUpdateAnggaranBidang;
            } else {
                $res["status"] = FALSE;
                $res["res"]    = 'Update Data Berhasil';
            }
        } catch (\Throwable $th) {
            $res["status"] = FALSE;
            $res["res"]    = $th->getMessage();
        }

        echo json_encode($res);
    }

    /////////////////////////////////////// End Of Anggaran Bidang ////////////////////////////////////////


}
