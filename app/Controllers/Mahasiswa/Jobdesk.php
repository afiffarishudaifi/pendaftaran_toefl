<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\Model_jobdesk;

class Jobdesk extends BaseController
{

    protected $Model_jobdesk;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $this->Model_jobdesk = new Model_jobdesk();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {   
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $model = new Model_jobdesk();
        $id = $session->get('id_login');
        $jobdesk = $model->view_data_siswa($id)->getResultArray();
        $data = [
            'judul' => 'Tabel Job Deskripsi',
            'jobdesk' => $jobdesk

        ];
        return view('Mahasiswa/viewJobdesk', $data);
    }

    public function add_jobdesk()
    {
        $session = session();
        $model = new Model_jobdesk();

        $data = array(
            'id_siswa'          => $session->get('id_login'),
            'nama_jobdesk'      => $this->request->getPost('input_nama'),
            'deskripsi'         => $this->request->getPost('input_deskripsi'),
            'waktu_mulai'       => $this->request->getPost('input_waktu_mulai'),
            'waktu_selesai'     => $this->request->getPost('input_waktu_selesai'),
            'status_jobdesk'    => $this->request->getPost('input_status')
        );

        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Peserta/Jobdesk'));
    }

    public function update_jobdesk()
    {
        $session = session();
        $model = new Model_jobdesk();
        date_default_timezone_set('Asia/Jakarta');

        $id = $this->request->getPost('id_jobdesk');

        $data = array(
            'id_siswa'          => $session->get('id_login'),
            'nama_jobdesk'      => $this->request->getPost('edit_nama'),
            'deskripsi'         => $this->request->getPost('edit_deskripsi'),
            'waktu_mulai'       => $this->request->getPost('edit_waktu_mulai'),
            'waktu_selesai'     => $this->request->getPost('edit_waktu_selesai'),
            'status_jobdesk'    => $this->request->getPost('edit_status'),
            'updated_at'        => date('Y-m-d H:i:s')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Mahasiswa/Jobdesk'));
    }

    public function delete_jobdesk()
    {
        $session = session();
        $model = new Model_jobdesk();
        $id = $this->request->getPost('id');

        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        return redirect()->to('/Mahasiswa/Jobdesk');
    }

    public function data_edit($id_jobdesk)
    {
        $model = new Model_jobdesk();
        $encrypter = \Config\Services::encrypter();

        $data_jobdesk = $model->detail_data($id_jobdesk)->getResultArray();
        $respon = json_decode(json_encode($data_jobdesk), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['id_jobdesk'] = $value['id_jobdesk'];
            $isi['id_siswa'] = $value['id_siswa'];
            $isi['nama_siswa'] = $value['nama_siswa'];
            $isi['nama_jobdesk'] = $value['nama_jobdesk'];
            $isi['deskripsi'] = $value['deskripsi'];
            $isi['waktu_mulai'] = $value['waktu_mulai'];
            $isi['waktu_selesai'] = $value['waktu_selesai'];
            $isi['status_jobdesk'] = $value['status_jobdesk'];
        endforeach;
        echo json_encode($isi);
    }

    public function data_siswa()
    {
        $request = service('request');
        $postData = $request->getPost(); // OR $this->request->getPost();

        $response = array();

        $data = array();

        $db      = \Config\Database::connect();
        $builder = $this->db->table("siswa");

        $poli = [];

        if (isset($postData['query'])) {

            $query = $postData['query'];

            // Fetch record
            $builder->select('id_siswa, nama_siswa');
            $builder->like('nama_siswa', $query, 'both');
            $query = $builder->get();
            $data = $query->getResult();
        } else {

            // Fetch record
            $builder->select('id_siswa, nama_siswa');
            $query = $builder->get();
            $data = $query->getResult();
        }

        foreach ($data as $siswa) {
            $poli[] = array(
                "id" => $siswa->id_siswa,
                "text" => $siswa->nama_siswa,
            );
        }

        $response['data'] = $poli;

        return $this->response->setJSON($response);
    }
}
