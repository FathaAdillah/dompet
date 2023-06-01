<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donatur_model extends CI_Model {

    public function Tampil() {
        return $this->db->get('donatur')->result_array();
    }

    public function TampilDonatur($limit,$start,$keyword = null) {
        if($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('komitmen', $keyword);
        }
        return $this->db->get('donatur', $limit, $start)->result_array();
    }

    public function countAllDonatur() {
        return $this->db->get('donatur')->num_rows();
    }
}