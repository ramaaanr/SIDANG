<?php

namespace App\Controllers;

use App\Models\TabelUser;
use Config\Services;
use CodeIgniter\View\View;

class Login extends BaseController
{
    public function index($pesan = NULL)
    {
        // $session = session();
        // $session->destroy();
        $data['pesan_ui'] = $pesan;

        $session = Services::session();
        if ($session->get('user')) {
            // Redirect ke halaman login jika tidak ada sesi login
            return redirect()->to(base_url('DashboardSidang'));
        }
        return view('layout/sign-in', $data);
    }

    public function cek()
    {
        $username   = $this->request->getPost('username');
        $divisi     = $this->request->getPost('divisi');
        $pass       = $this->request->getPost('password');


        $request    = Services::request();
        $user       = new TabelUser($request);
        $dataUser   = $user->find($username);


        if ($dataUser) {
            if (!password_verify($pass, $dataUser['password']) || $divisi != $dataUser['divisi']) {
                $response['status'] = 'error';
                $response['message'] = 'Password atau Divisi Tidak Sesuai';
                $response['req'] = [
                    "pass" => $pass,
                    "username" => $username,
                    "divisi" => $divisi,
                ];
                $response['res'] = [
                    "pass" => $dataUser['password'],
                    "username" => $dataUser['username'],
                    "divisi" => $dataUser['divisi'],
                ];
            } else {

                $session = Services::session();
                $session->set('user', [
                    "username" => $username,
                    "pass" => $pass,
                    "divisi" => $divisi,
                ]);
                $response['status'] = 'success';
                $response['message'] = 'Sign In Berhasil';
            }
        } else {
            // Jika sign in gagal, kirim respons JSON dengan pesan error
            $response['status'] = 'error';
            $response['message'] = 'Username tidak ditemukan';
        }

        // Mengembalikan respons dalam bentuk JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function logout()
    {
        $session = Services::session();
        $session->destroy();
        return redirect()->to(base_url('login'));
    }
}
