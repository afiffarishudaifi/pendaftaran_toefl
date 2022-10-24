<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    public function __construct()
    {
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }

        helper(['form', 'url']);
    }

    public function index()
    {   
        $session = session();
        if (!$session->get('nama_login') && $session->get('status_login') != 'Mahasiswa') {
            return redirect()->to(base_url('/'));
        }
        
        return view('Mahasiswa/index');
    }
}
