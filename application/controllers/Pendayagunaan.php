<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendayagunaan extends CI_Controller
{

    public function __construct()
    {
        // Pengecekan session user
        parent::__construct();
        if(!$this->session->userdata('email')){
            redirect('auth');
        }
    }

    public function index()
    {
        // Memanggil session user
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // Memanggil Model
        $this->load->model('Pendayagunaan_model');
        
        // Fitur Search
        if($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        $this->db->like('berita_acara', $data['keyword']);
        $this->db->or_like('kategori', $data['keyword']);
        $this->db->from('pendayagunaan');

        // Fitur Pagination
        $this->load->library('pagination');
        
        $config['base_url'] = 'http://localhost/dompet/pendayagunaan/index';
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

        $data['pendayagunaan'] = $this->Pendayagunaan_model->TampilPendayagunaan($config['per_page'], $data['start'], $data['keyword'] );
       
        // View Title
        $data['title'] = 'Halaman Pendayagunaan';
        
        // Fitur Total
        $data['total'] = $this->Pendayagunaan_model->query_jumlah_pendayagunaan();
        
         
        // Fitur Input Data
        $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('penerima_manfaat', 'Penerima Manfaat', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('link_dokumentasi', 'link Dokumentasi', 'required');
        $this->form_validation->set_rules('berita_acara', 'Berita Acara', 'required');
        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendayagunaan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'tanggal' => ($this->input->post('tanggal', true)),
                'kategori' => ($this->input->post('kategori', true)),
                'penerima_manfaat' => ($this->input->post('penerima_manfaat',true)),
                'jumlah' => ($this->input->post('jumlah', true)),
                'link_dokumentasi' => ($this->input->post('link_dokumentasi', true)),
                'berita_acara' => ($this->input->post('berita_acara', true)),
            ];
            $this->db->insert('pendayagunaan', $data);
            redirect('pendayagunaan');
        }
    }
    
// Fitur Edit
        public function ubah($id) {
        $this->load->library('form_validation');
        $data = $this->Pendayagunaan_model->getPendayagunaanById($id);
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('penerima_manfaat', 'Penerima Manfaat', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('link_dokumentasi', 'link Dokumentasi', 'required');
        $this->form_validation->set_rules('berita_acara', 'Berita Acara', 'required');
        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pendayagunaan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
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
}
