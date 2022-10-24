<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\Model_riwayat_mahasiswa_test;

class RiwayatTest extends BaseController
{

    protected $Model_riwayat_mahasiswa_test;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        $this->Model_riwayat_mahasiswa_test = new Model_riwayat_mahasiswa_test();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }

        $idpendaftar = $session->get('id_login');
        
        $model = new Model_riwayat_mahasiswa_test();
        $jadwal = $model->view_data($idpendaftar)->getResultArray();

        $data = [
            'judul' => 'Tabel Riwayat Jadwal',
            'jadwal' => $jadwal
        ];
        return view('Mahasiswa/viewTTestRiwayat', $data);
    }

    public function add_test()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();

        $avatar      = $this->request->getFile('input_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_bukti/', $namabaru);
        } else {
            $namabaru = 'noimage.jpg';
        }

        $data = array(
            'idjadwal'     => $this->request->getPost('input_jadwal'),
            'idpendaftar'     => $this->request->getPost('input_pendaftar'),
            'valid'     => $this->request->getPost('input_valid'),
            'bukti_bayar'     => "docs/img/img_bukti/" . $namabaru
        );

        $model = new Model_riwayat_mahasiswa_test();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Mahasiswa/RiwayatTest'));
    }

    public function update_test()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_riwayat_mahasiswa_test();
        
        $id = $this->request->getPost('idtes');
        $idjadwal = $this->request->getPost('idjadwal');

        $avatar      = $this->request->getFile('edit_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_bukti/', $namabaru);
            
            $data = array(
                'idjadwal'     => $this->request->getPost('edit_jadwal'),
                'idpendaftar'     => $this->request->getPost('edit_pendaftar'),
                'valid'     => $this->request->getPost('edit_valid'),
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
        } else {
            $data = array(
                'idpendaftar'     => $this->request->getPost('edit_pendaftar'),
                'valid'     => $this->request->getPost('edit_valid')
            );
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Mahasiswa/RiwayatTest/detail_test' . '/' . $idjadwal));
    }

    public function delete_test()
    {
        $session = session();
        $model = new Model_riwayat_mahasiswa_test();
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
        return redirect()->to('/Mahasiswa/RiwayatTest');
    }

    public function cek_nim($nim)
    {
        $model = new Model_riwayat_mahasiswa_test();
        $cek_nim = $model->cek_nim($nim)->getResultArray();
        $respon = json_decode(json_encode($cek_nim), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function data_edit($idpendaftar)
    {
        $model = new Model_riwayat_mahasiswa_test();
        $data_pendaftar = $model->detail_data($idpendaftar)->getResultArray();
        $respon = json_decode(json_encode($data_pendaftar), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['idtes'] = $value['idtes'];
            $isi['idpendaftar'] = $value['idpendaftar'];
            $isi['nama_pendaftar'] = $value['nama_pendaftar'];
            $isi['bukti_bayar'] = $value['bukti_bayar'];
            $isi['valid'] = $value['valid'];
        endforeach;
        echo json_encode($isi);
    }

    public function detail_test($id)
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $model = new Model_riwayat_mahasiswa_test();
        $jadwal = $model->view_data_detail($id)->getResultArray();

        $data = [
            'judul' => 'Tabel Detail Peserta Test',
            'jadwal' => $jadwal,
            'idjadwal' => $id
        ];
        return view('Mahasiswa/viewTTestDetailRiwayat', $data);
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

    public function upload_sertifikat()
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }

        $model = new Model_riwayat_mahasiswa_test();
        
        $id = $this->request->getPost('idtes');

        $avatar      = $this->request->getFile('edit_foto');
        $namabaru     = $avatar->getRandomName();
        $avatar->move('docs/img/img_sertifikat/', $namabaru);
        
        $data = array(
            'sertifikat'     => "docs/img/img_sertifikat/" . $namabaru
        );

        $data_foto = $model->detail_data($id)->getRowArray();

        if ($data_foto != null) {
            if ($data_foto['sertifikat'] != 'docs/img/img_sertifikat/noimage.jpg') {
                if (file_exists($data_foto['sertifikat'])) {
                    unlink($data_foto['sertifikat']);
                }
            }
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Mahasiswa/RiwayatTest'));
    }
}
