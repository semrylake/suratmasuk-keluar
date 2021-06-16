<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        if ($this->is_logged_in()) {
            if (!$this->role('admin')) {
                redirect('log');
            }
        } else {
            redirect('log');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Fakultas Filsafat',
            'dosen' => $this->m_admin->getData('dosen'),
            'mahasiswa' => $this->m_admin->getData('mahasiswa'),
            'penelitianDosen' => $this->m_admin->getData('penelitian_dosen'),
            'penelitianMhs' => $this->m_admin->getData('penelitian_mhs'),
            'suratMasuk' => $this->m_admin->getData_where('surat', ['jenis' => 'surat masuk']),
            'suratKeluar' => $this->m_admin->getData_where('surat', ['jenis' => 'surat keluar']),
            'Kegiatan' => $this->m_admin->getData('program_kerja'),
            'Personalia' => $this->m_admin->getData('data_personalia'),
            'Peng_Mas' => $this->m_admin->getData('data_pengabdian'),

        ];
        $this->load->view('admin/index', $data);
    }
}
