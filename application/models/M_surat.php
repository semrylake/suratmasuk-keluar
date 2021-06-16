<?php

class M_admin extends CI_Model
{
    public function get_jumlah_suratmasuk($bulan,$tahun){
        $this->db->from('surat_masuk');
        $this->db->where('MONTH(`suratmasuk_waktu`)',$bulan);
        $this->db->where('YEAR(`suratmasuk_waktu`)',$tahun);
        $this->db->where('suratmasuk_hapus','N');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function get($bulan,$tahun){
        $this->db->from('surat_masuk');
        $this->db->where('MONTH(`suratmasuk_waktu`)',$bulan);
        $this->db->where('YEAR(`suratmasuk_waktu`)',$tahun);
        $this->db->where('suratmasuk_hapus','N');
        $query = $this->db->get();
        return $query->result();
    }
}
?>