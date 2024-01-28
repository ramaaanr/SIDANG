<?php

namespace App\Controllers;


use Config\Services;

class KinerjaDinas extends BaseController
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
        return view('layout/tabel-master-kinerja-dinas');
    }
}
