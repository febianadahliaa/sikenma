<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_list extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Daftar Pegawai BPS Kabupaten Wakatobi';
        $data['subMenuName'] = 'Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = $this->db->join('user_role', 'user.role_id = user_role.id')
            ->join('user_position', 'user.position_id = user_position.id')
            ->join('district', 'user.district_id = district.id')
            ->get('user');
        $data['employeeList'] = $query->result_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('manajemen/employee-list', $data);
        $this->load->view('partials/footer');
    }

    public function addEmployee()
    {
        // $this->form_validation->set_rules('name', 'Name', 'required');
        // $this->form_validation->set_rules('village_id', 'Village', 'required');
        // $this->form_validation->set_rules('birthdate', 'Birthdate', 'required');
        // $this->form_validation->set_rules('gender', 'Gender', 'required');
        // $this->form_validation->set_rules('phone', 'Phone', 'required');
        // $this->form_validation->set_rules('marriage', 'Marriage', 'required');
        // $this->form_validation->set_rules('education', 'Education', 'required');
        // $this->form_validation->set_rules('job', 'Job', 'required');

        if ($this->form_validation->run()) {
            $data = [
                // 'name' => $this->input->post('name'),
                // 'village_id' => $this->input->post('village_id'),
                // 'date_of_birth' => $this->input->post('birthdate'),
                // 'gender' => $this->input->post('gender'),
                // 'phone' => $this->input->post('phone'),
                // 'marriage_status' => $this->input->post('marriage'),
                // 'education' => $this->input->post('education'),
                // 'job' => $this->input->post('job'),
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Data pegawai harus diisi dengan lengkap!');
        }
        redirect('manajemen/employee_list');
    }
}
