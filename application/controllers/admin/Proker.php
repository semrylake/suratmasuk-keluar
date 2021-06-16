<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proker extends MY_Controller
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
            'title' => 'Admin | Data Program Kerja',
            'isEdit' => false,
            'dataJenis' => $this->m_admin->getData('jenis_kegiatan'),
            'data' => $this->m_admin->getDataProker(),
        ];
        $this->load->view('admin/program_kerja', $data);
    }

    public function insertProker()
    {
        $this->form_validation->set_rules('jenis_kegiatan', 'jenis_kegiatan', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('tanggal_pelaksanaan', 'tanggal_pelaksanaan', 'required');
        $this->form_validation->set_rules('tempat', 'tempat', 'required');
        $this->form_validation->set_rules('realisasi_kegiatan', 'realisasi_kegiatan', 'required');

        if ($this->form_validation->run()) {
            $jenis_kegiatan   = $this->input->post('jenis_kegiatan');
            $deskripsi   = $this->input->post('deskripsi');
            $tanggal_pelaksanaan   = $this->input->post('tanggal_pelaksanaan');
            $tempat   = $this->input->post('tempat');
            $realisasi_kegiatan   = $this->input->post('realisasi_kegiatan');

            $config['upload_path'] = './assets/proker/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = '0';
            $config['max_width'] = '4480';
            $config['max_height'] = '4480';
            $config['file_name'] = $_FILES['fotopost']['name'];

            $this->upload->initialize($config);
            if (!empty($_FILES['fotopost']['name'])) {
                if ($this->upload->do_upload('fotopost')) {
                    $foto = $this->upload->data();
                    $data = array(
                        'id_jenis' => $jenis_kegiatan,
                        'deskripsi'  => $deskripsi,
                        'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
                        'tempat' => $tempat,
                        'realisasi_kegiatan' => $realisasi_kegiatan,
                        'file'    => $foto['file_name'],
                    );
                    $this->db->insert('program_kerja', $data);
                    redirect('admin/proker');
                } else {

                    $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                    redirect('admin/proker');
                }
            } else {

                $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                redirect('admin/proker');
            }
        } else {

            $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/proker');
        }
    }

    public function editProker($id)
    {
        $data = [
            'title' => 'Admin | Edit Program Kerja',
            'isEdit' => true,
            'dataJenis' => $this->m_admin->getData('jenis_kegiatan'),
            'dataEdit' => $this->m_admin->getDataWhereRow('program_kerja', ['id' => $id]),
            'data' => $this->m_admin->getDataProker('program_kerja'),
        ];
        $this->load->view('admin/program_kerja', $data);
    }

    public function updateProker($id)
    {
        $id_jenis   = $this->input->post('jenis_kegiatan');
        $deskripsi   = $this->input->post('deskripsi');
        $tanggal_pelaksanaan   = $this->input->post('tanggal_pelaksanaan');
        $tempat   = $this->input->post('tempat');
        $realisasi_kegiatan   = $this->input->post('realisasi_kegiatan');

        $config['upload_path'] = './assets/proker';
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
            $foto = $this->m_admin->getDataWhereRow('program_kerja', ['id' => $id])->file;
        }
        $data = array(
            'id_jenis' => $id_jenis,
            'deskripsi'  => $deskripsi,
            'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
            'tempat' => $tempat,
            'realisasi_kegiatan' => $realisasi_kegiatan,
            'file'    => $foto,
        );
        $this->db->update('program_kerja', $data, ['id' => $id]);
        redirect('admin/proker');
    }

    public function deleteProker($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('program_kerja');
        redirect('admin/proker');
    }

    // Jenis Kegiatan
    public function jenisKegiatan()
    {
        $data = [
            'title' => 'Admin | Data Jenis Kegiatan',
            'isEdit' => false,
            'data' => $this->m_admin->getData('jenis_kegiatan'),
        ];
        $this->load->view('admin/jenis_kegiatan', $data);
    }

    public function insertJenisKegiatan()
    {
        $this->form_validation->set_rules('jenis_kegiatan', 'jenis_kegiatan', 'required');

        if ($this->form_validation->run()) {
            $jenis_kegiatan   = $this->input->post('jenis_kegiatan');
            $data = array(
                'nama' => $jenis_kegiatan,
            );
            $this->db->insert('jenis_kegiatan', $data);
            redirect('admin/proker/jenisKegiatan');
        } else {
            $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/proker/jenisKegiatan');
        }
    }

    public function editJenisKegiatan($id)
    {
        $data = [
            'title' => 'Admin | Edit Program Kerja',
            'isEdit' => true,
            'dataEdit' => $this->m_admin->getDataWhereRow('jenis_kegiatan', ['id' => $id]),
            'data' => $this->m_admin->getData('jenis_kegiatan'),
        ];
        $this->load->view('admin/jenis_kegiatan', $data);
    }

    public function updateJenisKegiatan($id)
    {
        $jenis_kegiatan   = $this->input->post('jenis_kegiatan');
        $data = array(
            'nama' => $jenis_kegiatan,
        );
        $this->db->update('jenis_kegiatan', $data, ['id' => $id]);
        redirect('admin/proker/jenisKegiatan');
    }

    public function deleteJenisKegiatan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jenis_kegiatan');
        redirect('admin/proker/jenisKegiatan');
    }
}
