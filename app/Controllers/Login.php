<?php

namespace App\Controllers;
use App\Models\Model_login;
use App\Models\Model_pendaftar;

class Login extends BaseController
{
    public function index()
    {
        $session = session();

        if ($session->get('nama_login') || $session->get('status_login') == 'Siswa') {
            return redirect()->to('Peserta/Dashboard');
        } else if ($session->get('nama_login') || $session->get('status_login') == 'Admin') {
            return redirect()->to('Admin/Dashboard');
        }

        helper(['form']);
        return view('viewLogin');
    }

    public function loginAdmin()
    {
        $session = session();

        if ($session->get('nama_login') || $session->get('status_login') == 'Admin') {
            return redirect()->to('Admin/Dashboard');
        } 

        helper(['form']);
        return view('viewLoginAdmin');
    }

    public function loginSistemAdmin()
    {
        $session = session();

        $model = new Model_login();
        $encrypter = \Config\Services::encrypter();
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = $model->loginAdmin($username)->getRowArray();

        if ($data) {
            $pass = $data['password'];
            $status = 'Admin';
            $verify_pass = $encrypter->decrypt(base64_decode($pass));
            if ($verify_pass == $password) {
                $ses_data = [
                    'id_login' => $data['idadmin'],
                    'nama_login' => $data['nama_admin'],
                    'foto' => 'no_image.png',
                    'status_login' => $status,
                    'logged_in' => TRUE,
                    'is_admin' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/Admin/Dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Tidak Sesuai');
                return redirect()->to('/Login/loginAdmin');
            }
        } else {
            $session->setFlashdata('msg', 'Username Tidak di Temukan');
            return redirect()->to('/Login/loginAdmin');
        }
    }


    public function loginSistem()
    {
        $session = session();

        if ($session->get('nama_login') || $session->get('status_login') == 'Mahasiswa') {
            return redirect()->to('Mahsiswa/Dashboard');
        } else if ($session->get('nama_login') || $session->get('status_login') == 'Admin') {
            return redirect()->to('Admin/Dashboard');
        }
        
        $model = new Model_login();
        $encrypter = \Config\Services::encrypter();

        $nim = $this->request->getPost('nim');
        $password = $this->request->getPost('password');

        $data = $model->loginMahasiswa($nim)->getRowArray();
        var_dump($data);

        if ($data) {
            $pass = $data['password'];
            $status = 'Mahasiswa';
            $verify_pass =  $encrypter->decrypt(base64_decode($pass));
            if ($verify_pass == $password) {
                $ses_data = [
                    'id_login' => $data['idpendaftar'],
                    'nama_login' => $data['nama_pendaftar'],
                    'foto' => $data['foto'],
                    'status_login' => $status,
                    'logged_in' => TRUE,
                    'is_admin' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/Mahasiswa/Dashboard');
            } else {
                $session->setFlashdata('msg', 'Password Tidak Sesuai');
                return redirect()->to('/Login');
            }
        } else {
            $session->setFlashdata('msg', 'NIM Tidak di Temukan');
            return redirect()->to('/Login');
        }
    }

    public function registrasiMahasiswa()
    {
        $session = session();
        return view('viewRegistrasi');
    }

    public function simpanMahasiswa()
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
        return redirect()->to(base_url('Login/registrasiMahasiswa'));
    }

    public function resetPassword()
    {
        $session = session();
        return view('viewResetPassword');
    }

    public function prosesResetPassword()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_pendaftar();
        $nim = $this->request->getPost('input_nim');
        $password = $this->request->getPost('input_password');
        $konf_password = $this->request->getPost('input_konf_password');
        $cek_akun = $model->cek_akun($nim)->getRowArray();
        if ($cek_akun == null) {
            $session->setFlashdata('gagal', 'Data tidak ditemukan');
            return redirect()->to(base_url('Login/resetPassword'));
        }
        $id = $cek_akun['idpendaftar'];
        $data = array(
            'password' => base64_encode($encrypter->encrypt($this->request->getPost('input_password')))
        );
        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil ditambah');
        return redirect()->to(base_url('Login/resetPassword'));
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/Login');
    }
}
