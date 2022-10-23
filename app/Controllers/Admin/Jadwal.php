<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_jadwal;

class Jadwal extends BaseController
{

    protected $Model_jadwal;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_jadwal = new Model_jadwal();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_jadwal();
        $jadwal = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Tabel Jadwal',
            'jadwal' => $jadwal
        ];
        return view('Admin/viewTJadwal', $data);
    }

    public function add_jadwal()
    {
        $session = session();

        $data = array(
            'idjenis'     => $this->request->getPost('input_jenis'),
            'idperiode'     => $this->request->getPost('input_periode'),
            'nama_jadwal'     => $this->request->getPost('input_nama'),
            'tanggal_mulai_daftar'     => $this->request->getPost('input_mulai_daftar'),
            'tanggal_selesai_daftar'     => $this->request->getPost('input_selesai_daftar'),
            'tanggal_mulai_pelaksanaan'     => $this->request->getPost('input_mulai_laksana'),
            'tanggal_selesai_pelaksanaan'     => $this->request->getPost('input_selesai_laksana')
        );

        $model = new Model_jadwal();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Jadwal'));
    }

    public function update_jadwal()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_jadwal();
        
        $id = $this->request->getPost('idjadwal');
        
        $data = array(
            'idjenis'     => $this->request->getPost('edit_jenis'),
            'idperiode'     => $this->request->getPost('edit_periode'),
            'nama_jadwal'     => $this->request->getPost('edit_nama'),
            'tanggal_mulai_daftar'     => $this->request->getPost('edit_mulai_daftar'),
            'tanggal_selesai_daftar'     => $this->request->getPost('edit_selesai_daftar'),
            'tanggal_mulai_pelaksanaan'     => $this->request->getPost('edit_mulai_laksana'),
            'tanggal_selesai_pelaksanaan'     => $this->request->getPost('edit_selesai_laksana')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Jadwal'));
    }

    public function delete_jadwal()
    {
        $session = session();
        $model = new Model_jadwal();
        $id = $this->request->getPost('id');

        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data ini berhasil dihapus');
        return redirect()->to('/Admin/Jadwal');
    }

    public function cek_nama($nama)
    {
        $model = new Model_jadwal();
        $cek_nama = $model->cek_nama($nama)->getResultArray();
        $respon = json_decode(json_encode($cek_nama), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function data_edit($idjadwal)
    {
        $model = new Model_jadwal();

        $data_pengguna = $model->detail_data($idjadwal)->getResultArray();
        $respon = json_decode(json_encode($data_pengguna), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['idjadwal'] = $value['idjadwal'];
            $isi['idjenis'] = $value['idjenis'];
            $isi['nama_jenis'] = $value['nama_jenis'];
            $isi['idperiode'] = $value['idperiode'];
            $isi['nama_periode'] = $value['nama_periode'];
            $isi['nama_jadwal'] = $value['nama_jadwal'];
            $isi['tanggal_mulai_daftar'] = $value['tanggal_mulai_daftar'];
            $isi['tanggal_selesai_daftar'] = $value['tanggal_selesai_daftar'];
            $isi['tanggal_mulai_pelaksanaan'] = $value['tanggal_mulai_pelaksanaan'];
            $isi['tanggal_selesai_pelaksanaan'] = $value['tanggal_selesai_pelaksanaan'];
        endforeach;
        echo json_encode($isi);
    }

    public function data_jenis()
    {
        $request = service('request');
        $postData = $request->getPost(); // OR $this->request->getPost();

        $response = array();

        $data = array();

        $db      = \Config\Database::connect();
        $builder = $this->db->table("jenis");

        $jenis = [];

        if (isset($postData['query'])) {

            $query = $postData['query'];

            // Fetch record
            $builder->select('idjenis, nama_jenis');
            $builder->like('nama_jenis', $query, 'both');
            $builder->where('aktif', 1);
            $query = $builder->get();
            $data = $query->getResult();
        } else {

            // Fetch record
            $builder->select('idjenis, nama_jenis');
            $builder->where('aktif', 1);
            $query = $builder->get();
            $data = $query->getResult();
        }

        foreach ($data as $jenisdata) {
            $jenis[] = array(
                "id" => $jenisdata->idjenis,
                "text" => $jenisdata->nama_jenis,
            );
        }

        $response['data'] = $jenis;

        return $this->response->setJSON($response);
    }    

    public function data_periode()
    {
        $request = service('request');
        $postData = $request->getPost(); // OR $this->request->getPost();

        $response = array();

        $data = array();

        $db      = \Config\Database::connect();
        $builder = $this->db->table("periode");

        $periode = [];

        if (isset($postData['query'])) {

            $query = $postData['query'];

            // Fetch record
            $builder->select('idperiode, nama_periode');
            $builder->where('aktif', 1);
            $builder->like('nama_periode', $query, 'both');
            $query = $builder->get();
            $data = $query->getResult();
        } else {

            // Fetch record
            $builder->select('idperiode, nama_periode');
            $builder->where('aktif', 1);
            $query = $builder->get();
            $data = $query->getResult();
        }

        foreach ($data as $itemperiode) {
            $periode[] = array(
                "id" => $itemperiode->idperiode,
                "text" => $itemperiode->nama_periode,
            );
        }

        $response['data'] = $periode;

        return $this->response->setJSON($response);
    }
}
