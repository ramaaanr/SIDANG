<?php

namespace App\Controllers;

class home extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('DashboardSidang'));
    }
}
