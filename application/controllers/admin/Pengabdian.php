<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengabdian extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->library('form_validation');
        $this->load->library('upload');

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
            'title' => 'Admin | Pengabdian',
            'isEdit' => false,
            'data_peng' => $this->m_admin->getData('data_pengabdian'),
            'data' => $this->m_admin->getData('dosen'),
          
           
        ];
        $this->load->view('admin/pengabdian', $data);
    }

    // input Data Dosen
    public function insertPengabdian()
    {
        
        $this->form_validation->set_rules('dosen', 'dosen', 'required');
        $this->form_validation->set_rules('kegiatan', 'kegiatan', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
        $this->form_validation->set_rules('tempat', 'tempat', 'required');
        $this->form_validation->set_rules('realisasi', 'realisasi', 'required');

        if ($this->form_validation->run()) {
            

            $dosen   = $this->input->post('dosen');
            $kegiatan   = $this->input->post('kegiatan');
            $tgl   = $this->input->post('tgl');
            $tempat   = $this->input->post('tempat');
            $realisasi   = $this->input->post('realisasi');

            $config['upload_path'] = './assets/dosen/pengabdian';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = '0';
            $config['max_width'] = '4480';
            $config['max_height'] = '4480';
            $config['file_name'] = $_FILES['filepost']['name'];

            $this->upload->initialize($config);
            if (!empty($_FILES['filepost']['name'])) {
                if ($this->upload->do_upload('filepost')) {
                    $file = $this->upload->data();
                    $data = array(
                        'nama'  => $dosen,
                        'kegiatan'  => $kegiatan,
                        'tgl'  => $tgl,
                        'tempat'  => $tempat,
                        'realisasi' => $realisasi,
                        'file'    => $file['file_name'],
                    );
                    $this->db->insert('data_pengabdian', $data);
                    redirect('admin/pengabdian');
                } else {

                    $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                    redirect('admin/pengabdian');
                }
            } else {

                $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                redirect('admin/pengabdian');
            }
        } else {

            $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/pengabdian');
        }
    }

    // halaman edit dosen
    public function editPengabdian($id)
    {
        $data = [
            'title' => 'Admin | Pengabdian',
            'isEdit' => true,
            'data_peng' => $this->m_admin->getData('data_pengabdian'),
            'data' => $this->m_admin->getData('dosen'),
            'edit' => $this->m_admin->getDataWhereRow('data_pengabdian', ['id' => $id]),
        ];
        $this->load->view('admin/pengabdian', $data);
    }

    // ubah data dosen
    public function updatePengabdian($id)
    {
        $dosen   = $this->input->post('dosen');
        $kegiatan   = $this->input->post('kegiatan');
        $tgl   = $this->input->post('tgl');
        $tempat   = $this->input->post('tempat');
        $realisasi   = $this->input->post('realisasi');

        $config['upload_path'] = './assets/dosen/pengabdian';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = '0';
        $config['max_width'] = '4480';
        $config['max_height'] = '4480';
        $config['file_name'] = $_FILES['filepost']['name'];

        $this->upload->initialize($config);
        if (!empty($_FILES['filepost']['name'])) {
            $this->upload->do_upload('filepost');
            $file = $this->upload->data()['file_name'];
        } else {
            $file = $this->m_admin->getDataWhereRow('data_pengabdian', ['id' => $id])->file;
        }
        $data = array(
            'nama'  => $dosen,
            'kegiatan'  => $kegiatan,
            'tgl'  => $tgl,
            'tempat'  => $tempat,
            'realisasi' => $realisasi,
            'file'    => $file,
        );
        $this->db->update('data_pengabdian', $data, ['id' => $id]);
        redirect('admin/pengabdian');
    }

    public function deletePengabdian($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_pengabdian');
        redirect('admin/pengabdian');
    }
}
