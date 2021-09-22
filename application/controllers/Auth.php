<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    } //akan selalu dirun di semua method

    public function index()
    {
        $data['title'] = 'Login SIKENMA';
        $this->load->view('partials/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('partials/auth_footer');
    }

    public function register()
    {
        $config = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Nama harus diisi!'
                ]
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Email tidak valid!',
                    'is_unique' => 'Gunakan email lain! Email ini sudah digunakan!'
                ]
            ],
            [
                'field' => 'password1',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[6]|matches[password2]',
                'errors' => [
                    'required' => 'Password harus diisi!',
                    'min_length' => 'Password terlalu pendek',
                    'matches' => 'Password tidak cocok!'
                ]
            ],
            [
                'field' => 'password2',
                'label' => 'Password',
                'rules' => 'required|trim|matches[password1]',
                'errors' => [
                    'required' => 'Password harus diisi!'
                ]
            ]
        ];
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registrasi Member';
            $this->load->view('partials/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('partials/auth_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => 2,
                'phone' => '',
                'id_kecamatan' => 7407050
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', 'Selamat! Akunmu berhasil dibuat. Silahkan Login.');
            redirect('auth');
        }
    }
}
