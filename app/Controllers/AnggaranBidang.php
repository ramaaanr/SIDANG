<?php

namespace App\Controllers;

use App\Models\TabelProfile;
use App\Models\TabelKinerja;
use App\Models\TabelIndikator;
use App\Models\TabelProfilePegawai;
use App\Models\TabelAnggaranBidang;
use App\Models\TabelAnggaranDinas;

use Config\Services;

class AnggaranBidang extends BaseController
{
    public function index()
    {
        return view('layout/tabel-master-anggaran-bidang');
    }

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
