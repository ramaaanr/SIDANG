<?php

namespace App\Controllers;

use CodeIgniter\Config\Services;

class home extends BaseController
{
    public function index()
    {
        $session = Services::session();
        if (!$session->get('user')) {
            // Redirect ke halaman login jika tidak ada sesi login
            return redirect()->to(site_url('login'));
        }
        return redirect()->to(base_url('DashboardSidang'));
    }
}
