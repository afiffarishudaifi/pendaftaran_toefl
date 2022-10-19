<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'idadmin';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
		$builder->select('idadmin, nama_admin, username, alamat, notelp');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('admin')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
		$builder->select('idadmin, nama_admin, username, password, alamat, notelp');
        $builder->where('idadmin', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->where('idadmin', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->where('idadmin', $id);
        return $builder->delete();
    }

    public function cek_username($username)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
        $builder->select('idadmin');
        $builder->where('username', $username);
        return $builder->get();
    }
}