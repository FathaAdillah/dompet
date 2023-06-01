<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendayagunaan extends CI_Controller
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
        $this->load->model('Pendayagunaan_model');
        

        if($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/dompet/pendayagunaan/index';

        $this->db->like('berita_acara', $data['keyword']);
        $this->db->or_like('kategori', $data['keyword']);
        $this->db->from('pendayagunaan');

        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 5;

        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $data['start'] = $this->uri->segment(3);
        $this->pagination->initialize($config);

        $data['pendayagunaan'] = $this->Pendayagunaan_model->TampilPendayagunaan($config['per_page'], $data['start'], $data['keyword']);
       

        $data['title'] = 'Halaman Pendayagunaan';
        $data['total'] = $this->Pendayagunaan_model->query_jumlah();
         

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendayagunaan/index', $data);
        $this->load->view('templates/footer');
    }
}
