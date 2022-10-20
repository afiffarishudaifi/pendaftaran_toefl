<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'idjadwal';

    public function view_data()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        return $builder->get();
    }
    
    public function view_jenis()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jenis');
        return $builder->get();
    }
    
    public function view_periode()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('periode');
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('jadwal')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->select('idjadwal, nama_jadwal,tanggal_mulai_daftar, tanggal_selesai_daftar, tanggal_mulai_pelaksanaan, tanggal_selesai_pelaksanaan, periode.idperiode, nama_periode, jenis.idjenis, nama_jenis');
        $builder->where('idjadwal', $id);
        $builder->join('periode','periode.idperiode = jadwal.idperiode');
        $builder->join('jenis','jenis.idjenis = jadwal.idjenis');
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->where('idjadwal', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->where('idjadwal', $id);
        return $builder->delete();
    }

    public function cek_nama($nama)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->select('idjadwal');
        $builder->where('nama_jadwal', $nama);
        return $builder->get();
    }
}
