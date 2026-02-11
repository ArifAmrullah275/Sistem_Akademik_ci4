<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'tbl_mahasiswa';
    
    protected $primaryKey = 'id'; 
    
    protected $allowedFields = ['nim', 'nama', 'alamat', 'no_hp'];

    protected $useTimestamps = false; 

    public function data_mhs($id_mhs)
    {
        return $this->find($id_mhs);
    }
    public function update_data($data, $id_mhs)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id_mhs));
        return $query;
    }
    public function delete_data($id_mhs)
    {
        $query = $this->db->table($this->table)->delete(array('id' => $id_mhs));
        return $query;
    }
}