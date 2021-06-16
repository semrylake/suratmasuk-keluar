<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_keluar extends MY_Controller
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
            'title' => 'Admin | Data Surat Keluar',
            'surat' => 'surat keluar',
            'isEdit' => false,
            'data' => $this->m_admin->getData_where('surat', ['jenis' => 'surat keluar']),
        ];
        $this->load->view('admin/surat', $data);
    }

    public function insert()
    {
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('agenda', 'agenda', 'required');
        $this->form_validation->set_rules('asal_surat', 'asal_surat', 'required');
        $this->form_validation->set_rules('tanggal_surat', 'tanggal_surat', 'required');
        $this->form_validation->set_rules('nomor_surat', 'nomor_surat', 'required');

        if ($this->form_validation->run()) {
            $desc   = $this->input->post('deskripsi');
            $agenda   = $this->input->post('agenda');
            $asal_surat   = $this->input->post('asal_surat');
            $tanggal_surat   = $this->input->post('tanggal_surat');
            $nomor_surat   = $this->input->post('nomor_surat');

            $config['upload_path'] = './assets/surat';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = '0';
            $config['max_width'] = '4480';
            $config['max_height'] = '4480';
            $config['file_name'] = $_FILES['fotopost']['name'];

            $this->upload->initialize($config);
            if (!empty($_FILES['fotopost']['name'])) {
                if ($this->upload->do_upload('fotopost')) {
                    $foto = $this->upload->data()['file_name'];
                    $data = array(
                        'deskripsi'  => $desc,
                        'agenda'  => $agenda,
                        'asal_surat'  => $asal_surat,
                        'tanggal_surat'  => $tanggal_surat,
                        'nomor_surat'  => $nomor_surat,
                        'jenis' => 'surat keluar',
                        'file'    => $foto,
                    );
                    $this->db->insert('surat', $data);
                    redirect('admin/surat_keluar');
                } else {
                    $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                    redirect('admin/surat_keluar');
                }
            } else {
                $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                redirect('admin/surat_keluar');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/surat_keluar');
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Admin | Edit Surat Keluar',
            'surat' => 'surat keluar',
            'isEdit' => true,
            'dataEdit' => $this->m_admin->getDataWhereRow('surat', ['id' => $id]),
            'data' => $this->m_admin->getData_where('surat', ['jenis' => 'surat keluar']),

        ];
        $this->load->view('admin/surat', $data);
    }

    public function update($id)
    {
        $desc   = $this->input->post('deskripsi');
        $agenda   = $this->input->post('agenda');
        $asal_surat   = $this->input->post('asal_surat');
        $tanggal_surat   = $this->input->post('tanggal_surat');
        $nomor_surat   = $this->input->post('nomor_surat');

        $config['upload_path'] = './assets/surat';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = '0';
        $config['max_width'] = '4480';
        $config['max_height'] = '4480';
        $config['file_name'] = $_FILES['fotopost']['name'];

        $this->upload->initialize($config);
        if (!empty($_FILES['fotopost']['name'])) {
            $this->upload->do_upload('fotopost');
            $foto = $this->upload->data()['file_name'];
        } else {
            $foto = $this->m_admin->getDataWhereRow('surat', ['id' => $id])->file;
        }
        $data = array(
            'deskripsi'  => $desc,
            'agenda'  => $agenda,
            'asal_surat'  => $asal_surat,
            'tanggal_surat'  => $tanggal_surat,
            'nomor_surat'  => $nomor_surat,
            'jenis' => 'surat keluar',
            'file'    => $foto,
        );
        $this->db->update('surat', $data, ['id' => $id]);
        redirect('admin/surat_keluar');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat');
        redirect('admin/surat_keluar');
    }
}
