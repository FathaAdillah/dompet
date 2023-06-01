<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelolapengguna_model extends CI_Model {

    function TampilRole()
    {
        $this->db->get('user');
        return $this->db->from('user')->join('user_role', 'user_role.role_id = user.role_id')->join('activation', 'activation.isactive_id = user.isactive_id')
        ->get()
        ->result();
    }

}