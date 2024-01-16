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
        return view('layout/tabel-master-data-pegawai');
    }
}
