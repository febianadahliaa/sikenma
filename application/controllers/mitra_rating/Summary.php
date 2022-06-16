<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Summary extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Summary Track Record Mitra';
        $data['subMenuName'] = 'Summary';
        $data['menuName'] = 'Mitra_Rating';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = $this->db->join('mitra', 'mitra_track_record.mitra_id = mitra.mitra_id')
            ->join('village', 'mitra.village_id = village.village_id')
            ->join('district', 'village.district_id = district.district_id')
            ->select('AVG(geo_score) AS geo')->group_by('mitra_track_record.mitra_id')
            ->select('AVG(it_score) AS it')->group_by('mitra_track_record.mitra_id')
            ->select('AVG(prob_score) AS prob')->group_by('mitra_track_record.mitra_id')
            ->select('AVG(qty_score) AS qty')->group_by('mitra_track_record.mitra_id')
            ->select('AVG(abc_score) AS abc')->group_by('mitra_track_record.mitra_id')
            ->select('AVG(time_score) AS time')->group_by('mitra_track_record.mitra_id')
            ->order_by('mitra.name', 'asc')
            ->select('mitra_track_record.*')
            ->select('mitra.name')
            ->select('district.district')
            ->get('mitra_track_record');
        $data['mitraRecord'] = $query->result_array();
        // var_dump($data['mitraRecord']);

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('mitra_rating/summary', $data);
        $this->load->view('partials/footer');
    }
}
