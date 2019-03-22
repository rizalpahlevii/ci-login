<?php 
    class User extends CI_Controller{
        public function __construct(){
            parent::__construct();
            is_logged_in();
        }
        public function index(){
            $data['title'] = 'My Profile';
            $data['user'] = $this->db->get_where('user' , ['email' => $this->session->userdata('email')])->row();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('template/footer');
        }
    }


 ?>