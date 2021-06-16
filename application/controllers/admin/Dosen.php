<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends MY_Controller
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
            'title' => 'Admin | Data Dosen',
            'isEdit' => false,
            'jabatan' => $this->m_admin->getData('jabatan'),
            'data' => $this->m_admin->getData('dosen'),
        ];
        $this->load->view('admin/dosen', $data);
    }

    // input Data Dosen
    public function insertDosen()
    {
        $this->form_validation->set_rules('nidn', 'nidn', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('tlp', 'tlp', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');

        if ($this->form_validation->run()) {
            $nidn   = $this->input->post('nidn');
            $nama   = $this->input->post('nama');
            $id_jabatan   = $this->input->post('id_jabatan');
            $jk   = $this->input->post('jk');
            $alamat   = $this->input->post('alamat');
            $tlp   = $this->input->post('tlp');
            $tempat_lahir   = $this->input->post('tempat_lahir');
            $tanggal_lahir   = $this->input->post('tanggal_lahir');

            $config['upload_path'] = './assets/foto/dosen';
            $config['allowed_types'] = 'jpg|jpeg|png|gift|ico|icon';
            $config['max_size'] = '0';
            $config['max_width'] = '4480';
            $config['max_height'] = '4480';
            $config['file_name'] = $_FILES['fotopost']['name'];

            $this->upload->initialize($config);
            if (!empty($_FILES['fotopost']['name'])) {
                if ($this->upload->do_upload('fotopost')) {
                    $file = $this->upload->data();
                    $data = array(
                        'nidn' => $nidn,
                        'nama'  => $nama,
                        'id_jabatan' => $id_jabatan,
                        'jk' => $jk,
                        'alamat' => $alamat,
                        'tlp' => $tlp,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'foto'    => $file['file_name'],
                    );
                    $this->db->insert('dosen', $data);
                    redirect('admin/dosen');
                } else {

                    $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                    redirect('admin/dosen');
                }
            } else {

                $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                redirect('admin/dosen');
            }
        } else {

            $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/dosen');
        }
    }

    // halaman edit dosen
    public function editDosen($id)
    {
        $data = [
            'title' => 'Admin | Data Dosen',
            'isEdit' => true,
            'jabatan' => $this->m_admin->getData('jabatan'),
            'edit' => $this->m_admin->getDataWhereRow('dosen', ['id' => $id]),
            'data' => $this->m_admin->getData('dosen'),
        ];
        $this->load->view('admin/dosen', $data);
    }

    // ubah data dosen
    public function updateDosen($id)
    {
        $nidn   = $this->input->post('nidn');
        $nama   = $this->input->post('nama');
        $id_jabatan   = $this->input->post('id_jabatan');
        $jk   = $this->input->post('jk');
        $alamat   = $this->input->post('alamat');
        $tlp   = $this->input->post('tlp');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tanggal_lahir   = $this->input->post('tanggal_lahir');

        $config['upload_path'] = './assets/foto/dosen';
        $config['allowed_types'] = 'jpg|png|jpeg|icon|ico|gift';
        $config['max_size'] = '0';
        $config['max_width'] = '4480';
        $config['max_height'] = '4480';
        $config['file_name'] = $_FILES['fotopost']['name'];

        $this->upload->initialize($config);
        if (!empty($_FILES['fotopost']['name'])) {
            $this->upload->do_upload('fotopost');
            $file = $this->upload->data()['file_name'];
        } else {
            $file = $this->m_admin->getDataWhereRow('dosen', ['id' => $id])->file;
        }
        $data = array(
            'nidn' => $nidn,
            'nama'  => $nama,
            'id_jabatan' => $id_jabatan,
            'jk' => $jk,
            'alamat' => $alamat,
            'tlp' => $tlp,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'foto'    => $file,
        );
        $this->db->update('dosen', $data, ['id' => $id]);
        redirect('admin/dosen');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('dosen');
        redirect('admin/dosen');
    }

    // penelitian dosen
    public function penelitian()
    {
        $data = [
            'title' => 'Admin | Data Penelitian Dosen',
            'isEdit' => false,
            'dosen' => $this->m_admin->getData('dosen'),
            'data' => $this->m_admin->getData('penelitian_dosen'),
            'data_d' => $this->m_admin->getDataDosen(),
        ];
        $this->load->view('admin/penelitian_dosen', $data);
    }

    // halaman edit penelitian dosen
    public function editPenelitian($id)
    {
        $data = [
            'title' => 'Admin | Edit Penelitian Dosen',
            'isEdit' => true,
            'dosen' => $this->m_admin->getData('dosen'),
            'data' => $this->m_admin->getData('penelitian_dosen'),
            'edit' => $this->m_admin->getDataWhereRow('penelitian_dosen', ['id' => $id]),
            'data_d' => $this->m_admin->getDataDosen(),
        ];
        $this->load->view('admin/penelitian_dosen', $data);
    }

    // menginput data
    public function insertPenelitianDosen()
    {
        $this->form_validation->set_rules('id_dosen', 'id_dosen', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('tempat', 'tempat', 'required');
        $this->form_validation->set_rules('tahun_penelitian', 'tahun_penelitian', 'required');

        if ($this->form_validation->run()) {
            $id_dosen   = $this->input->post('id_dosen');
            $judul   = $this->input->post('judul');
            $tempat   = $this->input->post('tempat');
            $tahun_penelitian   = $this->input->post('tahun_penelitian');

            $config['upload_path'] = './assets/penelitian/dosen';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size'] = '0';
            $config['max_width'] = '4480';
            $config['max_height'] = '4480';
            $config['file_name'] = $_FILES['fotopost']['name'];

            $this->upload->initialize($config);
            if (!empty($_FILES['fotopost']['name'])) {
                if ($this->upload->do_upload('fotopost')) {
                    $file = $this->upload->data();
                    $data = array(
                        'id_dosen' => $id_dosen,
                        'judul'  => $judul,
                        'tempat'  => $tempat,
                        'tahun_penelitian' => $tahun_penelitian,
                        'file'    => $file['file_name'],
                    );
                    $this->db->insert('penelitian_dosen', $data);
                    redirect('admin/dosen/penelitian');
                } else {

                    $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                    redirect('admin/dosen/penelitian');
                }
            } else {
                $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                redirect('admin/dosen/penelitian');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/dosen/penelitian');
        }
    }

    public function updatePenelitianDosen($id)
    {
        $id_dosen   = $this->input->post('id_dosen');
        $judul   = $this->input->post('judul');
        $tempat   = $this->input->post('tempat');
        $tahun_penelitian   = $this->input->post('tahun_penelitian');

        $config['upload_path'] = './assets/penelitian/dosen';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = '0';
        $config['max_width'] = '4480';
        $config['max_height'] = '4480';
        $config['file_name'] = $_FILES['fotopost']['name'];

        $this->upload->initialize($config);
        if (!empty($_FILES['fotopost']['name'])) {
            $this->upload->do_upload('fotopost');
            $file = $this->upload->data()['file_name'];
        } else {
            $file = $this->m_admin->getDataWhereRow('penelitian_dosen', ['id' => $id])->file;
        }
        $data = array(
            'id_dosen' => $id_dosen,
            'judul'  => $judul,
            'tempat'  => $tempat,
            'tahun_penelitian' => $tahun_penelitian,
            'file'    => $file,
        );
        $this->db->update('penelitian_dosen', $data, ['id' => $id]);
        redirect('admin/dosen/penelitian');
    }

    public function delete_penelitian($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penelitian_dosen');
        redirect('admin/dosen/penelitian');
    }


    // jabatan dosen
    public function jabatan()
    {
        $data = [
            'title' => 'Admin | Data Jabatan Dosen',
            'isEdit' => false,
            'data' => $this->m_admin->getData('jabatan'),
        ];
        $this->load->view('admin/jabatan', $data);
    }

    public function insertJabatan()
    {
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');

        if ($this->form_validation->run()) {
            $jabatan   = $this->input->post('jabatan');
            $data = array(
                'nama' => $jabatan,
            );
            $this->db->insert('jabatan', $data);
            redirect('admin/dosen/jabatan');
        } else {
            $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/dosen/jabatan');
        }
    }

    public function editJabatan($id)
    {
        $data = [
            'title' => 'Admin | Edit Jabatan',
            'isEdit' => true,
            'dataEdit' => $this->m_admin->getDataWhereRow('jabatan', ['id' => $id]),
            'data' => $this->m_admin->getData('jabatan'),
        ];
        $this->load->view('admin/jabatan', $data);
    }

    public function updateJabatan($id)
    {
        $jabatan   = $this->input->post('jabatan');
        $data = array(
            'nama' => $jabatan,
        );
        $this->db->update('jabatan', $data, ['id' => $id]);
        redirect('admin/dosen/jabatan');
    }

    public function deleteJabatan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jabatan');
        redirect('admin/dosen/jabatan');
    }
}
