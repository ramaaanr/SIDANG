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

        $post               = $this->request->getPost();
        $username   = $post['username'];
        $divisi     = $post['divisi'];
        $pass       = $post['password'];

        $request    = Services::request();
        $user       = new TabelUser($request);
        $dataUser   = $user->find($username);

        $hashedPass = md5($pass);
        if ($dataUser) {
            if ($hashedPass != $dataUser['password'] || $divisi != $dataUser['divisi']) {
                $response['status'] = 'error';
                $response['message'] = 'Password atau Divisi Tidak Sesuai';
                $response['req'] = [
                    "pass" => $pass,
                    "username" => $username,
                    'hased' => $hashedPass,
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
