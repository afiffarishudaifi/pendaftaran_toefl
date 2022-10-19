<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_dashboard_admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    public function periode()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('periode');
        $builder->select('idperiode');
        return $builder->get();
    }

    public function pendaftar()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('pendaftar');
        $builder->select('idpendaftar');
        return $builder->get();
    }

    public function jadwal()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->select('idjadwal');
        return $builder->get();
    }

    public function jenis()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jenis');
        $builder->select('idjenis');
        return $builder->get();
    }
}
