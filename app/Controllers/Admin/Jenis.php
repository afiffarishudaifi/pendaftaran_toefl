<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_jenis;

class Jenis extends BaseController
{

    protected $Model_jenis;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_jenis = new Model_jenis();
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_jenis();
        $jenis = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Tabel jenis',
            'jenis' => $jenis
        ];
        return view('Admin/viewTJenis', $data);
    }

    public function add_jenis()
    {
        $session = session();
        $data = array(
            'nama_jenis'     => $this->request->getPost('input_nama'),
            'valid'     => $this->request->getPost('input_valid')
        );
        $model = new Model_jenis();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Jenis'));
    }

    public function update_jenis()
    {
        $session = session();
        $model = new Model_jenis();
        
        $id = $this->request->getPost('idjenis');
        $data = array(
            'nama_jenis'     => $this->request->getPost('edit_nama'),
            'valid'     => $this->request->getPost('edit_valid')
        );

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Jenis'));
    }

    public function delete_jenis()
    {
        $session = session();
        $model = new Model_jenis();
        $id = $this->request->getPost('id');
        $foreign = $model->cek_foreign($id);
        if ($foreign == 0) {
            $model->delete_data($id);
            session()->setFlashdata('sukses', 'Data sudah berhasil dihapus');
        } else {
            session()->setFlashdata('gagal', 'Data ini dipakai di tabel lain dan tidak bisa dihapus');
        }
        return redirect()->to('/Admin/Jenis');
    }

    public function cek_nama($nama)
    {
        $model = new Model_jenis();
        $cek_nama = $model->cek_nama($nama)->getResultArray();
        $respon = json_decode(json_encode($cek_nama), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function data_edit($idjenis)
    {
        $model = new Model_jenis();
        $datajenis = $model->detail_data($idjenis)->getResultArray();
        $respon = json_decode(json_encode($datajenis), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['idjenis'] = $value['idjenis'];
            $isi['nama_jenis'] = $value['nama_jenis'];
            $isi['valid'] = $value['valid'];
        endforeach;
        echo json_encode($isi);
    }
}
