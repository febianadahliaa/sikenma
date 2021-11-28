<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surveys extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Kegiatan Statistik BPS Kabupaten Wakatobi';
        $data['subMenuName'] = 'Kegiatan Statistik';
        $data['menuName'] = 'Mitra_Rating';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('mitra_rating/surveys', $data);
        $this->load->view('partials/footer');
    }
}
