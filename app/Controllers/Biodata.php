<?php

namespace App\Controllers;

use App\Models\UserModel;

class Biodata extends BaseController
{
    public function index()
    {
        $id_user = session()->get('id_user');

        // Panggil Model
        $userModel = new UserModel();
        $user = $userModel->find($id_user);
        $data = [
            'title' => 'Biodata Pengguna',
            'user'  => $user,
            'validation' => \Config\Services::validation()
        ];
        return view('biodata/index', $data);
    }

    public function update_profile()
    {
        $id_user = session()->get('id_user');
        $userModel = new UserModel();
        
        // 1. Validasi Input
        if (!$this->validate([
            'nama_lengkap' => 'required',
            'foto' => [
                'rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar (Max 2MB)',
                    'is_image' => 'File yang dipilih bukan gambar',
                    'mime_in'  => 'File yang dipilih bukan gambar'
                ]
            ]
        ])) 
        {
            return redirect()->to('/biodata')->withInput();
        }

        // 2. Kelola Upload Foto
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('foto_lama');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img', $namaFoto);
        }

        // 3. Simpan ke Database
        $userModel->save([
            'id_user'      => $id_user,
            'nama_lengkap' => $this->request->getVar('nama_lengkap'),
            'foto'         => $namaFoto
        ]);

        session()->set('nama_lengkap', $this->request->getVar('nama_lengkap'));
        session()->set('foto', $namaFoto); 
        session()->setFlashdata('pesan', 'Profil berhasil diperbarui!');
        return redirect()->to('/biodata');
    }

    public function update_password()
    {
        $id_user = session()->get('id_user');
        $userModel = new UserModel();
        $user = $userModel->find($id_user);

        $passLama = $this->request->getVar('pass_lama');
        $passBaru = $this->request->getVar('pass_baru');
        $passKonf = $this->request->getVar('pass_konf');

        if (!password_verify($passLama, $user['password'])) {
            session()->setFlashdata('error_pass', 'Password Lama Salah!');
            return redirect()->to('/biodata');
        }

        if ($passBaru != $passKonf) {
            session()->setFlashdata('error_pass', 'Konfirmasi Password Baru tidak cocok!');
            return redirect()->to('/biodata');
        }

        $userModel->save([
            'id_user' => $id_user,
            'password' => password_hash($passBaru, PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('pesan', 'Password berhasil diganti!');
        return redirect()->to('/biodata');
    }
}