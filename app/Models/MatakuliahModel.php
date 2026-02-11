<?php

namespace App\Models;

use CodeIgniter\Model;

class MatakuliahModel extends Model
{
    protected $table = 'tbl_matakuliah';
    protected $primaryKey = 'id_mk';
    protected $allowedFields = ['kode_mk', 'nama_mk', 'sks', 'ruangan'];

    public function data_mk($id_mk = false)
    {
        if ($id_mk === false) {
            return $this->findAll();
        }
        return $this->find($id_mk);
    }

    public function update_data($data, $id_mk)
    {
        return $this->db->table($this->table)->update($data, ['id_mk' => $id_mk]);
    }

    public function delete_data($id_mk)
    {
        return $this->db->table($this->table)->delete(['id_mk' => $id_mk]);
    }
    public function search($keyword)
    {
        return $this->table('matakuliah')
                    ->like('nama_mk', $keyword)
                    ->orLike('kode_mk', $keyword)
                    ->findAll();
    }
}