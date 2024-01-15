<?php

namespace App\Controllers;

use App\Models\TabelAnggaranDinas;

use Config\Services;

class AnggaranDinas extends BaseController
{
    public function index()
    {
        return view('layout/tabel-master-anggaran-dinas');
    }

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


}
