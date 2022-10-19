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
        $jabatan = $model->data_jabatan()->getResultArray();

        $data = [
            'judul' => 'Pengaturan Akun',
            'jabatan' => $jabatan
        ];
        return view('Admin/viewPengaturan', $data);
    }

    public function update_admin()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_admin();
        
        $id = $this->request->getPost('id_admin');

        $avatar      = $this->request->getFile('edit_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_admin/', $namabaru);

            if($this->request->getPost('edit_password') != '') {
	            $data = array(
	                'id_jabatan'     => $this->request->getPost('edit_jabatan'),
	                'username_admin'     => $this->request->getPost('edit_username'),
	                'password_admin'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
	                'nama_admin'     => $this->request->getPost('edit_nama'),
	                'no_telp_admin'     => $this->request->getPost('edit_no_telp'),
	                'foto_resmi_admin'     => "docs/img/img_admin/" . $namabaru,
	                'status_admin'     => $this->request->getPost('edit_status'),
	                'id_admin'     => $this->request->getPost('id_admin'),
	                'updated_at' => date('Y-m-d H:i:s')
	            );
	        } else {
	        	$data = array(
	                'id_jabatan'     => $this->request->getPost('edit_jabatan'),
	                'username_admin'     => $this->request->getPost('edit_username'),
	                'nama_admin'     => $this->request->getPost('edit_nama'),
	                'no_telp_admin'     => $this->request->getPost('edit_no_telp'),
	                'foto_resmi_admin'     => "docs/img/img_admin/" . $namabaru,
	                'status_admin'     => $this->request->getPost('edit_status'),
	                'id_admin'     => $this->request->getPost('id_admin'),
	                'updated_at' => date('Y-m-d H:i:s')
	            );
	        }

            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto_resmi_admin'] != 'docs/img/img_admin/noimage.jpg') {
                    if (file_exists($data_foto['foto_resmi_admin'])) {
                        unlink($data_foto['foto_resmi_admin']);
                    }
                }
            }
        } else {
        	if($this->request->getPost('edit_password') != '') {
		            $data = array(
	                'id_jabatan'     => $this->request->getPost('edit_jabatan'),
	                'username_admin'     => $this->request->getPost('edit_username'),
	                'password_admin'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
	                'nama_admin'     => $this->request->getPost('edit_nama'),
	                'no_telp_admin'     => $this->request->getPost('edit_no_telp'),
	                'status_admin'     => $this->request->getPost('edit_status'),
	                'id_admin'     => $this->request->getPost('id_admin'),
	                'updated_at' => date('Y-m-d H:i:s')
	            );
	        } else {
	        	$data = array(
	                'id_jabatan'     => $this->request->getPost('edit_jabatan'),
	                'username_admin'     => $this->request->getPost('edit_username'),
	                'nama_admin'     => $this->request->getPost('edit_nama'),
	                'no_telp_admin'     => $this->request->getPost('edit_no_telp'),
	                'status_admin'     => $this->request->getPost('edit_status'),
	                'id_admin'     => $this->request->getPost('id_admin'),
	                'updated_at' => date('Y-m-d H:i:s')
	            );
	        };
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Login/logout'));
    }
}
