<?php

namespace App\Controllers;

use App\Models\TabelKinerja;
use App\Models\TabelIndikator;
use App\Models\TabelAnggaranDinas;
use App\Models\TabelAnggaranBidang;
use App\Models\TabelProfile;
use CodeIgniter\Database\Query;
use Config\Services;

class DashboardSidang extends BaseController
{
    public function index()
    {
        $session = Services::session();
        if (!$session->get('user')) {
            // Redirect ke halaman login jika tidak ada sesi login
            return redirect()->to(base_url('login'));
        }
        return view('layout/dashboard-utama');
    }

    public function dataKinerja()
    {
        $request        = Services::request();
        $kinerjaDinas   = new TabelKinerja($request);

        $sakip                          = $kinerjaDinas->find("NILAI SAKIP");
        $hasilKinerja["sakip"]          = $sakip['nama_pencapaian'];
        $hasilKinerja["deskSakip"]      = $sakip['deskripsi_pencapaian'];
        $hasilKinerja["nilaiSakip"]     = $sakip['nilai_pencapaian'];
        $hasilKinerja["tahunSakip"]     = $sakip['tahun_pencapaian'];

        $realisasi                      = $kinerjaDinas->find("REALISASI ANGGARAN");
        $hasilKinerja["realisasi"]      = $realisasi['nama_pencapaian'];
        $hasilKinerja["deskRealisasi"]  = $realisasi['deskripsi_pencapaian'];
        $hasilKinerja["nilaiRealisasi"] = $realisasi['nilai_pencapaian'];
        $hasilKinerja["tahunRealisasi"] = $realisasi['tahun_pencapaian'];

        $kuisioner                      = $kinerjaDinas->find("KUISIONER KEPUASAN MASYARAKAT");
        $hasilKinerja["kuisioner"]      = $kuisioner['nama_pencapaian'];
        $hasilKinerja["deskKuisioner"]  = $kuisioner['deskripsi_pencapaian'];
        $hasilKinerja["nilaiKuisioner"] = $kuisioner['nilai_pencapaian'];
        $hasilKinerja["tahunKuisioner"] = $kuisioner['tahun_pencapaian'];

        return json_encode($hasilKinerja);
    }

    public function dataAnggaran()
    {
        $request                = Services::request();
        $post                   = $this->request->getPost();
        $tahun = $post['tahun'];
        $model = new TabelAnggaranBidang($request);
        $dataAnggaranBidang = $model->where('tahun', $tahun)->get()->getResult();
        $paguDinas = 0;
        $realisasiDinas = 0;
        foreach ($dataAnggaranBidang as $anggaranBidang) {
            $paguDinas += $anggaranBidang->pagu_bidang;
            $realisasiDinas += $anggaranBidang->realisasi_tw1;
            $realisasiDinas += $anggaranBidang->realisasi_tw2;
            $realisasiDinas += $anggaranBidang->realisasi_tw3;
            $realisasiDinas += $anggaranBidang->realisasi_tw4;
        }

        // $anggaranDinas          = new TabelAnggaranDinas($request);

        // $post                   = $this->request->getPost();
        // // $array                  = array('tahun_ag_dinas' => $post['tahun'], 'triwulan_anggaran' => $post['triwulan']);
        // $paguRealisasiDinas     = $anggaranDinas->where("tahun_ag_dinas", $post['tahun'])->first();


        return json_encode([
            'paguDinas' => $paguDinas,
            'realisasiDinas' => $realisasiDinas,
        ]);
    }

    public function dataAnggaranBidang()
    {
        $request                = Services::request();
        $anggaranBidang         = new TabelAnggaranBidang($request);

        $post                   = $this->request->getPost();

        $arraySekre             = array('tahun' => $post['tahun'], 'id_bidang' => '5');
        $paguRealisasiSekre     = $anggaranBidang->where($arraySekre)->first();

        $arrayDalduk            = array('tahun' => $post['tahun'], 'id_bidang' => '4');
        $paguRealisasiDalduk    = $anggaranBidang->where($arrayDalduk)->first();

        $arrayKBKS              = array('tahun' => $post['tahun'], 'id_bidang' => '1');
        $paguRealisasiKBKS      = $anggaranBidang->where($arrayKBKS)->first();

        $arrayPM                = array('tahun' => $post['tahun'], 'id_bidang' => '2');
        $paguRealisasiPM        = $anggaranBidang->where($arrayPM)->first();

        $arrayPPPA              = array('tahun' => $post['tahun'], 'id_bidang' => '3');
        $paguRealisasiPPPA      = $anggaranBidang->where($arrayPPPA)->first();

        $arrayPPHA              = array('tahun' => $post['tahun'], 'id_bidang' => '6');
        $paguRealisasiPPHA      = $anggaranBidang->where($arrayPPHA)->first();

        $arrayUPTD              = array('tahun' => $post['tahun'], 'id_bidang' => '7');
        $paguRealisasiUPTD      = $anggaranBidang->where($arrayUPTD)->first();

        $anggaran["paguSekre"]    = $paguRealisasiSekre['pagu_bidang'];
        $anggaran["paguDalduk"]   = $paguRealisasiDalduk['pagu_bidang'];
        $anggaran["paguKBKS"]     = $paguRealisasiKBKS['pagu_bidang'];
        $anggaran["paguPM"]       = $paguRealisasiPM['pagu_bidang'];
        $anggaran["paguPPPA"]     = $paguRealisasiPPPA['pagu_bidang'];
        $anggaran["paguPPHA"]     = $paguRealisasiPPHA['pagu_bidang'];
        $anggaran["paguUPTD"]     = $paguRealisasiUPTD['pagu_bidang'];

        $anggaran["realiSekre"]    = $paguRealisasiSekre['realisasi_tw1'] + $paguRealisasiSekre['realisasi_tw2'] + $paguRealisasiSekre['realisasi_tw3'] + $paguRealisasiSekre['realisasi_tw4'];
        $anggaran["realiDalduk"]   = $paguRealisasiDalduk['realisasi_tw1'] + $paguRealisasiDalduk['realisasi_tw2'] + $paguRealisasiDalduk['realisasi_tw3'] + $paguRealisasiDalduk['realisasi_tw4'];
        $anggaran["realiKBKS"]     = $paguRealisasiKBKS['realisasi_tw1'] + $paguRealisasiKBKS['realisasi_tw2'] + $paguRealisasiKBKS['realisasi_tw3'] + $paguRealisasiKBKS['realisasi_tw4'];
        $anggaran["realiPM"]       = $paguRealisasiPM['realisasi_tw1'] + $paguRealisasiPM['realisasi_tw2'] + $paguRealisasiPM['realisasi_tw3'] + $paguRealisasiPM['realisasi_tw4'];
        $anggaran["realiPPPA"]     = $paguRealisasiPPPA['realisasi_tw1'] + $paguRealisasiPPPA['realisasi_tw2'] + $paguRealisasiPPPA['realisasi_tw3'] + $paguRealisasiPPPA['realisasi_tw4'];
        $anggaran["realiPPHA"]     = $paguRealisasiPPHA['realisasi_tw1'] + $paguRealisasiPPHA['realisasi_tw2'] + $paguRealisasiPPHA['realisasi_tw3'] + $paguRealisasiPPHA['realisasi_tw4'];
        $anggaran["realiUPTD"]     = $paguRealisasiUPTD['realisasi_tw1'] + $paguRealisasiUPTD['realisasi_tw2'] + $paguRealisasiUPTD['realisasi_tw3'] + $paguRealisasiUPTD['realisasi_tw4'];

        return json_encode($anggaran);
    }

    public function dataTahunAnggaranBidang()
    {
        $request    = Services::request();
        $datatable  = new TabelAnggaranBidang($request);

        // Mendapatkan data unik dari kolom 'nama_kolom'
        $uniqueData = $datatable->getUniqueYear();
        $years = [];
        foreach ($uniqueData as $data) {
            $years[] = $data->tahun;
        }

        // Lakukan sesuatu dengan data unik
        return json_encode($years);
    }

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
    public function dataChartLine()
    {
        $request        = Services::request();
        $post                   = $this->request->getPost();
        $tahun = $post['tahun'];
        $model = new TabelAnggaranBidang($request);
        $dataAnggaranBidang = $model->where('tahun', $tahun)->get()->getResult();
        $realisasiDinasTw1 = 0;
        $realisasiDinasTw2 = 0;
        $realisasiDinasTw3 = 0;
        $realisasiDinasTw4 = 0;
        foreach ($dataAnggaranBidang as $anggaranBidang) {
            $realisasiDinasTw1 += $anggaranBidang->realisasi_tw1;
            $realisasiDinasTw2 += $anggaranBidang->realisasi_tw2;
            $realisasiDinasTw3 += $anggaranBidang->realisasi_tw3;
            $realisasiDinasTw4 += $anggaranBidang->realisasi_tw4;
        }

        $data = [
            $realisasiDinasTw1,
            $realisasiDinasTw2,
            $realisasiDinasTw3,
            $realisasiDinasTw4,
        ];

        return json_encode($data);
    }

    public function dataChartBar()
    {
        $request        = Services::request();
        $indikator      = new TabelIndikator($request);
        $nilai = [];
        $request            = Services::request();
        $inidkator      = new TabelProfile($request);

        $profiles     = $inidkator->findAll();

        return json_encode(count($profiles));

        // $query1 = $indikator->select('target_indikator, triwulan_1, triwulan_2, triwulan_3, triwulan_4')->where('divisi_indikator', '5')->findAll();
        // $query2 = $indikator->select('target_indikator, triwulan_1, triwulan_2, triwulan_3, triwulan_4')->where('divisi_indikator', '4')->findAll();
        // $query3 = $indikator->select('target_indikator, triwulan_1, triwulan_2, triwulan_3, triwulan_4')->where('divisi_indikator', '1')->findAll();
        // $query4 = $indikator->select('target_indikator, triwulan_1, triwulan_2, triwulan_3, triwulan_4')->where('divisi_indikator', '2')->findAll();
        // $query5 = $indikator->select('target_indikator, triwulan_1, triwulan_2, triwulan_3, triwulan_4')->where('divisi_indikator', '3')->findAll();
        // $query6 = $indikator->select('target_indikator, triwulan_1, triwulan_2, triwulan_3, triwulan_4')->where('divisi_indikator', '6')->findAll();
        // $query7 = $indikator->select('target_indikator, triwulan_1, triwulan_2, triwulan_3, triwulan_4')->where('divisi_indikator', '7')->findAll();

        // $nilai1['t4B1'] = $nilai1['t3B1'] = $nilai1['t2B1'] = $nilai1['t1B1'] = 0;
        // $count1 = 0;

        // if (count($query1) != 0) {
        //     foreach ($query1 as $qr) {
        //         $count1++;
        //         $nilai1['t1B1'] = $nilai1['t1B1'] + (($qr['triwulan_1'] / $qr['target_indikator']) * 100);
        //         $nilai1['t2B1'] = $nilai1['t2B1'] + (($qr['triwulan_2'] / $qr['target_indikator']) * 100);
        //         $nilai1['t3B1'] = $nilai1['t3B1'] + (($qr['triwulan_3'] / $qr['target_indikator']) * 100);
        //         $nilai1['t4B1'] = $nilai1['t4B1'] + (($qr['triwulan_4'] / $qr['target_indikator']) * 100);
        //     }
        //     $nilai1['t1B1'] = round(($nilai1['t1B1'] / $count1), 2);
        //     $nilai1['t2B1'] = round(($nilai1['t2B1'] / $count1 + $nilai1['t1B1']), 2);
        //     $nilai1['t3B1'] = round(($nilai1['t3B1'] / $count1 + $nilai1['t2B1']), 2);
        //     $nilai1['t4B1'] = round(($nilai1['t4B1'] / $count1 + $nilai1['t3B1']), 2);
        // }

        // $nilai2['t4B2'] = $nilai2['t3B2'] = $nilai2['t2B2'] = $nilai2['t1B2'] = 0;
        // $count2 = 0;
        // foreach ($query2 as $qr) {
        //     $count2++;
        //     $nilai2['t1B2'] = $nilai2['t1B2'] + (($qr['triwulan_1'] / $qr['target_indikator']) * 100);
        //     $nilai2['t2B2'] = $nilai2['t2B2'] + (($qr['triwulan_2'] / $qr['target_indikator']) * 100);
        //     $nilai2['t3B2'] = $nilai2['t3B2'] + (($qr['triwulan_3'] / $qr['target_indikator']) * 100);
        //     $nilai2['t4B2'] = $nilai2['t4B2'] + (($qr['triwulan_4'] / $qr['target_indikator']) * 100);
        // }
        // $nilai2['t1B2'] = round(($nilai2['t1B2'] / $count2), 2);
        // $nilai2['t2B2'] = round(($nilai2['t2B2'] / $count2 + $nilai2['t1B2']), 2);
        // $nilai2['t3B2'] = round(($nilai2['t3B2'] / $count2 + $nilai2['t2B2']), 2);
        // $nilai2['t4B2'] = round(($nilai2['t4B2'] / $count2 + $nilai2['t3B2']), 2);

        // $nilai3['t4B3'] = $nilai3['t3B3'] = $nilai3['t2B3'] = $nilai3['t1B3'] = 0;
        // $count3 = 0;
        // foreach ($query3 as $qr) {
        //     $count3++;
        //     $nilai3['t1B3'] = $nilai3['t1B3'] + (($qr['triwulan_1'] / $qr['target_indikator']) * 100);
        //     $nilai3['t2B3'] = $nilai3['t2B3'] + (($qr['triwulan_2'] / $qr['target_indikator']) * 100);
        //     $nilai3['t3B3'] = $nilai3['t3B3'] + (($qr['triwulan_3'] / $qr['target_indikator']) * 100);
        //     $nilai3['t4B3'] = $nilai3['t4B3'] + (($qr['triwulan_4'] / $qr['target_indikator']) * 100);
        // }
        // $nilai3['t1B3'] = round(($nilai3['t1B3'] / $count3), 2);
        // $nilai3['t2B3'] = round(($nilai3['t2B3'] / $count3 + $nilai3['t1B3']), 2);
        // $nilai3['t3B3'] = round(($nilai3['t3B3'] / $count3 + $nilai3['t2B3']), 2);
        // $nilai3['t4B3'] = round(($nilai3['t4B3'] / $count3 + $nilai3['t3B3']), 2);

        // $nilai4['t4B4'] = $nilai4['t3B4'] = $nilai4['t2B4'] = $nilai4['t1B4'] = 0;
        // $count4 = 0;
        // foreach ($query4 as $qr) {
        //     $count4++;
        //     $nilai4['t1B4'] = $nilai4['t1B4'] + (($qr['triwulan_1'] / $qr['target_indikator']) * 100);
        //     $nilai4['t2B4'] = $nilai4['t2B4'] + (($qr['triwulan_2'] / $qr['target_indikator']) * 100);
        //     $nilai4['t3B4'] = $nilai4['t3B4'] + (($qr['triwulan_3'] / $qr['target_indikator']) * 100);
        //     $nilai4['t4B4'] = $nilai4['t4B4'] + (($qr['triwulan_4'] / $qr['target_indikator']) * 100);
        // }
        // $nilai4['t1B4'] = round(($nilai4['t1B4'] / $count4), 2);
        // $nilai4['t2B4'] = round(($nilai4['t2B4'] / $count4 + $nilai4['t1B4']), 2);
        // $nilai4['t3B4'] = round(($nilai4['t3B4'] / $count4 + $nilai4['t2B4']), 2);
        // $nilai4['t4B4'] = round(($nilai4['t4B4'] / $count4 + $nilai4['t3B4']), 2);

        // $nilai5['t4B5'] = $nilai5['t3B5'] = $nilai5['t2B5'] = $nilai5['t1B5'] = 0;
        // $count5 = 0;
        // foreach ($query5 as $qr) {
        //     $count5++;
        //     $nilai5['t1B5'] = $nilai5['t1B5'] + (($qr['triwulan_1'] / $qr['target_indikator']) * 100);
        //     $nilai5['t2B5'] = $nilai5['t2B5'] + (($qr['triwulan_2'] / $qr['target_indikator']) * 100);
        //     $nilai5['t3B5'] = $nilai5['t3B5'] + (($qr['triwulan_3'] / $qr['target_indikator']) * 100);
        //     $nilai5['t4B5'] = $nilai5['t4B5'] + (($qr['triwulan_4'] / $qr['target_indikator']) * 100);
        // }
        // $nilai5['t1B5'] = round(($nilai5['t1B5'] / $count5), 2);
        // $nilai5['t2B5'] = round(($nilai5['t2B5'] / $count5 + $nilai5['t1B5']), 2);
        // $nilai5['t3B5'] = round(($nilai5['t3B5'] / $count5 + $nilai5['t2B5']), 2);
        // $nilai5['t4B5'] = round(($nilai5['t4B5'] / $count5 + $nilai5['t3B5']), 2);

        // $nilai6['t4B6'] = $nilai6['t3B6'] = $nilai6['t2B6'] = $nilai6['t1B6'] = 0;
        // $count6 = 0;
        // foreach ($query6 as $qr) {
        //     $count6++;
        //     $nilai6['t1B6'] = $nilai6['t1B6'] + (($qr['triwulan_1'] / $qr['target_indikator']) * 100);
        //     $nilai6['t2B6'] = $nilai6['t2B6'] + (($qr['triwulan_2'] / $qr['target_indikator']) * 100);
        //     $nilai6['t3B6'] = $nilai6['t3B6'] + (($qr['triwulan_3'] / $qr['target_indikator']) * 100);
        //     $nilai6['t4B6'] = $nilai6['t4B6'] + (($qr['triwulan_4'] / $qr['target_indikator']) * 100);
        // }
        // $nilai6['t1B6'] = round(($nilai6['t1B6'] / $count6), 2);
        // $nilai6['t2B6'] = round(($nilai6['t2B6'] / $count6 + $nilai6['t1B6']), 2);
        // $nilai6['t3B6'] = round(($nilai6['t3B6'] / $count6 + $nilai6['t2B6']), 2);
        // $nilai6['t4B6'] = round(($nilai6['t4B6'] / $count6 + $nilai6['t3B6']), 2);

        // $nilai7['t4B7'] = $nilai7['t3B7'] = $nilai7['t2B7'] = $nilai7['t1B7'] = 0;
        // $count7 = 0;
        // foreach ($query7 as $qr) {
        //     $count7++;
        //     $nilai7['t1B7'] = $nilai7['t1B7'] + (($qr['triwulan_1'] / $qr['target_indikator']) * 100);
        //     $nilai7['t2B7'] = $nilai7['t2B7'] + (($qr['triwulan_2'] / $qr['target_indikator']) * 100);
        //     $nilai7['t3B7'] = $nilai7['t3B7'] + (($qr['triwulan_3'] / $qr['target_indikator']) * 100);
        //     $nilai7['t4B7'] = $nilai7['t4B7'] + (($qr['triwulan_4'] / $qr['target_indikator']) * 100);
        // }
        // $nilai7['t1B7'] = round(($nilai7['t1B7'] / $count7), 2);
        // $nilai7['t2B7'] = round(($nilai7['t2B7'] / $count7 + $nilai7['t1B7']), 2);
        // $nilai7['t3B7'] = round(($nilai7['t3B7'] / $count7 + $nilai7['t2B7']), 2);
        // $nilai7['t4B7'] = round(($nilai7['t4B7'] / $count7 + $nilai7['t3B7']), 2);

        // $nilai[0] = $nilai1;
        // $nilai[1] = $nilai2;
        // $nilai[2] = $nilai3;
        // $nilai[3] = $nilai4;
        // $nilai[4] = $nilai5;
        // $nilai[5] = $nilai6;
        // $nilai[6] = $nilai7;
    }
}
