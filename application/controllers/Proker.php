<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proker extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    // Start : User | Penelitian Dosen 

    // memuat halaman
    public function index()
    {
        $data = [
            'title' => 'Program Kerja',
            'data' => $this->m_user->getDataProker(),
        ];
        $this->load->view('proker', $data);
    }
}
