<?php

namespace App\Controllers;

use App\Models\TabelIndikator;

use Config\Services;

class IndikatorDinas extends BaseController
{
    public function index()
    {
        $session = Services::session();
        if (!$session->get('user')) {
            // Redirect ke halaman login jika tidak ada sesi login
            return redirect()->to(base_url('login'));
        }

        if ($session->get('user')['divisi'] != 5) {
            return redirect()->to(base_url(''));
        }
        return view('layout/tabel-master-indikator-dinas');
    }

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
        } catch (\Throwable $th) {
            $res["status"] = FALSE;
            $res["res"]    = $th;
        }

        echo json_encode($res);
    }

    //////////////////////////////////////// End Of Indikator Bidang ////////////////////////////////////////

}
