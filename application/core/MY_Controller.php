<?php
class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function is_logged_in()
    {
        $user = $this->session->userdata('logData');
        return isset($user);
    }

    public function role($role_user)
    {
        $role = $this->session->userdata('role');
        if ($role == $role_user) {
            return true;
        } else {
            return false;
        }
    }
}
