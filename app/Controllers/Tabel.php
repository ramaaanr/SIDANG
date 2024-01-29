<?php

namespace App\Controllers;

class Tabel extends BaseController
{
    public function index()
    {
        return redirect()->to(base_url('/'));
    }
}
