<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

    function Tampil()
    {
        $this->db->get('metode_pembayaran');
        return $this->db->from('metode_pembayaran')->join('activation', 'activation.isactive_id = metode_pembayaran.isactive_id')
        ->get()
        ->result();
    }

}