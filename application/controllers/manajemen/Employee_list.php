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
        $data['district'] = $this->db->get('district')->result_array();
        $data['position'] = $this->db->get('user_position')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();

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
        $this->form_validation->set_rules('nip', 'Nip', 'required|min_length[9]|max_length[9]|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('district_id', 'District', 'required');
        $this->form_validation->set_rules('position_id', 'Position', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

        if ($this->form_validation->run()) {
            $data = [
                'nip' => $this->input->post('nip'),
                'uname' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash(123456, PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'gender' => $this->input->post('gender'),
                'position_id' => $this->input->post('position_id'),
                'district_id' => $this->input->post('district_id'),
                'phone' => $this->input->post('phone'),
                'image' => 'default.jpg',
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Data pegawai harus diisi dengan lengkap dan benar!');
        }
        redirect('manajemen/employee_list');
    }
}
