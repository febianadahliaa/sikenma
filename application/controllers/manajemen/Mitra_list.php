<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra_list extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Daftar Mitra';
        $data['subMenuName'] = 'Mitra';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = $this->db->join('village', 'mitra.village_id = village.id')
            ->join('district', 'village.district_id = district.id')
            ->get('mitra');
        $data['mitraList'] = $query->result_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('manajemen/index', $data);
        $this->load->view('partials/footer');
    }
}
