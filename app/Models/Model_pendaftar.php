<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pendaftar extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'idpendaftar';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('pendaftar')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        $builder->where('idpendaftar', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        $builder->where('idpendaftar', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        $builder->where('idpendaftar', $id);
        return $builder->delete();
    }

    public function cek_nim($nis)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        $builder->select('idpendaftar');
        $builder->where('nomor_induk', $nis);
        return $builder->get();
    }

    public function cek_foreign($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        $builder->where('idpendaftar', $id);
        return $builder->countAllResults();
    }

    public function cek_akun($nim)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        $builder->select('idpendaftar');
        $builder->where('nim', $nim);
        return $builder->get();
    }
}
