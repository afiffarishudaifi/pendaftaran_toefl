<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\Model_mahasiswa_test;

class Test extends BaseController
{

    protected $Model_mahasiswa_test;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        $this->Model_mahasiswa_test = new Model_mahasiswa_test();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $tanggal = date('Y-m-d');
        $model = new Model_mahasiswa_test();
        $jadwal = $model->view_data($tanggal)->getResultArray();
        $data = [
            'judul' => 'Tabel Pelaksanaan Toefl',
            'jadwal' => $jadwal
        ];
        return view('Mahasiswa/viewTTest', $data);
    }

    public function add_test()
    {
        $session = session();
        $model = new Model_mahasiswa_test();

        $idpendaftar = $this->request->getPost('input_pendaftar');
        $idjadwal = $this->request->getPost('input_jadwal');

        $cek_terdaftar = $model->cek_terdaftar($idpendaftar, $idjadwal)->getRowArray();
        if($cek_terdaftar['idtes']) {            
            $session->setFlashdata('gagal', 'Data mahasiswa sudah sudah terdaftar');
            return redirect()->to(base_url('Mahasiswa/Test'));
        }

        $data = array(
            'idjadwal'     => $idjadwal,
            'idpendaftar'     => $idpendaftar,
            'valid'     => 0
        );

        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Mahasiswa/Test'));
    }

    public function update_test()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_mahasiswa_test();
        
        $id = $this->request->getPost('idtes');
        $idjadwal = $this->request->getPost('idjadwal');

        $avatar      = $this->request->getFile('edit_foto');
        $namabaru     = $avatar->getRandomName();
        $avatar->move('docs/img/img_bukti/', $namabaru);
        
        $data = array(
            'bukti_bayar'     => "docs/img/img_bukti/" . $namabaru
        );

        $data_foto = $model->detail_data($id)->getRowArray();

        if ($data_foto != null) {
            if ($data_foto['bukti_bayar'] != 'docs/img/img_bukti/noimage.jpg') {
                if (file_exists($data_foto['bukti_bayar'])) {
                    unlink($data_foto['bukti_bayar']);
                }
            }
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Mahasiswa/Test/detail_test' . '/' . $idjadwal));
    }

    public function delete_test()
    {
        $session = session();
        $model = new Model_mahasiswa_test();
        $id = $this->request->getPost('id');
        $idjadwal = $this->request->getPost('idjadwal');
        $data_foto = $model->detail_data($id)->getRowArray();

        if ($data_foto != null) {
            if ($data_foto['bukti_bayar'] != 'docs/img/img_bukti/noimage.jpg') {
                if (file_exists($data_foto['bukti_bayar'])) {
                    unlink($data_foto['bukti_bayar']);
                }
            }
        }
        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data ini berhasil dihapus');
        return redirect()->to('/Mahasiswa/Test');
    }

    public function cek_nim($nim)
    {
        $model = new Model_mahasiswa_test();
        $cek_nim = $model->cek_nim($nim)->getResultArray();
        $respon = json_decode(json_encode($cek_nim), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function data_edit($idpendaftar)
    {
        $model = new Model_mahasiswa_test();
        $data_pendaftar = $model->detail_data($idpendaftar)->getResultArray();
        $respon = json_decode(json_encode($data_pendaftar), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['idtes'] = $value['idtes'];
            $isi['idpendaftar'] = $value['idpendaftar'];
            $isi['nama_pendaftar'] = $value['nama_pendaftar'];
            $isi['bukti_bayar'] = $value['bukti_bayar'];
            $isi['valid'] = $value['valid'];
            $isi['sertifikat'] = $value['sertifikat'];
        endforeach;
        echo json_encode($isi);
    }

    public function detail_test($id)
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $model = new Model_mahasiswa_test();
        $jadwal = $model->view_data_detail($id)->getResultArray();

        $data = [
            'judul' => 'Tabel Detail Peserta Test',
            'jadwal' => $jadwal,
            'idjadwal' => $id
        ];
        return view('Mahasiswa/viewTTestDetail', $data);
    }    

    public function data_pendaftar()
    {
        $request = service('request');
        $postData = $request->getPost(); // OR $this->request->getPost();

        $response = array();

        $data = array();

        $db      = \Config\Database::connect();
        $builder = $this->db->table("pendaftar");

        $pendaftar = [];

        if (isset($postData['query'])) {

            $query = $postData['query'];

            // Fetch record
            $builder->select('idpendaftar, nama_pendaftar');
            $builder->like('nama_pendaftar', $query, 'both');
            $query = $builder->get();
            $data = $query->getResult();
        } else {

            // Fetch record
            $builder->select('idpendaftar, nama_pendaftar');
            $query = $builder->get();
            $data = $query->getResult();
        }

        foreach ($data as $pendaftardata) {
            $pendaftar[] = array(
                "id" => $pendaftardata->idpendaftar,
                "text" => $pendaftardata->nama_pendaftar,
            );
        }

        $response['data'] = $pendaftar;

        return $this->response->setJSON($response);
    }
}
