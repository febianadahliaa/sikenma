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
        $data['mitra'] = $this->db->get('mitra')->result_array();
        $data['activity'] = $this->db->get('activity')->result_array();
        $data['reviewer'] = $this->db->get('user')->result_array();

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

    public function addRecord()
    {
        $this->form_validation->set_rules('mitra_id', 'Name', 'required');
        $this->form_validation->set_rules('activity_id', 'Activity', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required|trim|min_length[4]|max_length[4]');
        $this->form_validation->set_rules('skor_geo', 'GEO', 'required|trim|min_length[1]|max_length[3]');
        $this->form_validation->set_rules('skor_it', 'IT', 'required|trim|min_length[1]|max_length[3]');
        $this->form_validation->set_rules('skor_probing', 'PROB', 'required|trim|min_length[1]|max_length[3]');
        $this->form_validation->set_rules('skor_quality', 'QTY', 'required|trim|min_length[1]|max_length[3]');
        $this->form_validation->set_rules('skor_abc', 'ABC', 'required|trim|min_length[1]|max_length[3]');
        $this->form_validation->set_rules('skor_time', 'Time', 'required|trim|min_length[1]|max_length[3]');
        $this->form_validation->set_rules('user_id', 'Reviewer', 'required');

        if ($this->form_validation->run()) {
            $data = [
                'mitra_id' => $this->input->post('mitra_id'),
                'activity_id' => $this->input->post('activity_id'),
                'year' => $this->input->post('year'),
                'skor_geo' => $this->input->post('skor_geo'),
                'skor_it' => $this->input->post('skor_it'),
                'skor_prob' => $this->input->post('skor_probing'),
                'skor_qty' => $this->input->post('skor_quality'),
                'skor_abc' => $this->input->post('skor_abc'),
                'skor_time' => $this->input->post('skor_time'),
                'user_id' => $this->input->post('user_id'),
            ];
            $this->db->insert('mitra_track_record', $data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Isian data track record mitra harus diisi dengan lengkap!');
        }
        redirect('database_mitra/mitra_data');
    }
}
