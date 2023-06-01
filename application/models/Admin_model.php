<?php

/**
 *
 */
class Admin_model extends CI_Model
{


    public function __construct()
    {

        $this->load->database();
    }



    public function getAllPertanyaan()
    {
        $this->db->select('*');
        $this->db->from('tabelpertanyaan');
        $query = $this->db->get();
        return $query;
    }

    public function getAllPenyakit()
    {
        $this->db->select('*');
        $this->db->from('tabelpenyakit');
        $query = $this->db->get();
        return $query;
    }

    public function getAllUser()
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $query = $this->db->get();
        return $query;
    }

    public function getAllDiagnosa()
    {
        $this->db->select('*');
        $this->db->from('log_hasil');
        $query = $this->db->get();
        return $query;
    }
}
