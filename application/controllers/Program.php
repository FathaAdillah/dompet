<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
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

        $data['title'] = 'Halaman Program Donasi';

        $data['program'] = $this->db->get('program')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('program/index', $data);
        $this->load->view('templates/footer');
    }
}
