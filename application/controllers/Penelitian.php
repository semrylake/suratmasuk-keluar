<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penelitian extends MY_Controller
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
            'title' => 'Penelitian Dosen',
            'data' => $this->m_user->getDataByDosen(),
        ];
        $this->load->view('penelitian_dosen', $data);
    }

    // Memuat Halaman
    public function mahasiswa()
    {
        $data = [
            'title' => 'Penelitian Mahasiswa',
            'data' => $this->m_user->getDataByMahasiswa(),
        ];
        $this->load->view('penelitian_mahasiswa', $data);
    }
}
