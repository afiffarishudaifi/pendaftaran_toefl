<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_mahasiswa_test extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'idjadwal';

    public function view_data($tanggal)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->select('jadwal.idjadwal, nama_jadwal,tanggal_mulai_daftar, tanggal_selesai_daftar, tanggal_mulai_pelaksanaan, tanggal_selesai_pelaksanaan, periode.idperiode, nama_periode, jenis.idjenis, nama_jenis');
        $builder->join('periode','periode.idperiode = jadwal.idperiode');
        $builder->join('jenis','jenis.idjenis = jadwal.idjenis');
        $builder->where('jadwal.tanggal_mulai_pelaksanaan >=',  $tanggal);
        $builder->where('periode.aktif', 1);
        $builder->where('jenis.aktif', 1);
        $builder->groupBy('jadwal.idjadwal');
        return $builder->get();
    }
    
    public function view_jenis()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jenis');
        $builder->where('aktif', 1);
        return $builder->get();
    }
    
    public function view_periode()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('periode');
        $builder->where('aktif', 1);
        return $builder->get();
    }

    public function add_data($data)
    {
        $query = $this->db->table('tes')->insert($data);
        return $query;
    }

    public function detail_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tes');
        $builder->select('idtes, nama_pendaftar, tes.idpendaftar, bukti_bayar, valid, sertifikat');
        $builder->join('pendaftar','pendaftar.idpendaftar = tes.idpendaftar');
        $builder->where('idtes', $id);
        return $builder->get();
    }

    public function update_data($data, $id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tes');
        $builder->where('idtes', $id);
        $builder->set($data);
        return $builder->update();
    }

    public function delete_data($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tes');
        $builder->where('idtes', $id);
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

    public function view_data_detail($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->select('jadwal.idjadwal, tes.idtes, nama_jadwal, tes.idtes, nama_pendaftar, email, pendaftar.idpendaftar');
        $builder->join('tes','tes.idjadwal = jadwal.idjadwal');
        $builder->join('pendaftar','pendaftar.idpendaftar = tes.idpendaftar');
        $builder->where('jadwal.idjadwal', $id);
        return $builder->get();
    }

    public function cek_terdaftar($idpendaftar, $idjadwal)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('tes');
        $builder->where('idjadwal', $idjadwal);
        $builder->where('idpendaftar', $idpendaftar);
        return $builder->get();
    }
}
