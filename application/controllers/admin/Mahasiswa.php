<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->library('upload');
        $this->load->library('form_validation');
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
            'title' => 'Admin | Data Mahasiswa',
            'isEdit' => false,
            'data' => $this->m_admin->getData('mahasiswa'),
        ];
        $this->load->view('admin/mahasiswa', $data);
    }

    // input Data mahasiswa
    public function insertMahasiswa()
    {
        $this->form_validation->set_rules('nim', 'nim', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('tlp', 'tlp', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
        $this->form_validation->set_rules('jk', 'jk', 'required');

        if ($this->form_validation->run()) {
            $nim   = $this->input->post('nim');
            $nama   = $this->input->post('nama');
            $jk   = $this->input->post('jk');
            $alamat   = $this->input->post('alamat');
            $tlp   = $this->input->post('tlp');
            $tempat_lahir   = $this->input->post('tempat_lahir');
            $tanggal_lahir   = $this->input->post('tanggal_lahir');

            $config['upload_path'] = './assets/foto/mahasiswa';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '4480';
            $config['max_height'] = '4480';
            $config['file_name'] = $_FILES['fotopost']['name'];

            $this->upload->initialize($config);
            if (!empty($_FILES['fotopost']['name'])) {
                if ($this->upload->do_upload('fotopost')) {
                    $file = $this->upload->data();
                    $data = array(
                        'nim' => $nim,
                        'nama'  => $nama,
                        'jk' => $jk,
                        'alamat' => $alamat,
                        'tlp' => $tlp,
                        'tempat_lahir' => $tempat_lahir,
                        'tanggal_lahir' => $tanggal_lahir,
                        'foto'    => $file['file_name'],
                    );
                    $this->db->insert('mahasiswa', $data);
                    redirect('admin/mahasiswa');
                } else {
                    $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                    redirect('admin/mahasiswa');
                }
            } else {
                $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                redirect('admin/mahasiswa');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/mahasiswa');
        }
    }

    // halaman edit dosen
    public function editDosen($id)
    {
        $data = [
            'title' => 'Admin | Data Dosen',
            'isEdit' => true,
            'edit' => $this->m_admin->getDataWhereRow('mahasiswa', ['id' => $id]),
            'data' => $this->m_admin->getData('mahasiswa'),
        ];
        $this->load->view('admin/mahasiswa', $data);
    }

    // ubah data mahasiswa
    public function updateMahasiswa($id)
    {
        $nim   = $this->input->post('nim');
        $nama   = $this->input->post('nama');
        $jk   = $this->input->post('jk');
        $alamat   = $this->input->post('alamat');
        $tlp   = $this->input->post('tlp');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tanggal_lahir   = $this->input->post('tanggal_lahir');

        $config['upload_path'] = './assets/foto/mahasiswa';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '4480';
        $config['max_height'] = '4480';
        $config['file_name'] = $_FILES['fotopost']['name'];

        $this->upload->initialize($config);
        if (!empty($_FILES['fotopost']['name'])) {
            $this->upload->do_upload('fotopost');
            $file = $this->upload->data()['file_name'];
        } else {
            $file = $this->m_admin->getDataWhereRow('mahasiswa', ['id' => $id])->file;
        }

        $data = array(
            'nim' => $nim,
            'nama'  => $nama,
            'jk' => $jk,
            'alamat' => $alamat,
            'tlp' => $tlp,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'foto'    => $file,
        );
        $this->db->update('mahasiswa', $data, ['id' => $id]);
        redirect('admin/mahasiswa');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mahasiswa');
        redirect('admin/mahasiswa');
    }

    public function penelitian()
    {
        $data = [
            'title' => 'Admin | Data Penelitian Mahasiswa',
            'isEdit' => false,
            'mahasiswa' => $this->m_admin->getData('mahasiswa'),
            'dosen' => $this->m_admin->getData('dosen'),
            'data' => $this->m_admin->getDataMahasiswa(),
        ];
        $this->load->view('admin/penelitian_mhs', $data);
    }

    // halaman edit penelitian dosen
    public function editPenelitian($id)
    {
        $data = [
            'title' => 'Admin | Edit Penelitian Mahasiswa',
            'isEdit' => true,
            'mahasiswa' => $this->m_admin->getData('mahasiswa'),
            'dosen' => $this->m_admin->getData('dosen'),
            'data' => $this->m_admin->getDataMahasiswa(),
            'edit' => $this->m_admin->getDataWhereRow('penelitian_mhs', ['id' => $id]),
        ];
        $this->load->view('admin/penelitian_mhs', $data);
    }

    // menginput data
    public function insertPenelitianMahasiswa()
    {
        $this->form_validation->set_rules('id_mhs', 'id_mhs', 'callback_dropdownCheck');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('tahun_penelitian', 'tahun_penelitian', 'required');
        $this->form_validation->set_rules('tempat_penelitian', 'tempat_penelitian', 'required');
        $this->form_validation->set_rules('pembimbing', 'pembimbing', 'callback_dropdownCheck');
        $this->form_validation->set_rules('penguji', 'penguji', 'callback_dropdownCheck');

        if ($this->form_validation->run()) {
            $id_mhs   = $this->input->post('id_mhs');
            $judul   = $this->input->post('judul');
            $tahun_penelitian   = $this->input->post('tahun_penelitian');
            $tempat_penelitian   = $this->input->post('tempat_penelitian');
            $pembimbing   = $this->input->post('pembimbing');
            $penguji   = $this->input->post('penguji');

            $config['upload_path'] = './assets/penelitian/mahasiswa';
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
                        'id_mhs' => $id_mhs,
                        'judul'  => $judul,
                        'tahun_penelitian' => $tahun_penelitian,
                        'tempat_penelitian' => $tempat_penelitian,
                        'pembimbing' => $pembimbing,
                        'penguji' => $penguji,
                        'file'    => $file['file_name'],
                    );
                    $this->db->insert('penelitian_mhs', $data);
                    redirect('admin/mahasiswa/penelitian');
                } else {

                    $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                    redirect('admin/mahasiswa/penelitian');
                }
            } else {

                $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
                redirect('admin/mahasiswa/penelitian');
            }
        } else {

            $this->session->set_flashdata('error', '<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert"> Input data gagal, Silahkan coba lagi !</div>');
            redirect('admin/mahasiswa/penelitian');
        }
    }

    public function dropdownCheck($str)
    {
        if ($str == '') {
            $this->form_validation->set_message('dropdownCheck', 'Please Select Your {field}');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // mengubah data
    public function updatePenelitianMahasiswa($id)
    {
        $id_mhs   = $this->input->post('id_mhs');
        $judul   = $this->input->post('judul');
        $tahun_penelitian   = $this->input->post('tahun_penelitian');
        $tempat_penelitian   = $this->input->post('tempat_penelitian');
        $pembimbing   = $this->input->post('pembimbing');
        $penguji   = $this->input->post('penguji');

        $config['upload_path'] ='./assets/penelitian/mahasiswa';
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
            $file = $this->m_admin->getDataWhereRow('penelitian_mhs', ['id' => $id])->file;
        }
        $data = array(
            'id_mhs' => $id_mhs,
            'judul'  => $judul,
            'tahun_penelitian' => $tahun_penelitian,
            'tempat_penelitian' => $tempat_penelitian,
            'pembimbing' => $pembimbing,
            'penguji' => $penguji,
            'file'    => $file,
        );
        $this->db->update('penelitian_mhs', $data, ['id' => $id]);
        redirect('admin/mahasiswa/penelitian');
    }

    public function delete_penelitian($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penelitian_mhs');
        redirect('admin/mahasiswa/penelitian');
    }
}
