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
        $data['activityList'] = $this->db->get('activity')->result_array();

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
            $this->db->insert('activity', $data);
            $this->session->set_flashdata('message', 'Kegiatan baru berhasil ditambahkan!');
        }
        redirect('manajemen/activity_list');
    }

    public function editActivity()
    {
        '';
    }

    public function deleteActivity($id)
    {
        if (!isset($id)) show_404();
        if ($this->db->delete('activity', ['activity_id' => $id])) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Data mitra tidak dapat dihapus. Pastikan untuk menghapus track record mitra tersebut terlebih dahulu.');
        }
        redirect('manajemen/activity_list');
    }
}
