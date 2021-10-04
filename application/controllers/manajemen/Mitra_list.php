<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra_list extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Daftar Mitra BPS Kabupaten Wakatobi';
        $data['subMenuName'] = 'Mitra';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['village'] = $this->db->get('village')->result_array();

        $query = $this->db->join('village', 'mitra.village_id = village.id')
            ->join('district', 'village.district_id = district.id')
            ->get('mitra');
        $data['mitraList'] = $query->result_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('manajemen/index', $data);
        $this->load->view('partials/footer');
    }

    public function addMitra()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('village_id', 'Village', 'required');
        $this->form_validation->set_rules('birthdate', 'Birthdate', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('marriage', 'Marriage', 'required');
        $this->form_validation->set_rules('education', 'Education', 'required');
        $this->form_validation->set_rules('job', 'Job', 'required');

        if ($this->form_validation->run()) {
            $data = [
                'name' => $this->input->post('name'),
                'village_id' => $this->input->post('village_id'),
                'date_of_birth' => $this->input->post('birthdate'),
                'gender' => $this->input->post('gender'),
                'phone' => $this->input->post('phone'),
                'marriage_status' => $this->input->post('marriage'),
                'education' => $this->input->post('education'),
                'job' => $this->input->post('job'),
            ];
            $this->db->insert('mitra', $data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Data mitra harus diisi dengan lengkap dan benar!');
        }
        redirect('manajemen/mitra_list');
    }
}
