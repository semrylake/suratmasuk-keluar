<?php

class M_login extends CI_Model
{
    public function admin($username)
    {
        $this->db->from('admin');
        $this->db->where('username', $username);
        return  $this->db->get()->row();
    }

    public function operator($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        return  $this->db->get()->row();
    }
}
