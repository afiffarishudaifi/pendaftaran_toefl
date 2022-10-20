<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_laporan_toefl extends Model
{
    protected $table = 'tes';
    protected $primaryKey = 'idtes';

    public function filter($param)
    {
    	$db      = \Config\Database::connect();
        $builder = $db->table('jadwal');
        $builder->select('jadwal.idjadwal, tes.idtes, nama_jadwal, tes.idtes, nama_pendaftar, email, tanggal_mulai_pelaksanaan, tanggal_selesai_pelaksanaan');
        $builder->join('tes','tes.idjadwal = jadwal.idjadwal');
        $builder->join('pendaftar','pendaftar.idpendaftar = tes.idpendaftar');
        // $builder->where('tes.valid', 1);
        if ($param['cek_waktu1']) $builder->where('jadwal.tanggal_selesai_pelaksanaan >= ', $param['cek_waktu1']);
        if ($param['cek_waktu2']) $builder->where('jadwal.tanggal_selesai_pelaksanaan <= ', $param['cek_waktu2']);
        
        return $builder->get();
    }
}
