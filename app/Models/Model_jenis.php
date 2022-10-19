<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_jenis extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'idjenis';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jenis');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('jenis')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jenis');
        $builder->where('idjenis', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jenis');
        $builder->where('idjenis', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jenis');
        $builder->where('idjenis', $id);
        return $builder->delete();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->where('idjenis', $id);
        return $builder->countAllResults();
    }

    public function cek_nama($nama)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jenis');
        $builder->select('idjenis');
        $builder->where('nama_jenis', $nama);
        return $builder->get();
    }
}