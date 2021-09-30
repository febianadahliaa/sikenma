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

        $query = $this->db->join('mitra', 'mitra_track_record.mitra_id = mitra.id')
            ->join('village', 'mitra.village_id = village.id')
            ->join('district', 'village.district_id = district.id')
            ->join('activity', 'mitra_track_record.activity_id = activity.id')
            ->join('user', 'mitra_track_record.user_id = user.nip')
            ->get('mitra_track_record');
        $data['mitraRecord'] = $query->result_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('database_mitra/mitra-data', $data);
        $this->load->view('partials/footer');
    }
}
