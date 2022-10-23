<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_admin;

class Pengaturan extends BaseController
{

    protected $Model_dashboard;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_admin = new Model_admin();

        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_admin();

        $data = [
            'judul' => 'Pengaturan Akun'
        ];
        return view('Admin/viewPengaturan', $data);
    }

    public function update_admin()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_admin();
        date_default_timezone_set('Asia/Jakarta');
        
        $id = $this->request->getPost('idadmin');
        if($this->request->getPost('edit_password') != '') {
                $data = array(
                'username'     => $this->request->getPost('edit_username'),
                'password'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                'nama_admin'     => $this->request->getPost('edit_nama'),
                'notelp'     => $this->request->getPost('edit_no_telp'),
                'alamat'     => $this->request->getPost('edit_alamat')
            );
        } else {
            $data = array(
                'username'     => $this->request->getPost('edit_username'),
                'nama_admin'     => $this->request->getPost('edit_nama'),
                'notelp'     => $this->request->getPost('edit_no_telp'),
                'alamat'     => $this->request->getPost('edit_alamat')
            );
        };

        $model->update_data($data, $id);
        $session->setFlashdata('pengaturan', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Login/logout'));
    }
}
