<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\Model_laporan_absen;
use App\Models\Model_profil;

class LaporanAbsensi extends BaseController
{

    protected $Model_laporan_absen;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $this->Model_laporan_absen = new Model_laporan_absen();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {   
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $data = [
            'judul' => 'Laporan Absensi ' . $session->get('nama_login')
        ];
        return view('Mahasiswa/viewLaporanAbsen', $data);
    }

    public function data($tanggal = null, $status = null)
    {
        $session = session();

        if ($tanggal) $tgl = explode(' - ', $tanggal);
        if ($tanggal) { $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0])); } else { $param['cek_waktu1'] = date("Y-m-d"); };
        if ($tanggal) { $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1])); } else { $param['cek_waktu2'] = date("Y-m-d"); };

        if ($status != 'null') {
            $param['status_absen'] = $status;
        } else {
            $param['status_absen'] = null;
        }

        $param['id_siswa'] = $session->get('id_login');

        $model = new Model_laporan_absen();
        $laporan = $model->peserta_filter($param)->getResultArray();

        $respon = $laporan;
        $data = array();

        if ($respon) {
            foreach ($respon as $value) {
                $isi['id_absen'] = $value['id_absen'];
                $isi['nama_siswa'] = $value['nama_siswa'];
                $isi['status_absen'] = $value['status_absen'];
                $isi['keterangan'] = $value['keterangan'];
                $isi['konfirmasi_absen'] = $value['konfirmasi_absen'];
                $isi['waktu_absen'] = $value['waktu_absen'];
                array_push($data, $isi);
            }
        }

        echo json_encode($data);
    }

    public function data_cetak()
    {
        $session = session();

        $status = $this->request->getPost('input_status');
        $tanggal = $this->request->getPost('tanggal');

        if ($tanggal) $tgl = explode(' - ', $tanggal);
        if ($tanggal) { $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0])); } else { $param['cek_waktu1'] = date("Y-m-d"); };
        if ($tanggal) { $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1])); } else { $param['cek_waktu2'] = date("Y-m-d"); };

        if ($status != 'null') {
            $param['status_absen'] = $status;
        } else {
            $param['status_absen'] = null;
        }

        $param['id_siswa'] = $session->get('id_login');

        $model = new Model_laporan_absen();
        $laporan = $model->peserta_filter($param)->getResultArray();
        $model_profil = new Model_profil();
        $profil = $model_profil->view_data()->getRowArray();
        $data = [
            'judul' => 'Laporan Absensi Magang ' . $tanggal,
            'laporan' => $laporan,
            'profil' => $profil
        ];
        return view('Mahasiswa/cetakLaporanAbsensi', $data);
    }
}
