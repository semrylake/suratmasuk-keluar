<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
        // if ($this->is_logged_in()) {
        //     if (!$this->role('admin')) {
        //         redirect('log');
        //     }
        // } else {
        //     redirect('log');
        // }
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'jenis_kegiatan' => $this->m_user->getData('jenis_kegiatan'),
            'kegiatan' => $this->m_user->getData('program_kerja')
        ];
        $this->load->view('home', $data);
    }
}
