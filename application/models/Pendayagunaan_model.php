<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendayagunaan_model extends CI_Model{

// Function Total
public function query_jumlah_pendayagunaan()
{   
  $sql = "SELECT sum(jumlah) as total FROM pendayagunaan";
  $result = $this->db->query($sql);
  return $result->row()->total;
}

// Function Tampil dan Order by Tanggal
public function TampilPendayagunaan($limit,$start, $keyword = null) {
  if($keyword){
    $this->db->like('berita_acara', $keyword);
    $this->db->or_like('kategori', $keyword);
  }
  $this->db->order_by('tanggal', 'DESC');
  $query = $this->db->get('pendayagunaan', $limit, $start)->result_array();
  return $query;
}

// Function Count Row Table
public function countAllPendayagunaan() {
  return $this->db->get('pendayagunaan')->num_rows();
}

public function getPendayagunaanById($id) { 
  return $this->db->get_where('pendayagunaan', ['id' => $id])-> row_array();
}

public function ubahPendayagunaan()
    {
      $data = [
        'tanggal' => ($this->input->post('tanggal', true)),
        'kategori' => ($this->input->post('kategori', true)),
        'penerima_manfaat' => ($this->input->post('penerima_manfaat',true)),
        'jumlah' => ($this->input->post('jumlah', true)),
        'link_dokumentasi' => ($this->input->post('link_dokumentasi', true)),
        'berita_acara' => ($this->input->post('berita_acara', true)),
    ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pendayagunaan', $data);
    }

}