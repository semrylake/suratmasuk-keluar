<?php

class M_admin extends CI_Model
{

    public function getData($table)
    {
        $this->db->from($table);
        return $this->db->get()->result();
    }

    public function getDataMahasiswa()
    {
        return $this->db->query("SELECT mahasiswa.nama AS namaMahasiswa, penelitian_mhs.* FROM mahasiswa, penelitian_mhs WHERE mahasiswa.id = penelitian_mhs.id_mhs")->result();
    }

    public function getDataDosen()
    {
        return $this->db->query("SELECT dosen.nama AS namaDosen, penelitian_dosen.* FROM dosen, penelitian_dosen WHERE dosen.id = penelitian_dosen.id_dosen")->result();
    }

    public function getData_where($table, $where)
    {
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->get()->result();
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
