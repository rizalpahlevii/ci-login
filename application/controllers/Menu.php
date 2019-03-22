<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Menu extends CI_Controller{
        public function __construct(){
            parent::__construct();
            is_logged_in();
        }
        public function index(){
            $data['title'] = 'Menu Management';
            $data['user'] = $this->db->get_where('user' , ['email' => $this->session->userdata('email')])->row();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $this->form_validation->set_rules('menu', 'Menu', 'required');
            if($this->form_validation->run() == false){
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('menu/index', $data);
                $this->load->view('template/footer');
            }else{
                $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
                redirect('menu');
            }
        }


        public function submenu(){
            $data['title'] = 'Submenu Management';
            $data['user'] = $this->db->get_where('user' , ['email' => $this->session->userdata('email')])->row();
            $this->load->model('Menu_model');
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $data['subMenu'] =  $this->Menu_model->getSubMenu();

            // RULES FORM_VALIDATION
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('menu_id', 'Menu', 'required');
            $this->form_validation->set_rules('icon', 'Icon', 'required');
            $this->form_validation->set_rules('url', 'Url', 'required');
            
            if($this->form_validation->run() == false){
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('template/topbar', $data);
                $this->load->view('menu/submenu', $data);
                $this->load->view('template/footer');
            }else{
                $elm = array(
                    'menu_id' => $this->input->post('menu_id'),
                    'title' => $this->input->post('title'),
                    'url' => $this->input->post('url'),
                    'icon' => $this->input->post('icon'),
                    'is_active' => $this->input->post('is_active')
                );
                $this->db->insert('user_sub_menu', $elm);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Submenu added!</div>');
                redirect('menu/submenu');
            }
        }

        public function m_edit($id){
            $data['title'] = 'Edit Menu';
            $data['user'] = $this->db->get_where('user' , ['email' => $this->session->userdata('email')])->row();
            $data['tmp'] = $this->db->get_where('user_menu', ['id' => $id])->row();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/menu_edit', $data);
            $this->load->view('template/footer');
        }
        public function m_update(){
            $where = ['id' => $this->input->post('id')];
            $elm = ['menu' => $this->input->post('menu')];
            $this->db->update('user_menu', $elm, $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been updated!</div>');
            redirect('menu/');
        }
        public function m_delete($id){
            $where = ['id' => $id];
            $this->db->delete('user_menu', $where);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been deleted!</div>');
            redirect('menu/');
        }

        public function sm_delete($id){
            $this->db->delete('user_sub_menu' , ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu has been deleted!</div>');
            redirect('menu/submenu');
        }

        public function sm_edit($id){
            $data['title'] = 'Edit Submenu';
            $data['user'] = $this->db->get_where('user' , ['email' => $this->session->userdata('email')])->row();
            $data['menu'] = $this->db->get('user_menu')->result();
            $data['tmp'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar', $data);
            $this->load->view('menu/sm_edit', $data);
            $this->load->view('template/footer');
        }

        public function sm_update(){
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('menu_id', 'Menu', 'required');
            $this->form_validation->set_rules('icon', 'Icon', 'required');
            $this->form_validation->set_rules('url', 'Url', 'required');
            if($this->form_validation->run() == false){
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Error!</div>');
                redirect('menu/submenu');
            }else{
                $elm = array(
                    'menu_id' => $this->input->post('menu_id'),
                    'title' => $this->input->post('title'),
                    'url' => $this->input->post('url'),
                    'icon' => $this->input->post('icon'),
                    'is_active' => $this->input->post('is_active')
                );
                $this->db->update('user_sub_menu', $elm, ['id' => $this->input->post('id')]);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu has been updated!</div>');
                redirect('menu/submenu');
            }
        }
    }

 ?>