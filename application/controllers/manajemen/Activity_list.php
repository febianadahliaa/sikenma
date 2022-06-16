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
        $data['menuName'] = 'Manajemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['activityList'] = $this->db->get('activity')->result_array();

        $query = $this->db->join('activity', 'activities.activity_id = activity.activity_id')
            ->get('activities');
        $data['activitiesList'] = $query->result_array();
        // var_dump($data['activitiesList']);

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('manajemen/activity-list', $data);
        $this->load->view('partials/footer');
    }

    public function addActivity()
    {
        $this->form_validation->set_rules('activity', 'Activity', 'required|trim');
        $this->form_validation->set_rules('geo_score', 'GEO', 'required|trim|min_length[1]|max_length[2]|numeric');
        $this->form_validation->set_rules('it_score', 'IT', 'required|trim|min_length[1]|max_length[2]|numeric');
        $this->form_validation->set_rules('prob_score', 'PROB', 'required|trim|min_length[1]|max_length[2]|numeric');
        $this->form_validation->set_rules('qty_score', 'QTY', 'required|trim|min_length[1]|max_length[2]|numeric');
        $this->form_validation->set_rules('abc_score', 'ABC', 'required|trim|min_length[1]|max_length[2]|numeric');
        $this->form_validation->set_rules('time_score', 'Time', 'required|trim|min_length[1]|max_length[2]|numeric');

        if ($this->form_validation->run() == False) {
            $this->session->set_flashdata('error', 'Data kegiatan harus diisi dengan lengkap dan benar!');
        } else {
            $data = [
                'activity' => $this->input->post('activity'),
                'geo_score' => $this->input->post('geo_score'),
                'it_score' => $this->input->post('it_score'),
                'prob_score' => $this->input->post('prob_score'),
                'qty_score' => $this->input->post('qty_score'),
                'abc_score' => $this->input->post('abc_score'),
                'time_score' => $this->input->post('time_score'),
            ];
            $this->db->insert('activity', $data);
            $this->session->set_flashdata('message', 'Kegiatan baru berhasil ditambahkan!');
        }
        redirect('manajemen/activity_list');
    }

    public function editActivity()
    {
        $config = [
            [
                'field' => 'activity',
                'label' => 'Activity',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kegiatan tidak boleh kosong!'
                ],
            ],
        ];
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == False) {
            $this->session->set_flashdata('error', 'Data kegiatan harus diisi dengan lengkap dan benar!');
        } else {
            $data = [
                'activity' => $this->input->post('activity')
            ];
            $activity_id = $this->input->post('activity_id');
            $this->db->update('activity', $data, ['activity_id' => $activity_id]);
            $this->session->set_flashdata('message', 'Data berhasil diedit.');
        }
        redirect('manajemen/activity_list');
    }

    public function deleteActivity($id)
    {
        if (!isset($id)) show_404();
        if ($this->db->delete('activity', ['activity_id' => $id])) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus.');
        }
        redirect('manajemen/activity_list');
    }

    public function addActivities()
    {
        $this->form_validation->set_rules('activity_id', 'Activity', 'required');
        $this->form_validation->set_rules('start_date', 'Start_date', 'required');
        $this->form_validation->set_rules('finish_date', 'Finish_date', 'required');

        if ($this->form_validation->run() == False) {
            $this->session->set_flashdata('error', 'Data harus diisi dengan lengkap dan benar!');
        } else {
            $data = [
                'activity_id' => $this->input->post('activity_id'),
                'start_date' => $this->input->post('start_date'),
                'finish_date' => $this->input->post('finish_date'),
            ];
            $this->db->insert('activities', $data);
            $this->session->set_flashdata('message', 'Kegiatan baru berhasil ditambahkan!');
        }
        redirect('manajemen/activity_list');
    }

    public function editActivities()
    {
        $this->form_validation->set_rules('activity_id', 'Activity', 'required');
        $this->form_validation->set_rules('start_date', 'Start_date', 'required');
        $this->form_validation->set_rules('finish_date', 'Finish_date', 'required');

        if ($this->form_validation->run() == False) {
            $this->session->set_flashdata('error', 'Data harus diisi dengan lengkap dan benar!');
        } else {
            $data = [
                'activity_id' => $this->input->post('activity_id'),
                'start_date' => $this->input->post('start_date'),
                'finish_date' => $this->input->post('finish_date'),
            ];
            $activities_id = $this->input->post('activities_id');
            $this->db->update('activities', $data, ['activities_id' => $activities_id]);
            $this->session->set_flashdata('message', 'Data berhasil diedit.');
        }
        redirect('manajemen/activity_list');
    }

    public function deleteActivities($id)
    {
        if (!isset($id)) show_404();
        if ($this->db->delete('activities', ['activities_id' => $id])) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus.');
        }
        redirect('manajemen/activity_list');
    }
}
