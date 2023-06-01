<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelolapengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('email')){
            redirect('auth');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Kelolapengguna_model');

        $data['title'] = 'Halaman Kelola Pengguna';
        $data['users'] = $this->Kelolapengguna_model->TampilRole();
        


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kelolapengguna/index', $data);
        $this->load->view('templates/footer');
    }
}
