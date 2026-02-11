<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\MatakuliahModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $mhsModel = new MahasiswaModel();
        $mkModel = new MatakuliahModel();

        $data = [
            'title' => 'Dashboard',
            'jumlah_mhs' => $mhsModel->countAll(),
            'jumlah_mk'  => $mkModel->countAll(),
            'mahasiswa_terbaru' => $mhsModel->orderBy('id', 'DESC')->findAll(5),
            'data_matakuliah'   => $mkModel->findAll(5) 
        ];
        return view('dashboard/index', $data);
    }
}