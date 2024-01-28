<?php

namespace App\Controllers;

use App\Models\TabelProfile;
use App\Models\TabelKinerja;
use App\Models\TabelIndikator;
use App\Models\TabelProfilePegawai;
use App\Models\TabelAnggaranBidang;
use App\Models\TabelAnggaranDinas;

use Config\Services;

class DataPegawai extends BaseController
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
        return view('layout/tabel-master-data-pegawai');
    }
}
