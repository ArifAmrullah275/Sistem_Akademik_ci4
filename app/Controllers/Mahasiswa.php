<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswamodel;

    public function __construct()
    {
        $this->mahasiswamodel = new MahasiswaModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->mahasiswamodel->like('nama', $keyword)
                                ->orLike('nim', $keyword);
        }
        $data = [
            'title'       => 'Data Mahasiswa',
            'mahasiswa'   => $this->mahasiswamodel->paginate(10, 'mahasiswa'),
            'pager'       => $this->mahasiswamodel->pager,
            'currentPage' => $this->request->getVar('page_mahasiswa') ? $this->request->getVar('page_mahasiswa') : 1,
            'keyword'     => $keyword 
        ];
        return view('mahasiswa/data_mahasiswa', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Data Mahasiswa',
            'validation' => \Config\Services::validation()
        ];
        return view('mahasiswa/form_tambah', $data);
    }

    public function simpan()
    {
        // Validasi
        if (!$this->validate([
        'nim' => 'required|is_unique[tbl_mahasiswa.nim]', 
        'nama' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required'
    ])) {
        return redirect()->to('/mahasiswa/tambah')->withInput();
    }
        $this->mahasiswamodel->save([
            'nim'    => $this->request->getVar('nim'),
            'nama'   => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp'  => $this->request->getVar('no_hp')
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('mahasiswa');
    }

    public function edit($id_mhs)
    {
        $data = [
            'title'     => 'Edit Data Mahasiswa',
            'mahasiswa' => $this->mahasiswamodel->find($id_mhs),
            'validation' => \Config\Services::validation() 
        ];
        return view('mahasiswa/form_edit', $data);
    }

    public function update()
    {
        $id_mhs = $this->request->getVar('id');
        $nim_baru = $this->request->getVar('nim');
        $nim_lama = $this->mahasiswamodel->find($id_mhs)['nim'];

        if ($nim_lama == $nim_baru) {
            $rule_nim = 'required';
        } else {
            $rule_nim = 'required|is_unique[tbl_mahasiswa.nim]'; 
        }

        // Jalankan Validasi
        if (!$this->validate([
            'nim'    => $rule_nim,
            'nama'   => 'required',
            'alamat' => 'required',
            'no_hp'  => 'required'
        ])) {
            return redirect()->to('/mahasiswa/edit/' . $id_mhs)->withInput(); 
        }

        $this->mahasiswamodel->update($id_mhs, [
            'nim'    => $nim_baru,
            'nama'   => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp'  => $this->request->getVar('no_hp')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('mahasiswa');
    }

    public function delete($id_mhs)
    {
        $this->mahasiswamodel->delete($id_mhs);
        
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('mahasiswa');
    }
}