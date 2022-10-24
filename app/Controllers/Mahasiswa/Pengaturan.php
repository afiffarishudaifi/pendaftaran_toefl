<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\Model_pendaftar;

class Pengaturan extends BaseController
{

    protected $Model_dashboard;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        $this->Model_pendaftar = new Model_pendaftar();

        helper(['form', 'url']);
    }

    public function index()
    {   
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $model = new Model_pendaftar();

        $data = [
            'judul' => 'Pengaturan Akun'
        ];
        return view('Mahasiswa/viewPengaturan', $data);
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
                    'password'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                    'nama_pendaftar'     => $this->request->getPost('edit_nama'),
                    'email'     => $this->request->getPost('edit_email'),
                    'no_telp'     => $this->request->getPost('edit_no_telp'),
                    'institusi'     => $this->request->getPost('edit_institusi'),
                    'foto'     => "docs/img/img_siswa/" . $namabaru
                );
            } else {
                $data = array(
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
                    'password'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                    'nama_pendaftar'     => $this->request->getPost('edit_nama'),
                    'email'     => $this->request->getPost('edit_email'),
                    'no_telp'     => $this->request->getPost('edit_no_telp'),
                    'institusi'     => $this->request->getPost('edit_institusi')
                );
            } else {
                $data = array(
                    'nama_pendaftar'     => $this->request->getPost('edit_nama'),
                    'email'     => $this->request->getPost('edit_email'),
                    'no_telp'     => $this->request->getPost('edit_no_telp'),
                    'institusi'     => $this->request->getPost('edit_institusi')
                );
            };
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Login/logout'));
    }

    public function cek_nim($nis)
    {
        $model = new Model_pendaftar();
        $cek_nim = $model->cek_nim($nis)->getResultArray();
        $respon = json_decode(json_encode($cek_nim), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function data_edit($idpendaftar)
    {
        $model = new Model_pendaftar();
        $encrypter = \Config\Services::encrypter();

        $data_pengguna = $model->detail_data($idpendaftar)->getResultArray();
        $respon = json_decode(json_encode($data_pengguna), true);
        $data['results'] = array();
        foreach ($respon as $value) :
            $isi['idpendaftar'] = $value['idpendaftar'];
            $isi['nim'] = $value['nim'];
            $isi['nama_pendaftar'] = $value['nama_pendaftar'];
            $isi['no_telp'] = $value['no_telp'];
            $isi['email'] = $value['email'];
            $isi['institusi'] = $value['institusi'];
            $isi['foto'] = $value['foto'];
        endforeach;
        echo json_encode($isi);
    }
}
