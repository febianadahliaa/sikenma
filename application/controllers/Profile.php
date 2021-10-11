<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['subMenuName'] = '';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $query = $this->db->select('user.*, user_position.position, district.district')
            ->from('user')
            ->where('email', $this->session->userdata('email'))
            ->join('user_position', 'user.position_id = user_position.position_id', 'Left')
            ->join('district', 'user.district_id = district.district_id', 'Left')
            ->get();
        $data['user'] = $query->row_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('profile', $data);
        $this->load->view('partials/footer');
    }
}
