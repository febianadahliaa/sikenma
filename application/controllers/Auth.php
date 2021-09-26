<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth_model');
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $role =  $this->session->userdata('roleId');

        if ($email == NULL) {
            $this->login();
        } else {
            if ($role == 1) {
                redirect('manajemen/mitra_list');
            } elseif ($role == 2) {
                redirect('beranda');
            }
        }
    }

    public function login()
    {
        $config = [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email',
                'errors' => [
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Email tidak valid!'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Password harus diisi!'
                ]
            ]
        ];
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // $user = $this->auth_model->getUserByEmail($email);
            // KENAPA GA BISA PAKE MODEL??? :(
            $query = $this->db->select('user.*, user_position.position, district.district')
                ->from('user')
                ->where('email', $email)
                ->join('user_position', 'user.position_id = user_position.id', 'Left')
                ->join('district', 'user.district_id = district.id', 'Left')
                ->get();
            $user = $query->row_array();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'roleId' => $user['role_id'],
                        'nip' => $user['nip'],
                        'loc' => $user['district'],
                        'name' => $user['name'],
                        'position' => $user['position'],
                        'gender' => $user['gender']
                    ];
                    $this->session->set_userdata($data); //Jika berhasil login, maka data yang disimpan dalam session

                    if ($user['role_id'] == 1) { //admin
                        redirect('manajemen/mitra_list');
                    } elseif ($user['role_id'] == 2) { //user
                        redirect('beranda');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Password salah!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('error', 'Email tidak terdaftar!');
                redirect('auth');
            }
        } else {
            $data['title'] = 'Login SIKENMA';
            $this->load->view('partials/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('partials/auth_footer');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('roleId');
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('loc');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('position');
        $this->session->unset_userdata('gender');

        $this->session->set_flashdata('message', 'Anda sudah keluar!');
        redirect('auth');
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
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'gender' => '',
                'position_id' => 2,
                'role_id' => 2,
                'phone' => '',
                'district_id' => 7407050
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', 'Selamat! Akunmu berhasil dibuat. Silahkan Login.');
            redirect('auth');
        }
    }

    public function blocked()
    {
        echo 'block';
    }
}
