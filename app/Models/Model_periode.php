<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_periode extends Model
{
    protected $table = 'periode';
    protected $primaryKey = 'idperiode';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('periode');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('periode')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('periode');
        $builder->where('idperiode', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('periode');
        $builder->where('idperiode', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('periode');
        $builder->where('idperiode', $id);
        return $builder->delete();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->where('idperiode', $id);
        return $builder->countAllResults();
    }

    public function cek_nama($nama)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('periode');
        $builder->select('idperiode');
        $builder->where('nama_periode', $nama);
        return $builder->get();
    }
}