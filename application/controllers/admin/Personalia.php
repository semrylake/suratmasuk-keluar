<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personalia extends MY_Controller
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
            'title' => 'Admin | Personalia',
            'isEdit' => false,
            'perso' => $this->m_admin->getData('data_personalia'),
            'data' => $this->m_admin->getData('dosen'),
            'hari' => $this->m_admin->getData('jenis_hari'),

        ];
        $this->load->view('admin/personalia', $data);
    }

    // input Data Dosen
    public function insertPersonalia()
    {

        $this->form_validation->set_rules('dosen', 'dosen', 'required');
        $this->form_validation->set_rules('hari', 'hari', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');
        $this->form_validation->set_rules('nama_dok', 'nama_dok', 'required');

        if ($this->form_validation->run()) {


            $dosen   = $this->input->post('dosen');
            $hari   = $this->input->post('hari');
            $tgl   = $this->input->post('tgl');
            $nama_dok   = $this->input->post('nama_dok');

            $config['upload_path'] = './assets/dosen/personalia';
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
                        'nama_dosen'  => $dosen,
                        'hari'  => $hari,
                        'tanggal'  => $tgl,
                        'nama_dokumen' => $nama_dok,
                        'file'    => $file['file_name'],
                    );
                    $this->db->insert('data_personalia', $data);
                    redirect('admin/personalia');
                } else {

                    $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                    redirect('admin/personalia');
                }
            } else {

                $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                redirect('admin/personalia');
            }
        } else {

            $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/personalia');
        }
    }

    // halaman edit dosen
    public function editPersonalia($id)
    {
        $data = [
            'title' => 'Admin | Data Personalia',
            'isEdit' => true,
            'perso' => $this->m_admin->getData('data_personalia'),
            'edit' => $this->m_admin->getDataWhereRow('data_personalia', ['id' => $id]),
            'data' => $this->m_admin->getData('dosen'),
            'hari' => $this->m_admin->getData('jenis_hari'),
        ];
        $this->load->view('admin/personalia', $data);
    }

    // ubah data dosen
    public function updatePersonalia($id)
    {
        $dosen   = $this->input->post('dosen');
        $hari   = $this->input->post('hari');
        $tgl   = $this->input->post('tgl');
        $nama_dok   = $this->input->post('nama_dok');

        $config['upload_path'] = './assets/dosen/personalia';
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
            $file = $this->m_admin->getDataWhereRow('data_personalia', ['id' => $id])->file;
        }
        $data = array(
            'nama_dosen'  => $dosen,
            'hari'  => $hari,
            'tanggal'  => $tgl,
            'nama_dokumen' => $nama_dok,
            'file'    => $file,
        );
        $this->db->update('data_personalia', $data, ['id' => $id]);
        redirect('admin/personalia');
    }

    public function deletePersonalia($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_personalia');
        redirect('admin/personalia');
    }
}
