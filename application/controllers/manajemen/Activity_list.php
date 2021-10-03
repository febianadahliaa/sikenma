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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = $this->db->get('activity');
        $data['activityList'] = $query->result_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('manajemen/activity-list', $data);
        $this->load->view('partials/footer');
    }

    public function addActivity()
    {
        $config = [
            [
                'field' => 'activity',
                'label' => 'Activity',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kegiatan tidak boleh kosong!' //ini udah engga perlu, karena di tag input modalnya udah dikasi 'required'
                ],
            ],
        ];
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $data = [
                'activity' => $this->input->post('activity')
            ];
            $this->db->insert('activity', $data);

            $this->session->set_flashdata('message', 'Kegiatan baru berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Isian kegiatan harus diisi!');
        }
        redirect('manajemen/activity_list');
    }

    public function editActivity()
    {
        $data = [
            'id' => $this->input->post('id')
        ];
        $query = $this->db->get_where('activity', $data)->row_array();
        // $query = $this->db->get_where('activity', ['id' => $this->session->userdata('email')])->row_array();
        // $a = $this->input->post('id');

        // $q = $this->db->get_where('activity', $data)->row_array();
        // var_dump($q);

        echo json_encode($query);
    }

    public function deleteActivity($id)
    {
        if ($this->db->delete('activity', ['id' => $id])) {
            redirect('manajemen/activity_list');
        }
    }
}
