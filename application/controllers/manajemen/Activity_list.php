<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activity_list extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Kegiatan Statistik';
        $data['subMenuName'] = 'Kegiatan';
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
        $this->load->view('manajemen/kegiatan', $data);
        $this->load->view('partials/footer');
    }
}
