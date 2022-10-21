<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\Model_nilai;
use App\Models\Model_profil;
use Dompdf\Dompdf;

class Penilaian extends BaseController
{

    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        $this->Model_nilai = new Model_nilai();

        helper(['form', 'url']);
    }

    public function index()
    {	
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        $id = $session->get('id_login');
        $model = new Model_nilai();
        $nilai = $model->data_nilai($id)->getRowArray();

        $data = [
            'judul' => 'Penilaian ' . $session->get('nama_login'),
            'nilai' => $nilai
        ];
        return view('Mahasiswa/viewPenilaian', $data);
    }

    public function generate()
    {
        $session = session();
        $filename = date('y-m-d-H-i-s'). '-cetak sertifikat';

        $model = new Model_nilai();

        $id_siswa = $session->get('id_login');

        $data_nilai = $model->detail_data_cetak_peserta($id_siswa)->getRowArray();

        
        $model_profil = new Model_profil();
        $profil = $model_profil->view_data()->getRowArray();

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        $data = [
            'nama' => $data_nilai['nama_siswa'],
            'asal' => $data_nilai['nama_sekolah'],
            'jurusan' => $data_nilai['jurusan'],
            'kepala' => $profil['kepala']
        ];

        // load HTML content
        $dompdf->loadHtml(view('Admin/cetakSertifikat', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->set_option('isRemoteEnabled', true);

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
