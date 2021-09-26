<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Manajemen Menu';
        $data['subMenuName'] = 'Menu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $query = $this->db->select('user_sub_menu.*, user_menu.menu')
            ->from('user_sub_menu')
            ->join('user_menu', 'user_sub_menu.menu_id = user_menu.id', 'Left')
            ->get();
        $data['subMenu'] = $query->result_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('manajemen/menu', $data);
        $this->load->view('partials/footer');
    }

    public function addMenu()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run()) {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

            $this->session->set_flashdata('message', 'Menu baru berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Isian menu harus diisi!');
        }
        redirect('manajemen/menu');
    }

    public function addSubMenu()
    {
        $this->form_validation->set_rules('sub_menu_name', 'sub_menu_name', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run()) {
            $data = [
                'sub_menu_name' => $this->input->post('sub_menu_name'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);

            $this->session->set_flashdata('message', 'Submenu baru berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Isian submenu harus diisi!');
        }
        redirect('manajemen/menu');
    }
}
