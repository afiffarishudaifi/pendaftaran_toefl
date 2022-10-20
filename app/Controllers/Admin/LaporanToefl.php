<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_laporan_toefl;

class LaporanToefl extends BaseController
{

    protected $Model_laporan_toefl;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_laporan_toefl = new Model_laporan_toefl();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $data = [
            'judul' => 'Laporan Kegiatan Toefl'
        ];
        return view('Admin/viewLaporanToefl', $data);
    }

    public function data($tanggal = null)
    {
        $session = session();

        if ($tanggal) $tgl = explode(' - ', $tanggal);
        if ($tanggal) { $param['cek_waktu1'] = date("Y-m-d", strtotime($tgl[0])); } else { $param['cek_waktu1'] = date("Y-m-d"); };
        if ($tanggal) { $param['cek_waktu2'] = date("Y-m-d", strtotime($tgl[1])); } else { $param['cek_waktu2'] = date("Y-m-d"); };

        $model = new Model_laporan_toefl();
        $laporan = $model->filter($param)->getResultArray();

        $respon = $laporan;
        $data = array();

        if ($respon) {
            foreach ($respon as $value) {
                $isi['nama_jadwal'] = $value['nama_jadwal'];
                $isi['nama_pendaftar'] = $value['nama_pendaftar'];
                $isi['email'] = $value['email'];
                $isi['tanggal_mulai_pelaksanaan'] = $value['tanggal_mulai_pelaksanaan'];
                $isi['tanggal_selesai_pelaksanaan'] = $value['tanggal_selesai_pelaksanaan'];
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

        $model = new Model_laporan_toefl();
        $laporan = $model->filter($param)->getResultArray();
        $data = [
            'judul' => 'Laporan Pelaksanaan Toefl ' . $tanggal,
            'laporan' => $laporan
        ];
        return view('Admin/cetakLaporanToefl', $data);
    }

    public function data_jadwal()
    {
        $request = service('request');
        $postData = $request->getPost(); // OR $this->request->getPost();

        $response = array();

        $data = array();

        $db      = \Config\Database::connect();
        $builder = $this->db->table("jadwal");

        $jadwal = [];

        if (isset($postData['query'])) {

            $query = $postData['query'];

            // Fetch record
            $builder->select('idjadwal, nama_jadwal');
            $builder->like('nama_jadwal', $query, 'both');
            $query = $builder->get();
            $data = $query->getResult();
        } else {

            // Fetch record
            $builder->select('idjadwal, nama_jadwal');
            $query = $builder->get();
            $data = $query->getResult();
        }

        foreach ($data as $jadwaltardata) {
            $jadwal[] = array(
                "id" => $jadwaltardata->idjadwal,
                "text" => $jadwaltardata->nama_jadwal,
            );
        }

        $response['data'] = $jadwal;

        return $this->response->setJSON($response);
    }
}
