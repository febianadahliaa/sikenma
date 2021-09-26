<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra_data extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Data Mitra';
        $data['subMenuName'] = 'Data Mitra';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('database_mitra/mitra_data', $data);
        $this->load->view('partials/footer');
    }
}
