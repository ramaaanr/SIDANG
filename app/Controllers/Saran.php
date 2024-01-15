<?php

namespace App\Controllers;

use App\Models\TabelSaran;
use Config\Services;

class Saran extends BaseController
{
    public function index()
    {

        return view('layout/kritik-saran');
    }
    public function listdata()
    {
        $request    = Services::request();
        $datatable  = new TabelSaran($request);
        $lists      = $datatable->getDatatables();
        $data       = [];
        $no         = $request->getPost('start');

        foreach ($lists as $list) {
            $row    = [];
            $row[]  = $no;
            $row[]  = $list->nama;
            $row[]  = $list->komentar;
            $row[]  = $list->skor;
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
    public function simpan()
    {
        $request            = Services::request();
        $user               = new TabelSaran($request);
        $post               = $this->request->getPost();
        if ($post["nama"] == NULL || $post["komentar"] == NULL || $post["skor"] == NULL) {
            $res["status"]  = FALSE;
            $res["res"]     = 'Isi Kolom Kosong';
            return json_encode($res);
        } else {
            $simpan = $user->insert($post);
            $res["status"] = True;
            echo json_encode($res);
        }
    }
    public function hasilSkor()
    {
        $request    = Services::request();
        $user       = new TabelSaran($request);
        
        $rata       = $user->selectAvg('skor')->findAll();

        $angka =0 ;
        foreach($rata as $rt){
            $angka = $angka + $rt['skor'];
        }

        $hasil['rata']= $angka;

        return json_encode($hasil);
    }
}
