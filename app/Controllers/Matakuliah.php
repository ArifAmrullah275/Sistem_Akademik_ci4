<?php

namespace App\Controllers;

use App\Models\MatakuliahModel;

class Matakuliah extends BaseController
{
    protected $matakuliahmodel;

    public function __construct()
    {
        $this->matakuliahmodel = new MatakuliahModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
        $matakuliah = $this->matakuliahmodel->search($keyword);
        } else {
        $matakuliah = $this->matakuliahmodel->findAll();
        }
        $data = [
        'title'       => 'Data Mata Kuliah',
        'matakuliah'  => $this->matakuliahmodel->paginate(10, 'matakuliah'), // Batas 10 data per halaman
        'pager'       => $this->matakuliahmodel->pager,
        'currentPage' => $this->request->getVar('page_matakuliah') ? $this->request->getVar('page_matakuliah') : 1, // Nama group pagination disesuaikan
        'keyword'     => $keyword 
    ];
    return view('matakuliah/data_matakuliah', $data);
    }

    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah Data Mata Kuliah',
            'validation' => \Config\Services::validation()
        ];
        echo view('matakuliah/form_tambah', $data);
    }

    public function simpan()
    {
    if (!$this->validate([
        'kode_mk' => 'required|is_unique[tbl_matakuliah.kode_mk]', 
        'nama_mk' => 'required',
        'sks' => 'required|numeric',
        'ruangan' => 'required'
    ])) {
        return redirect()->to('/matakuliah/tambah')->withInput();
    }
        $this->matakuliahmodel->save([
            'kode_mk' => $this->request->getVar('kode_mk'),
            'nama_mk' => $this->request->getVar('nama_mk'),
            'sks'     => $this->request->getVar('sks'),
            'ruangan' => $this->request->getVar('ruangan')
        ]);

        session()->setFlashdata('pesan', 'Data Mata Kuliah Berhasil Ditambahkan.');
        return redirect()->to('/matakuliah');
    }

    public function edit($id_mk)
    {
        session();
        $data = [
            'title' => 'Edit Data Mata Kuliah',
            'validation' => \Config\Services::validation(),
            'matakuliah' => $this->matakuliahmodel->data_mk($id_mk)
        ];
        echo view('matakuliah/form_edit', $data);
    }

    public function update()
    {
        $id_mk = $this->request->getVar('id_mk');

        // Validasi
        if (!$this->validate([
            'kode_mk' => 'required', 
            'nama_mk' => 'required',
            'sks'     => 'required|numeric',
            'ruangan' => 'required'
        ])) {
            return redirect()->to('/matakuliah/edit/' . $id_mk)->withInput();
        }

        $data = [
            'kode_mk' => $this->request->getVar('kode_mk'),
            'nama_mk' => $this->request->getVar('nama_mk'),
            'sks'     => $this->request->getVar('sks'),
            'ruangan' => $this->request->getVar('ruangan')
        ];
        $this->matakuliahmodel->update_data($data, $id_mk);
        session()->setFlashdata('pesan', 'Data Mata Kuliah Berhasil Diubah.');
        return redirect()->to('/matakuliah');
    }

    public function delete($id_mk)
    {
        $this->matakuliahmodel->delete_data($id_mk);
        session()->setFlashdata('pesan', 'Data Mata Kuliah Berhasil Dihapus.');
        return redirect()->to('/matakuliah');
    }
}