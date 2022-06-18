<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Track_record extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Detail Track Record Mitra';
        $data['subMenuName'] = 'Track Record';
        $data['menuName'] = 'Mitra_Rating';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mitra'] = $this->db->get('mitra')->result_array();
        $data['activity'] = $this->db->get('activity')->result_array();
        $data['reviewer'] = $this->db->get('user')->result_array();

        $query = $this->db->select('mitra_track_record.*')
            ->join('mitra', 'mitra_track_record.mitra_id = mitra.mitra_id')->select('mitra.name')
            ->join('activity', 'mitra_track_record.activity_id = activity.activity_id')->select('activity.activity')
            ->join('user', 'mitra_track_record.user_id = user.nip')->select('user.uname')
            ->get('mitra_track_record');
        $data['mitraRecord'] = $query->result_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('mitra_rating/track-record', $data);
        $this->load->view('partials/footer');
    }

    public function addRecord()
    {
        $this->form_validation->set_rules('mitra_id', 'Name', 'required');
        $this->form_validation->set_rules('activity_id', 'Activity', 'required');
        $this->form_validation->set_rules('yearpicker', 'Year', 'required|trim|min_length[4]|max_length[4]|numeric');
        $this->form_validation->set_rules('geo_score', 'GEO', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('it_score', 'IT', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('prob_score', 'PROB', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('qty_score', 'QTY', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('abc_score', 'ABC', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('time_score', 'Time', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('user_id', 'Reviewer', 'required');

        if ($this->form_validation->run() == False) {
            $this->session->set_flashdata('error', 'Data track record mitra harus diisi dengan lengkap dan benar!');
        } else {
            $data = [
                'mitra_id' => $this->input->post('mitra_id'),
                'activity_id' => $this->input->post('activity_id'),
                'year' => $this->input->post('yearpicker'),
                'geo_score' => $this->input->post('geo_score'),
                'it_score' => $this->input->post('it_score'),
                'prob_score' => $this->input->post('prob_score'),
                'qty_score' => $this->input->post('qty_score'),
                'abc_score' => $this->input->post('abc_score'),
                'time_score' => $this->input->post('time_score'),
                'user_id' => $this->input->post('user_id'),
            ];
            $this->db->insert('mitra_track_record', $data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan.');
        }
        redirect('mitra_rating/track_record');
    }

    public function editRecord()
    {
        $this->form_validation->set_rules('mitra_id', 'Name', 'required');
        $this->form_validation->set_rules('activity_id', 'Activity', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required|trim|min_length[4]|max_length[4]|numeric');
        $this->form_validation->set_rules('geo_score', 'GEO', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('it_score', 'IT', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('prob_score', 'PROB', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('qty_score', 'QTY', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('abc_score', 'ABC', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('time_score', 'Time', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('user_id', 'Reviewer', 'required');

        if ($this->form_validation->run() == False) {
            $this->session->set_flashdata('error', 'Data track record mitra harus diisi dengan lengkap dan benar!');
        } else {
            $data = [
                'mitra_id' => $this->input->post('mitra_id'),
                'activity_id' => $this->input->post('activity_id'),
                'year' => $this->input->post('year'),
                'geo_score' => $this->input->post('geo_score'),
                'it_score' => $this->input->post('it_score'),
                'prob_score' => $this->input->post('prob_score'),
                'qty_score' => $this->input->post('qty_score'),
                'abc_score' => $this->input->post('abc_score'),
                'time_score' => $this->input->post('time_score'),
                'user_id' => $this->input->post('user_id'),
            ];
            $record_id = $this->input->post('track_record_id');
            $this->db->update('mitra_track_record', $data, ['track_record_id' => $record_id]);
            $this->session->set_flashdata('message', 'Data berhasil diedit.');
        }
        redirect('mitra_rating/track_record');
    }

    public function deleteRecord($id)
    {
        if (!isset($id)) show_404();
        if ($this->db->delete('mitra_track_record', ['track_record_id' => $id])) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        }
        redirect('mitra_rating/track_record');
    }

    // Add record at another page
    public function _addRecord()
    {
        $data['title'] = 'Tambah Data Track Record Mitra';
        $data['subMenuName'] = 'Data Mitra';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mitra'] = $this->db->get('mitra')->result_array();
        $data['activity'] = $this->db->get('activity')->result_array();
        $data['reviewer'] = $this->db->get('user')->result_array();

        $config = [
            [
                'field' => 'mitra_id',
                'label' => 'Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama mitra belum dipilih!'
                ]
            ],
            [
                'field' => 'activity_id',
                'label' => 'Activity',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kegiatan belum dipilih!'
                ]
            ],
            [
                'field' => 'year',
                'label' => 'Year',
                'rules' => 'required|trim|min_length[4]|max_length[4]|numeric',
                'errors' => [
                    'required' => 'Tahun tidak boleh kosong!',
                    'min_length[4]' => 'Tahun tidak valid!',
                    'max_length[4]' => 'Tahun tidak valid!',
                    'numeric' => 'Tahun tidak valid!'
                ]
            ],
            [
                'field' => 'geo_score',
                'label' => 'GEO',
                'rules' => 'required|trim|min_length[1]|max_length[3]|numeric',
                'errors' => [
                    'required' => 'Nilai tidak boleh kosong!',
                    'min_length[1]' => 'Nilai tidak valid!',
                    'max_length[3]' => 'Nilai tidak valid!',
                    'numeric' => 'Nilai tidak valid!'
                ]
            ],
            [
                'field' => 'it_score',
                'label' => 'IT',
                'rules' => 'required|trim|min_length[1]|max_length[3]|numeric',
                'errors' => [
                    'required' => 'Nilai tidak boleh kosong!',
                    'min_length[1]' => 'Nilai tidak valid!',
                    'max_length[3]' => 'Nilai tidak valid!',
                    'numeric' => 'Nilai tidak valid!'
                ]
            ],
            [
                'field' => 'prob_score',
                'label' => 'PROB',
                'rules' => 'required|trim|min_length[1]|max_length[3]|numeric',
                'errors' => [
                    'required' => 'Nilai tidak boleh kosong!',
                    'min_length[1]' => 'Nilai tidak valid!',
                    'max_length[3]' => 'Nilai tidak valid!',
                    'numeric' => 'Nilai tidak valid!'
                ]
            ],
            [
                'field' => 'qty_score',
                'label' => 'QTY',
                'rules' => 'required|trim|min_length[1]|max_length[3]|numeric',
                'errors' => [
                    'required' => 'Nilai tidak boleh kosong!',
                    'min_length[1]' => 'Nilai tidak valid!',
                    'max_length[3]' => 'Nilai tidak valid!',
                    'numeric' => 'Nilai tidak valid!'
                ]
            ],
            [
                'field' => 'abc_score',
                'label' => 'ABC',
                'rules' => 'required|trim|min_length[1]|max_length[3]|numeric',
                'errors' => [
                    'required' => 'Nilai tidak boleh kosong!',
                    'min_length[1]' => 'Nilai tidak valid!',
                    'max_length[3]' => 'Nilai tidak valid!',
                    'numeric' => 'Nilai tidak valid!'
                ]
            ],
            [
                'field' => 'time_score',
                'label' => 'Time',
                'rules' => 'required|trim|min_length[1]|max_length[3]|numeric',
                'errors' => [
                    'required' => 'Nilai tidak boleh kosong!',
                    'min_length[1]' => 'Nilai tidak valid!',
                    'max_length[3]' => 'Nilai tidak valid!',
                    'numeric' => 'Nilai tidak valid!'
                ]
            ],
            [
                'field' => 'user_id',
                'label' => 'Reviewer',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama penilai belum dipilih!'
                ]
            ]
        ];
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == False) {
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('mitra_rating/input-mitradata', $data);
            $this->load->view('partials/footer');
        } else {
            $data = [
                'mitra_id' => $this->input->post('mitra_id'),
                'activity_id' => $this->input->post('activity_id'),
                'year' => $this->input->post('year'),
                'geo_score' => $this->input->post('geo_score'),
                'it_score' => $this->input->post('it_score'),
                'prob_score' => $this->input->post('prob_score'),
                'qty_score' => $this->input->post('qty_score'),
                'abc_score' => $this->input->post('abc_score'),
                'time_score' => $this->input->post('time_score'),
                'user_id' => $this->input->post('user_id'),
            ];
            $this->db->insert('mitra_track_record', $data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            redirect('mitra_rating/track_record');
        }
    }
}
