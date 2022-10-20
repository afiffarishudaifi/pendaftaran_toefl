<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_periode;

class Periode extends BaseController
{

    protected $Model_periode;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_periode = new Model_periode();
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_periode();
        $periode = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Tabel Periode',
            'periode' => $periode
        ];
        return view('Admin/viewTPeriode', $data);
    }

    public function add_periode()
    {
        $session = session();
        $data = array(
            'nama_periode'     => $this->request->getPost('input_nama'),
            'valid'     => $this->request->getPost('input_valid')
        );
        $model = new Model_periode();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Periode'));
    }

    public function update_periode()
    {
        $session = session();
        $model = new Model_periode();
        
        $id = $this->request->getPost('idperiode');
        $data = array(
            'nama_periode'     => $this->request->getPost('edit_nama'),
            'valid'     => $this->request->getPost('edit_valid')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Periode'));
    }

    public function delete_periode()
    {
        $session = session();
        $model = new Model_periode();
        $id = $this->request->getPost('id');
        $foreign = $model->cek_foreign($id);
        if ($foreign == 0) {
            $model->delete_data($id);
            session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        } else {
            session()->setFlashdata('gagal', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        }
        return redirect()->to('/Admin/Periode');
    }

    public function cek_nama($nama)
    {
        $model = new Model_periode();
        $cek_nama = $model->cek_nama($nama)->getResultArray();
        $respon = json_decode(json_encode($cek_nama), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function data_edit($idperiode)
    {
        $model = new Model_periode();
        $dataperiode = $model->detail_data($idperiode)->getResultArray();
        $respon = json_decode(json_encode($dataperiode), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['idperiode'] = $value['idperiode'];
            $isi['nama_periode'] = $value['nama_periode'];
            $isi['valid'] = $value['valid'];
        endforeach;
        echo json_encode($isi);
    }
}
