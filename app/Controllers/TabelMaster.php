<?php

namespace App\Controllers;

use App\Models\TabelProfile;
use App\Models\TabelKinerja;
use App\Models\TabelIndikator;
use App\Models\TabelProfilePegawai;
use App\Models\TabelAnggaranBidang;
use App\Models\TabelAnggaranDinas;

use Config\Services;

class TabelMaster extends BaseController
{
    public function index()
    {
        // return view('layout/tabel-master');
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
            $row[]  = $list->nama_bidang;
            $row[]  = $list->deskripsi_bidang;
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
    public function simpan_Profile()
    {
        $request            = Services::request();
        $tambahprofile = new Tabelprofile($request);
        $post               = $this->request->getPost();
        if ($post["nama_bidang"] == NULL || $post["deskripsi_bidang"] == NULL) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Kolom Kosong';
            return json_encode($res);
        } else {
            $simpan = $tambahprofile->insert($post);
            $res["status"] = TRUE;
            echo json_encode($res);
        }
    }
    public function hapus_Profile()
    {
        $request    = Services::request();
        $aggDinas   = new TabelProfile($request);

        $getDel     = $this->request->getPost('id');
        $deletedata = $aggDinas->where('nama_bidang', $getDel)->delete();

        if ($deletedata) {
            $res_had["status"]  = TRUE;
            $res_had["res"]     = 'Data Berhasil dihapus';
        } else {
            $res_had["status"]  = FALSE;
            $res_had["res"]     = 'Data Gagal dihapus';
        }
        echo json_encode($res_had);
    }
    public function setDataInFormUbahProfile()
    {
        $request            = Services::request();
        $inidkator      = new TabelProfile($request);
        $post               = $this->request->getPost();

        $dataUbahProfile       = $inidkator->where('nama_bidang', $post["id"])->first();

        $res["nama_bidang"]      = $dataUbahProfile['nama_bidang'];
        $res["deskripsi_bidang"]   = $dataUbahProfile['deskripsi_bidang'];

        return json_encode($res);
    }
    public function ubah_Profile()
    {
        $request            = Services::request();
        $Profile      = new TabelProfile($request);
        $post               = $this->request->getPost();

        $setUpdateProfile = [
            'nama_bidang'        => $post["nama_bidang"],
            'deskripsi_bidang'     => $post["deskripsi_bidang"],
        ];

        $updateProfile   = $Profile->set($setUpdateProfile)->where('nama_bidang', $post["id"])->update();

        if ($updateProfile) {
            $res["status"] = TRUE;
            $res["res"]    = 'Update Data Berhasil';
        } else {
            $res["status"] = FALSE;
            $res["res"]    = 'Update Data Berhasil';
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
            $res["res"]    = 'Update Data Berhasil';
        }

        echo json_encode($res);
    }
    //////////////////////////////////////// End Of Kinerja Dinas ////////////////////////////////////////

    //////////////////////////////////////// Start Of Kinerja Bidang ////////////////////////////////////////

    public function dataIndikatorBidang()
    {
        $request    = Services::request();
        $datatable  = new TabelIndikator($request);
        $lists      = $datatable->getDatatables();
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
            return json_encode($res);
        } else {
            $simpan = $tambahIndikator->insert($post);
            $res["status"] = TRUE;
            echo json_encode($res);
        }
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
            $row[]  = $list->tahun_anggaran;
            $row[]  = $list->triwulan_anggaran;
            $row[]  = $list->pagu_anggaran;
            $row[]  = $list->realisasi_anggaran;
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

        $getDel     = $this->request->getPost('id');
        $deletedata = $aggDinas->where('realisasi_anggaran', $getDel)->delete();

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
        if ($post["tahun_anggaran"] == NULL || $post["triwulan_anggaran"] == NULL || $post["pagu_anggaran"] == NULL || $post["realisasi_anggaran"] == NULL) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Kolom Kosong';
            return json_encode($res);
        } else {
            $simpan = $tambahAnggaranDinas->insert($post);
            $res["status"] = TRUE;
            echo json_encode($res);
        }
    }

    public function setDataInFormUbahAnggaran()
    {
        $request            = Services::request();
        $anggaranDinas      = new TabelAnggaranDinas($request);
        $post               = $this->request->getPost();

        $dataUbahAnggaran       = $anggaranDinas->where('realisasi_anggaran', $post["id"])->first();

        $res["tahun_anggaran"]      = $dataUbahAnggaran['tahun_anggaran'];
        $res["triwulan_anggaran"]   = $dataUbahAnggaran['triwulan_anggaran'];
        $res["pagu_anggaran"]       = $dataUbahAnggaran['pagu_anggaran'];
        $res["realisasi_anggaran"]  = $dataUbahAnggaran['realisasi_anggaran'];

        return json_encode($res);
    }

    public function ubah_anggaranDinas()
    {
        $request            = Services::request();
        $anggaranDinas      = new TabelAnggaranDinas($request);
        $post               = $this->request->getPost();

        $ubahAnggaranDinas  = $anggaranDinas->where('realisasi_anggaran', $post["id"])->first();

        if ($post["tahun_anggaran"] == $ubahAnggaranDinas["tahun_anggaran"] && $post["triwulan_anggaran"] == $ubahAnggaranDinas["triwulan_anggaran"] && $post["pagu_anggaran"] == $ubahAnggaranDinas["pagu_anggaran"] && $post["realisasi_anggaran"] == $ubahAnggaranDinas["realisasi_anggaran"]) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Dari Kolom Sama Dengan Sebelumnya';
            return json_encode($res);
        }

        if ($post["pagu_anggaran"] < $post["realisasi_anggaran"]) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Realisasi Melebihi Pagu Anggaran';
            return json_encode($res);
        }

        if ($post["tahun_anggaran"] == NULL || $post["triwulan_anggaran"] == NULL || $post["pagu_anggaran"] == NULL || $post["realisasi_anggaran"] == NULL) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Kolom Kosong';
            return json_encode($res);
        }

        $setUpdateAnggaranDinas = [
            'tahun_anggaran'        => $post["tahun_anggaran"],
            'triwulan_anggaran'     => $post["triwulan_anggaran"],
            'pagu_anggaran'         => $post["pagu_anggaran"],
            'realisasi_anggaran'    => $post["realisasi_anggaran"],
        ];

        $updateAnggaranDinas   = $anggaranDinas->set($setUpdateAnggaranDinas)->where('realisasi_anggaran', $post["id"])->update();

        if ($updateAnggaranDinas) {
            $res["status"] = TRUE;
            $res["res"]    = 'Update Data Berhasil';
        } else {
            $res["status"] = FALSE;
            $res["res"]    = 'Update Data Berhasil';
        }

        echo json_encode($res);
    }

    //////////////////////////////////////// End Of Anggaran Dinas ////////////////////////////////////////

    //////////////////////////////////////// Start Of Anggaran Bidang ////////////////////////////////////////

    public function dataAnggaranBidang()
    {
        $request    = Services::request();
        $datatable  = new TabelAnggaranBidang($request);
        $lists      = $datatable->getDatatables();
        $data       = [];
        $no         = $request->getPost('start');

        foreach ($lists as $list) {
            $row    = [];
            $row[]  = $list->tahun_anggaran_bidang;
            $row[]  = $list->triwulan_anggaran_bidang;
            $row[]  = $list->pagu_anggaran_bidang;
            $row[]  = $list->realisasi_anggaran_bidang;
            $row[]  = $list->divisi_dinas;
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
    public function setDataInFormUbahAnggaranBidang()
    {
        $request            = Services::request();
        $anggaranDinas      = new TabelAnggaranBidang($request);
        $post               = $this->request->getPost();

        $dataUbahAnggaran       = $anggaranDinas->where('realisasi_anggaran_bidang', $post["id"])->first();

        $res["tahun_anggaran_bidang"]      = $dataUbahAnggaran['tahun_anggaran_bidang'];
        $res["triwulan_anggaran_bidang"]   = $dataUbahAnggaran['triwulan_anggaran_bidang'];
        $res["pagu_anggaran_bidang"]       = $dataUbahAnggaran['pagu_anggaran_bidang'];
        $res["realisasi_anggaran_bidang"]  = $dataUbahAnggaran['realisasi_anggaran_bidang'];
        $res["divisi_dinas"]               = $dataUbahAnggaran['divisi_dinas'];

        return json_encode($res);
    }

    public function hapus_anggaranBidang()
    {
        $request    = Services::request();
        $aggDinas   = new TabelAnggaranBidang($request);

        $getDel     = $this->request->getPost('id');
        $deletedata = $aggDinas->where('realisasi_anggaran_bidang', $getDel)->delete();

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
        if ($post["tahun_anggaran_bidang"] == NULL || $post["triwulan_anggaran_bidang"] == NULL || $post["pagu_anggaran_bidang"] == NULL || $post["realisasi_anggaran_bidang"] == NULL || $post["divisi_dinas"] == NULL) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Kolom Kosong';
            return json_encode($res);
        } else {
            $simpan = $tambahAnggaranBidang->insert($post);
            $res["status"] = TRUE;
            echo json_encode($res);
        }
    }
    public function ubah_anggaranBidang()
    {
        $request            = Services::request();
        $anggaranBidang      = new TabelAnggaranBidang($request);
        $post               = $this->request->getPost();

        $ubahAnggaranBidang  = $anggaranBidang->where('realisasi_anggaran_bidang', $post["id"])->first();

        if ($post["tahun_anggaran_bidang"] == $ubahAnggaranBidang["tahun_anggaran_bidang"] && $post["triwulan_anggaran_bidang"] == $ubahAnggaranBidang["triwulan_anggaran_bidang"] && $post["pagu_anggaran_bidang"] == $ubahAnggaranBidang["pagu_anggaran_bidang"] && $post["realisasi_anggaran_bidang"] == $ubahAnggaranBidang["realisasi_anggaran_bidang"] && $post["divisi_dinas"] == $ubahAnggaranBidang["divisi_dinas"]) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Dari Kolom Sama Dengan Sebelumnya';
            return json_encode($res);
        }

        if ($post["pagu_anggaran_bidang"] < $post["realisasi_anggaran_bidang"]) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Realisasi Melebihi Pagu Anggaran';
            return json_encode($res);
        }

        if ($post["tahun_anggaran_bidang"] == NULL || $post["triwulan_anggaran_bidang"] == NULL || $post["pagu_anggaran_bidang"] == NULL || $post["realisasi_anggaran_bidang"] == NULL || $post["divisi_dinas"] == NULL) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Kolom Kosong';
            return json_encode($res);
        }

        $setUpdateAnggaranBidang = [
            'tahun_anggaran_bidang'        => $post["tahun_anggaran_bidang"],
            'triwulan_anggaran_bidang'     => $post["triwulan_anggaran_bidang"],
            'pagu_anggaran_bidang'         => $post["pagu_anggaran_bidang"],
            'realisasi_anggaran_bidang'    => $post["realisasi_anggaran_bidang"],
            'divisi_dinas'                 => $post["divisi_dinas"],
        ];

        $updateAnggaranBidang   = $anggaranBidang->set($setUpdateAnggaranBidang)->where('realisasi_anggaran_bidang', $post["id"])->update();

        if ($updateAnggaranBidang) {
            $res["status"] = TRUE;
            $res["res"]    = 'Update Data Berhasil';
        } else {
            $res["status"] = FALSE;
            $res["res"]    = 'Update Data Berhasil';
        }

        echo json_encode($res);
    }

    /////////////////////////////////////// End Of Anggaran Bidang ////////////////////////////////////////


}
