<?php

class M_user extends CI_Model
{
    
    public function getData($table)
    {
        $this->db->from($table);
        return $this->db->get()->result();
    }
 
    public function getData_where($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->result();
    }

    public function getDataByDosen()
    {
        $query = $this->db->query("SELECT penelitian_dosen.*, dosen.nama FROM penelitian_dosen, dosen WHERE dosen.id = penelitian_dosen.id_dosen");
        return $query->result();
    }

    public function getDataByMahasiswa()
    {
        $query = $this->db->query("SELECT penelitian_mhs.*, mahasiswa.nama FROM penelitian_mhs, mahasiswa WHERE mahasiswa.id = penelitian_mhs.id_mhs");
        return $query->result();
    }

    public function getDataWhereRow($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->row();
    }

    public function getDataProker()
    {
        return $this->db->query("SELECT program_kerja.*, jenis_kegiatan.nama FROM program_kerja, jenis_kegiatan WHERE program_kerja.id_jenis = jenis_kegiatan.id")->result();
    }
}
