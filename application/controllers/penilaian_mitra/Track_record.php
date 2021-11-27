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
        $data['menuName'] = 'Penilaian_mitra';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mitra'] = $this->db->get('mitra')->result_array();
        $data['activity'] = $this->db->get('activity')->result_array();
        $data['reviewer'] = $this->db->get('user')->result_array();

        $query = $this->db->join('mitra', 'mitra_track_record.mitra_id = mitra.mitra_id')
            ->join('village', 'mitra.village_id = village.village_id')
            ->join('activity', 'mitra_track_record.activity_id = activity.activity_id')
            ->join('user', 'mitra_track_record.user_id = user.nip')
            ->get('mitra_track_record');
        $data['mitraRecord'] = $query->result_array();

        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('penilaian_mitra/track-record', $data);
        $this->load->view('partials/footer');
    }

    public function addRecord()
    {
        $this->form_validation->set_rules('mitra_id', 'Name', 'required');
        $this->form_validation->set_rules('activity_id', 'Activity', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required|trim|min_length[4]|max_length[4]|numeric');
        $this->form_validation->set_rules('skor_geo', 'GEO', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('skor_it', 'IT', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('skor_probing', 'PROB', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('skor_quality', 'QTY', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('skor_abc', 'ABC', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('skor_time', 'Time', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('user_id', 'Reviewer', 'required');

        if ($this->form_validation->run() == False) {
            $this->session->set_flashdata('error', 'Data track record mitra harus diisi dengan lengkap dan benar!');
        } else {
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
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan.');
        }
        redirect('penilaian_mitra/track_record');
    }

    public function editRecord()
    {
        $this->form_validation->set_rules('mitra_id', 'Name', 'required');
        $this->form_validation->set_rules('activity_id', 'Activity', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required|trim|min_length[4]|max_length[4]|numeric');
        $this->form_validation->set_rules('skor_geo', 'GEO', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('skor_it', 'IT', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('skor_probing', 'PROB', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('skor_quality', 'QTY', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('skor_abc', 'ABC', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('skor_time', 'Time', 'required|trim|min_length[2]|max_length[2]|numeric');
        $this->form_validation->set_rules('user_id', 'Reviewer', 'required');

        if ($this->form_validation->run() == False) {
            $this->session->set_flashdata('error', 'Data track record mitra harus diisi dengan lengkap dan benar!');
        } else {
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
            $record_id = $this->input->post('track_record_id');
            $this->db->update('mitra_track_record', $data, ['track_record_id' => $record_id]);
            $this->session->set_flashdata('message', 'Data berhasil diedit.');
        }
        redirect('penilaian_mitra/track_record');
    }

    public function deleteRecord($id)
    {
        if (!isset($id)) show_404();
        if ($this->db->delete('mitra_track_record', ['track_record_id' => $id])) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus.');
        }
        redirect('penilaian_mitra/track_record');
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
                'field' => 'skor_geo',
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
                'field' => 'skor_it',
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
                'field' => 'skor_probing',
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
                'field' => 'skor_quality',
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
                'field' => 'skor_abc',
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
                'field' => 'skor_time',
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
            $this->load->view('database_mitra/input-mitradata', $data);
            $this->load->view('partials/footer');
        } else {
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
            redirect('penilaian_mitra/track_record');
        }
    }
}
