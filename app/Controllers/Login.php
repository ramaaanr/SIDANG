<?php

namespace App\Controllers;

use App\Models\TabelUser;
use Config\Services;
use CodeIgniter\View\View;

class Login extends BaseController
{
    public function index($pesan = NULL)
    {
        $session = session();
        $session->destroy();
        $data['pesan_ui'] = $pesan;
        return view('layout/sign-in', $data);
    }
    public function cek()
    {
        $session = session();
        $session->destroy();
        $username   = $this->request->getPost('username');
        $divisi     = $this->request->getPost('divisi');
        $pass       = $this->request->getPost('password');


        $request    = Services::request();
        $user       = new TabelUser($request);
        $dataUser   = $user->find($username);

        if ($dataUser == NULL) {
            $pesan['pesan_ui'] = ' <div class="alert alert-warning text-black">
            <strong>Perhatian!</strong> Masukkan Username atau Password Dengan Benar!
        </div>';
            
            return view("layout/sign-in", $pesan);
        } else {
            if ($username == $dataUser['username']) {
                if ($divisi == $dataUser['divisi'] && $pass == $dataUser['password']) {
                    if (($pass) == $dataUser['password']) {
                        $session = session();
                        $session_data = [
                            "username"      => $dataUser['username'],
                            "divisi"        => $dataUser['divisi']
                        ];
                        $session->set($session_data);
                        return redirect()->to(base_url('Home'));
                    } else {
                        $pesan['pesan_ui'] = ' <div class="alert alert-warning text-black">
            <strong>Perhatian!</strong> Masukkan Username atau Password Dengan Benar!</div>';
                        
                        return view("layout/sign-n", $pesan);
                    }
                } else {
                    $pesan['pesan_ui'] = ' <div class="alert alert-warning text-black">
            <strong>Perhatian!</strong> Masukkan Username atau Password Dengan Benar!</div>';
                    
                    return view("layout/sign-in", $pesan);
                }
            } else {
                $pesan['pesan_ui'] = ' <div class="alert alert-warning text-black">
                <strong>Perhatian!</strong> Masukkan Username atau Password Dengan Benar!</div>';
                return view("layout/sign-in", $pesan);

            }
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
}