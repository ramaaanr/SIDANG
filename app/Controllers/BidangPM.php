<?php

namespace App\Controllers;

use App\Models\TabelProfile;
use App\Models\TabelIndikator;
use App\Models\TabelProfilePegawai;
use App\Models\TabelAnggaranBidang;
use Config\Services;

class BidangPM extends BaseController
{
    public function index()
    {
        return view('layout/profile-pm');
    }

    public function dataBidang()
    {
        $request                 = Services::request();
        $profile                 = new TabelProfile($request);

        $post                    = $this->request->getPost();
        $dataUser                = $profile->find($post["id"]);

        $res["nama_bidang"]      = $dataUser['nama_bidang'];
        $res["deskripsi_bidang"] = $dataUser['deskripsi_bidang'];

        return json_encode($res);
    }

    public function dataPegawaiBidang()
    {
        $request    = Services::request();
        $datatable  = new TabelProfilePegawai($request);

        $post       = $this->request->getPost();
        $data       = $datatable->where('divisi', $post['id'])->orderBy('jabatan')->findAll();

        $outputPegawai = [
            'data'  => $data
        ];

        return json_encode($outputPegawai);
    }

    public function dataIndikatorBidang()
    {
        $request        = Services::request();
        $datatable      = new TabelIndikator($request);

        $post           = $this->request->getPost();
        $dataIndikator  = $datatable->where('divisi_indikator', $post['id'])->orderBy('indikator_dinas')->findAll();

        $outputIndikator = [
            'data'      => $dataIndikator
        ];

        return json_encode($outputIndikator);
    }

    public function dataAnggaran()
    {
        $request                = Services::request();
        $anggaranBidang         = new TabelAnggaranBidang($request);

        $post                   = $this->request->getPost();
        $array                  = array('tahun_anggaran_bidang' => $post['tahun'], 'triwulan_anggaran_bidang' => $post['triwulan'], 'divisi_dinas' => $post['id']);
        $paguRealisasi          = $anggaranBidang->where($array)->first();

        $hasil["pagu"]      = $paguRealisasi['pagu_anggaran_bidang'];
        $hasil["realisasi"] = $paguRealisasi['realisasi_anggaran_bidang'];

        return json_encode($hasil);
    }
    public function dataChartBar()
    {
        $request        = Services::request();
        $indikator      = new TabelIndikator($request);
        $res = [];
        $post           = $this->request->getPost();

        $query = $indikator->select('indikator_dinas, target_indikator, triwulan_1, triwulan_2, triwulan_3, triwulan_4')->where('divisi_indikator', $post['id'])->findAll();
        $sum = $indikator->select('indikator_dinas, target_indikator, triwulan_1, triwulan_2, triwulan_3, triwulan_4')->where('divisi_indikator', $post['id'])->countAllResults();


        $res['t4i1'] = $res['t3i1'] = $res['t2i1'] = $res['t1i1'] = 0;
        foreach ($query as $qr) {
            $res['t1i1'] = $res['t1i1'] + (($qr['triwulan_1'] / $qr['target_indikator']) * 100);
            $res['t2i1'] = $res['t2i1'] + (($qr['triwulan_2'] / $qr['target_indikator']) * 100);
            $res['t3i1'] = $res['t3i1'] + (($qr['triwulan_3'] / $qr['target_indikator']) * 100);
            $res['t4i1'] = $res['t4i1'] + (($qr['triwulan_4'] / $qr['target_indikator']) * 100);
        }
        $res['t1i1'] = round(($res['t1i1'] / $sum), 2);
        $res['t2i1'] = round(($res['t2i1'] / $sum + $res['t1i1']), 2);
        $res['t3i1'] = round(($res['t3i1'] / $sum + $res['t2i1']), 2);
        $res['t4i1'] = round(($res['t4i1'] / $sum + $res['t3i1']), 2);

        return json_encode($res);
    }
}
