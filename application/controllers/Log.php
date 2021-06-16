<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(
            'form_validation'
        );
        $this->load->model('m_login');
        $this->load->model('m_user');
    }

    public function index()
    {
        if ($this->is_logged_in()) {
            if ($this->role('admin')) {
                redirect('admin/dashboard');
            }
        } else {
            $this->load->view('login');
        }
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // get data from table
        $checkAdmin = $this->m_login->admin($username);

        if ($checkAdmin) {
            if (password_verify($password, $checkAdmin->password)) {
                $this->session->set_userdata([
                    'logData' => true,
                    'nama' => $checkAdmin->username,
                    'role' => 'admin'
                ]);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('loginFailed', '<div class="text-center text-danger mb-3">Maaf, username atau password yang salah !</div>');
                redirect('log');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="text-center text-danger mb-3">Maaf, email atau password yang salah !</div>');
            redirect('log/user_page');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('log');
    }
}
