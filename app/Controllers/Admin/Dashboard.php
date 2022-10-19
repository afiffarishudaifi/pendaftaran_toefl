<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Model_dashboard_admin;

class Dashboard extends BaseController
{

    protected $Model_dashboard_admin;
    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }

        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        if (!$session->get('nama_login') || $session->get('status_login') != 'Admin') {
            return redirect()->to('Login/loginAdmin');
        }

        $model = new Model_dashboard_admin();
        $periode = $model->periode()->getRowArray();
        var_dump($periode);
        $pendaftar = $model->pendaftar()->getRowArray();
        $jadwal = $model->jadwal()->getRowArray();
        $jenis = $model->jenis()->getRowArray();

        // $periode = $periode['idperiode'] ? $periode['idperiode'] : 0;
        // $pendaftar = $pendaftar['idpendaftar'] ? $pendaftar['idpendaftar'] : 0;
        // $jadwal = $jadwal['idjadwal'] ? $jadwal['idjadwal'] : 0;
        // $jenis = $jenis['idjenis'] ? $jenis['idjenis'] : 0;
        
        $data = [
            // 'periode' => $periode,
            // 'pendaftar' => $pendaftar,
            // 'jadwal' => $jadwal,
            // 'jenis' => $jenis
            'periode' => 20,
            'pendaftar' => 20,
            'jadwal' => 20,
            'jenis' => 20
        ];
        return view('Admin/index', $data);
    }
}
