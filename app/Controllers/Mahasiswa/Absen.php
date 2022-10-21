<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\Model_test;

class Absen extends BaseController
{

    protected $Model_test;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }

        $this->Model_test = new Model_test();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {	
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $model = new Model_test();
        $absen = $model->view_data_sudah($session->get('id_login'));

        $data = [
            'judul' => 'Form Absensi',
            'absen' => $absen
        ];
        return view('Mahasiswa/viewAbsen', $data);
    }

    public function add_absen()
    {
        $session = session();

        $avatar      = $this->request->getFile('input_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_absen/', $namabaru);
        } else {
            $namabaru = 'noimage.jpg';
        }

        $data = array(
            'id_siswa' => $session->get('id_login'),
            'foto_absen' => "docs/img/img_absen/" . $namabaru,
            'status_absen' => $this->request->getPost('input_status'),
            'keterangan' => $this->request->getPost('input_keterangan'),
            'konfirmasi_absen' => 'Menunggu'
        );

        $model = new Model_test();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Mahasiswa/Absen'));
    }
}
