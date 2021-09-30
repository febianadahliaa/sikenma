<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra_track_record extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Track Record Mitra';
        $data['subMenuName'] = 'Track Record';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = $this->db->join('mitra', 'mitra_track_record.mitra_id = mitra.id')
            ->join('village', 'mitra.village_id = village.id')
            ->join('district', 'village.district_id = district.id')
            ->get('mitra_track_record');
        $data['mitraRecord'] = $query->result_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('database_mitra/index', $data);
        $this->load->view('partials/footer');
    }
}
