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

        $data['currentActivityList'] = $this->db->select('*')
            ->join('activity', 'activity.activity_id = activities.activity_id')->select('activity.activity')
            ->or_where('MONTH(start_date)', date('m'), 'MONTH(finish_date)', date('m'))
            ->or_where('YEAR(start_date)', date('Y'), 'YEAR(finish_date)', date('Y'))
            ->get('activities')->result_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('mitra_rating/surveys', $data);
        $this->load->view('partials/footer');
    }
}
