<?php

namespace App\Controllers;

use App\Models\TabelProfile;
use App\Models\TabelIndikator;
use App\Models\TabelProfilePegawai;
use App\Models\TabelAnggaranBidang;
use Config\Services;

class BidangUPTPPA extends BaseController
{
    public function index()
    {
        $session = Services::session();
        if (!$session->get('user')) {
            // Redirect ke halaman login jika tidak ada sesi login
            return redirect()->to(base_url('login'));
        }
        return view('layout/profile-uptppa');
    }

    public function dataBidang()
    {
        $request                 = Services::request();
        $profile                 = new TabelProfile($request);

        $post                    = $this->request->getPost();
        $dataUser                = $profile->find($post["id"]);

        $res["nama_bidang"]      = $dataUser['nama_bidang'];
        $res["deskripsi_bidang"] = $dataUser['deskripsi_bidang'];
        $res["foto"] = $dataUser['foto'];

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
}
