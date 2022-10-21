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
        if (!$session->get('nama_login') || $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        $this->Model_pendaftar = new Model_pendaftar();

        helper(['form', 'url']);
    }

    public function index()
    {   
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $model = new Model_pendaftar();
        $sekolah = $model->data_sekolah()->getResultArray();

        $data = [
            'judul' => 'Pengaturan Akun',
            'sekolah' => $sekolah
        ];
        return view('Mahasiswa/viewPengaturan', $data);
    }

    public function update_siswa()
    {
        $session = session();
        $encrypter = \Config\Services::encrypter();
        $model = new Model_pendaftar();
        
        $id = $this->request->getPost('id_siswa');

        $avatar      = $this->request->getFile('edit_foto');
        if ($avatar != '') {
            $namabaru     = $avatar->getRandomName();
            $avatar->move('docs/img/img_siswa/', $namabaru);

            if($this->request->getPost('edit_password') != '') {
                $data = array(
                    'id_sekolah'     => $this->request->getPost('edit_sekolah'),
                    'nomor_induk'     => $this->request->getPost('edit_nis'),
                    'password_siswa'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                    'nama_siswa'     => $this->request->getPost('edit_nama'),
                    'email_siswa'     => $this->request->getPost('edit_email'),
                    'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                    'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                    'jurusan'     => $this->request->getPost('edit_jurusan'),
                    'foto_resmi'     => "docs/img/img_siswa/" . $namabaru,
                    'id_siswa'     => $this->request->getPost('id_siswa'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            } else {
                $data = array(
                    'id_sekolah'     => $this->request->getPost('edit_sekolah'),
                    'nomor_induk'     => $this->request->getPost('edit_nis'),
                    'nama_siswa'     => $this->request->getPost('edit_nama'),
                    'email_siswa'     => $this->request->getPost('edit_email'),
                    'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                    'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                    'jurusan'     => $this->request->getPost('edit_jurusan'),
                    'foto_resmi'     => "docs/img/img_siswa/" . $namabaru,
                    'id_siswa'     => $this->request->getPost('id_siswa'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            }

            $data_foto = $model->detail_data($id)->getRowArray();

            if ($data_foto != null) {
                if ($data_foto['foto_resmi'] != 'docs/img/img_siswa/noimage.jpg') {
                    if (file_exists($data_foto['foto_resmi'])) {
                        unlink($data_foto['foto_resmi']);
                    }
                }
            }
        } else {
            if($this->request->getPost('edit_password') != '') {
                $data = array(
                    'id_sekolah'     => $this->request->getPost('edit_sekolah'),
                    'nomor_induk'     => $this->request->getPost('edit_nis'),
                    'password_siswa'     => base64_encode($encrypter->encrypt($this->request->getPost('edit_password'))),
                    'nama_siswa'     => $this->request->getPost('edit_nama'),
                    'email_siswa'     => $this->request->getPost('edit_email'),
                    'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                    'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                    'jurusan'     => $this->request->getPost('edit_jurusan'),
                    'id_siswa'     => $this->request->getPost('id_siswa'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            } else {
                $data = array(
                    'id_sekolah'     => $this->request->getPost('edit_sekolah'),
                    'nomor_induk'     => $this->request->getPost('edit_nis'),
                    'nama_siswa'     => $this->request->getPost('edit_nama'),
                    'email_siswa'     => $this->request->getPost('edit_email'),
                    'no_telp_siswa'     => $this->request->getPost('edit_no_telp'),
                    'alamat_siswa'     => $this->request->getPost('edit_alamat'),
                    'jurusan'     => $this->request->getPost('edit_jurusan'),
                    'id_siswa'     => $this->request->getPost('id_siswa'),
                    'updated_at' => date('Y-m-d H:i:s')
                );
            };
        }

        $model->update_data($data, $id);
        $session->setFlashdata('sukses', 'Data sudah berhasil diubah');
        return redirect()->to(base_url('Login/logout'));
    }

    public function cek_username($username)
    {
        $model = new Model_pendaftar();
        $cek_username = $model->cek_username($username)->getResultArray();
        $respon = json_decode(json_encode($cek_username), true);
        $data['results'] = count($respon);
        echo json_encode($data);
    }

    public function cek_nis($nis)
    {
        $model = new Model_pendaftar();
        $cek_nis = $model->cek_nis($nis)->getResultArray();
        $respon = json_decode(json_encode($cek_nis), true);
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
            $isi['nama_pendaftar'] = $value['nama_pendaftar'];
            $isi['no_telp'] = $value['no_telp'];
            $isi['email'] = $value['email'];
            $isi['institusi'] = $value['institusi'];
            $isi['foto'] = $value['foto'];
        endforeach;
        echo json_encode($isi);
    }
}
