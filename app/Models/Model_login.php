<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_login extends Model
{
    protected $table= 'admin';
    protected $primaryKey ='id';
    protected $useTimestamps = true;

    public function loginAdmin($username)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('admin');
        $query = $builder->where('username', $username);
        return $query->get();
    }

    public function loginMahasiswa($nim)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        $query = $builder->select('idpendaftar, nim, nama_pendaftar, foto, institusi, email, password, no_telp');
        $query = $builder->where('nim', $nim);
        return $query->get();
    }

    public function addProfile($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        $query =  $builder->insert($data);
        return $query;
    }

    public function cek_nim($nim)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        $builder->select('nim');
        $builder->where('nim',$nim);
        return $builder->get();
    }
}
