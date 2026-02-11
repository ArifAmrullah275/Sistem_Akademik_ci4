<?php
namespace App\Controllers;

use App\Models\LatihanModel;
class Latihan extends BaseController
{
    public function index()
    {
        echo "Saat ini kita sedang berada pada Controllers Latihan";
    }
    public function codeigniter()
    {
        echo "Saat ini kita sedang berada pada Controllers Latihan dan Function codeigniter";
    }
    /*public function menampilkan_view()
    {
        return view('halaman_latihan');
    }*/
    /*public function tampil_view()
    {
        echo view('header');
        echo view('navigation');
        echo view('content');
        echo view('footer');
    }*/
    public function tampil_view()
    {
        $data = [
            'title' => 'Data Mahasiswa',
            'content' => 'Isi data mahasiswa'
        ];
        echo view('tampil_data', $data);
    }
    protected $latihanmodel;
    public function __construct()
    {
        $this->latihanmodel = new LatihanModel();
    }
    public function menampilkan_view()
    {
        echo 'Daftar Mahasiswa';
        echo '<br><br>';
        $data['mahasiswa'] = $this->latihanmodel->findAll();
        echo view('halaman_view', $data);
    }
}
?>