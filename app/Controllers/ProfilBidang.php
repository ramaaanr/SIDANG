<?php

namespace App\Controllers;

use Config\Services;

class ProfilBidang extends BaseController
{
    public function index()
    {
        $session = Services::session();
        if (!$session->get('user')) {
            // Redirect ke halaman login jika tidak ada sesi login
            return redirect()->to(base_url('login'));
        }
        return view('layout/tabel-master-profil-bidang');
    }
}
