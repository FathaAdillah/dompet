<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendayagunaan_model extends CI_Model{

public function query_jumlah()
{   
  $sql = "SELECT sum(jumlah) as total FROM pendayagunaan";
  $result = $this->db->query($sql);
  return $result->row()->total;
}
public function TampilPendayagunaan($limit,$start, $keyword = null) {
  if($keyword){
    $this->db->like('berita_acara', $keyword);
    $this->db->or_like('kategori', $keyword);
  }
  $this->db->order_by('tanggal', 'DESC');
  $query = $this->db->get('pendayagunaan', $limit, $start)->result_array();
  return $query;
  
}
public function countAllPendayagunaan() {
  return $this->db->get('pendayagunaan')->num_rows();
}
}