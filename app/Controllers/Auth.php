<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        
        $data = ['title' => 'Login'];
        return view('auth/login', $data);
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $model->where('username', $username)->first();

        if ($data) {
            $pass = $data['password'];
            if (password_verify($password, $pass)) {
                $ses_data = [
                    'id_user'       => $data['id_user'],
                    'username'      => $data['username'],
                    'nama_lengkap'  => $data['nama_lengkap'],
                    'foto'          => $data['foto'], 
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Register User',
            'validation' => \Config\Services::validation() 
        ];
        return view('auth/register', $data);
    }

    public function registerProcess()
    {
        if (!$this->validate([
            'username' => [
                'rules'  => 'required|min_length[4]|is_unique[tbl_user.username]',
                'errors' => [
                    'required'   => 'Username wajib diisi.',
                    'min_length' => 'Username minimal 4 karakter.',
                    'is_unique'  => 'Username sudah terdaftar, gunakan yang lain.'
                ]
            ],
            'nama_lengkap' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap wajib diisi.'
                ]
            ],
            'password' => [
                'rules'  => 'required|min_length[6]',
                'errors' => [
                    'required'   => 'Password wajib diisi.',
                    'min_length' => 'Password minimal 6 karakter.'
                ]
            ],
            'password_conf' => [
                'rules'  => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak sesuai dengan password.'
                ]
            ]
        ])) {
            return redirect()->to('/register')->withInput();
        }

        $model = new UserModel();
        $data = [
            'username'     => $this->request->getVar('username'),
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'password'     => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'foto'         => 'default.png'
        ];

        $model->save($data);
        session()->setFlashdata('pesan', 'Registrasi Berhasil. Silakan Login');
        return redirect()->to('/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}