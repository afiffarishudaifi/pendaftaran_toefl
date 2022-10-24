<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_pendaftar;

class Pendaftar extends BaseController
{

    protected $Model_pendaftar;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        $this->Model_pendaftar = new Model_pendaftar();
        helper(['form', 'url']);
        $this->db = db_connect();
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }
        
        $model = new Model_pendaftar();
        $pendaftar = $model->view_data()->getResultArray();

        $data = [
            'judul' => 'Tabel Pendaftar',
            'pendaftar' => $pendaftar
        ];
        return view('Admin/viewTPendaftar', $data);
    }

    public function add_pendaftar()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();

        $avatar      = $this->request->getFile('input_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_siswa/', $namabaru);
        } else {
            $namabaru = 'noimage.jpg';
        }

        $data = array(
            'nim'     => $this->request->getPost('input_nim'),
            'nama_pendaftar'     => $this->request->getPost('input_nama'),
            'password'     => base64_encode($encrypter->encrypt($this->request->getPost('input_password'))),
            'email'     => $this->request->getPost('input_email'),
            'no_telp'     => $this->request->getPost('input_no_telp'),
            'institusi'     => $this->request->getPost('input_institusi'),
            'foto'     => "docs/img/img_siswa/" . $namabaru
        );

        $model = new Model_pendaftar();
        $model->add_data($data);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Admin/Pendaftar'));
    }

    public function update_pendaftar()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_pendaftar();
        
        $id = $this->request->getPost('idpendaftar');

        $avatar      = $this->request->getFile('edit_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_siswa/', $namabaru);

            if($this->request->getPost('edit_password') != '') {
                $data = array(
                    'nim'     => $this->request->getPost('edit_nim'),
                    'password'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                    'nama_pendaftar'     => $this->request->getPost('edit_nama'),
                    'email'     => $this->request->getPost('edit_email'),
                    'no_telp'     => $this->request->getPost('edit_no_telp'),
                    'institusi'     => $this->request->getPost('edit_institusi'),
                    'foto'     => "docs/img/img_siswa/" . $namabaru
                );
            } else {
                $data = array(
                    'nim'     => $this->request->getPost('edit_nim'),
                    'nama_pendaftar'     => $this->request->getPost('edit_nama'),
                    'email'     => $this->request->getPost('edit_email'),
                    'no_telp'     => $this->request->getPost('edit_no_telp'),
                    'institusi'     => $this->request->getPost('edit_institusi'),
                    'foto'     => "docs/img/img_siswa/" . $namabaru
                );
            }

            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto'] != 'docs/img/img_siswa/noimage.jpg') {
                    if (file_exists($data_foto['foto'])) {
                        unlink($data_foto['foto']);
                    }
                }
            }
        } else {
            if($this->request->getPost('edit_password') != '') {
                $data = array(
                    'nim'     => $this->request->getPost('edit_nim'),
                    'password'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                    'nama_pendaftar'     => $this->request->getPost('edit_nama'),
                    'email'     => $this->request->getPost('edit_email'),
                    'no_telp'     => $this->request->getPost('edit_no_telp'),
                    'institusi'     => $this->request->getPost('edit_institusi')
                );
            } else {
                $data = array(
                    'nim'     => $this->request->getPost('edit_nim'),
                    'nama_pendaftar'     => $this->request->getPost('edit_nama'),
                    'email'     => $this->request->getPost('edit_email'),
                    'no_telp'     => $this->request->getPost('edit_no_telp'),
                    'institusi'     => $this->request->getPost('edit_institusi')
                );
            };
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Admin/Pendaftar'));
    }

    public function delete_pendaftar()
    {
        $session = session();
        $model = new Model_pendaftar();
        $id = $this->request->getPost('id');
        $data_foto = $model->detail_data($id)->getRowArray();

        if ($data_foto != null) {
            if ($data_foto['foto'] != 'docs/img/img_siswa/noimage.jpg') {
                if (file_exists($data_foto['foto'])) {
                    unlink($data_foto['foto']);
                }
            }
        }
        $model->delete_data($id);
        session()->setFlashdata('sukses', 'Data ini berhasil dihapus');
        return redirect()->to('/Admin/Pendaftar');
    }

    public function cek_nim($nim)
    {
        $model = new Model_pendaftar();
        $cek_nim = $model->cek_nim($nim)->getResultArray();
        $respon = json_decode(json_encode($cek_nim), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function data_edit($idpendaftar)
    {
        $model = new Model_pendaftar();

        $data_pendaftar = $model->detail_data($idpendaftar)->getResultArray();
        $respon = json_decode(json_encode($data_pendaftar), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['idpendaftar'] = $value['idpendaftar'];
            $isi['nim'] = $value['nim'];
            $isi['nama_pendaftar'] = $value['nama_pendaftar'];
            $isi['email'] = $value['email'];
            $isi['no_telp'] = $value['no_telp'];
            $isi['institusi'] = $value['institusi'];
            $isi['foto'] = $value['foto'];
        endforeach;
        echo json_encode($isi);
    }
}
