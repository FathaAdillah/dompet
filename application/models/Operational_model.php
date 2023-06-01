<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operational_model extends CI_Model{

public function query_jumlah()
{   
  $sql = "SELECT sum(jumlah) as total FROM operational";
  $result = $this->db->query($sql);
  return $result->row()->total;
}
public function TampilOperational($limit,$start, $keyword = null) {
  if($keyword){
    $this->db->like('kebutuhan', $keyword);
    $this->db->or_like('kategori', $keyword);
  } 
  $this->db->order_by('tanggal', 'DESC');
  $query = $this->db->get('operational', $limit, $start)->result_array();
  return $query;
}
public function countAllOperational() {
  return $this->db->get('operational')->num_rows();
}
}