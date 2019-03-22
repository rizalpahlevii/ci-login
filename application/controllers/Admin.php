<?php 
class Admin extends CI_Controller{
  public function __construct(){   
        parent::__construct();
        is_logged_in();
  }


  public function index(){
    $data['title'] = 'Dashboard';
    $data['user'] = $this->db->get_where('user' , ['email' => $this->session->userdata('email')])->row();
    $this->load->view('template/header', $data);
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer');
  }
}


?>