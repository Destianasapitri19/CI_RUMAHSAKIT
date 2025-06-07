<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }

        $this->load->model('User_model');
        $this->load->model('Pendaftaran_model');
        $this->load->model('Dokter_model');
    }

    public function index() {
        $data['pasien'] = $this->Pendaftaran_model->get_all_pasien_detail();

        $this->load->view('templates/header');
        $this->load->view('pasien/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $data['dokter'] = $this->Dokter_model->get_all_dokter();

        $this->load->view('templates/header');
        $this->load->view('pasien/create', $data);
        $this->load->view('templates/footer');
    }

    public function store() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
        $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required');
        $this->form_validation->set_rules('jam_kunjungan', 'Jam Kunjungan', 'required');
        $this->form_validation->set_rules('dokter_id', 'Dokter', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['dokter'] = $this->Dokter_model->get_all_dokter();
            $this->load->view('templates/header');
            $this->load->view('pasien/create', $data);
            $this->load->view('templates/footer');
        } else {
            $user_data = [
                'nama'     => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role'     => 'pasien'
            ];
            $this->User_model->insert_user($user_data);
            $user_id = $this->db->insert_id();

            $pendaftaran = [
                'user_id'           => $user_id,
                'nama'              => $this->input->post('nama'),
                'tgl_lahir'         => $this->input->post('tgl_lahir'),
                'alamat'            => $this->input->post('alamat'),
                'no_hp'             => $this->input->post('no_hp'),
                'keluhan'           => $this->input->post('keluhan'),
                'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
                'jam_kunjungan'     => $this->input->post('jam_kunjungan'),
                'dokter_id'         => $this->input->post('dokter_id'),
                'status'            => 'proses'
            ];
            $this->Pendaftaran_model->insert($pendaftaran);

            $this->session->set_flashdata('success', 'Pasien & pendaftarannya berhasil ditambahkan.');
            redirect('pasien_admin');
        }
    }

    public function edit($id) {
        $data['pasien'] = $this->Pendaftaran_model->get_by_id($id);
        $data['dokter'] = $this->Dokter_model->get_all_dokter();

        $this->load->view('templates/header');
        $this->load->view('pasien/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $data = [
            'nama'              => $this->input->post('nama'),
            'tgl_lahir'         => $this->input->post('tgl_lahir'),
            'alamat'            => $this->input->post('alamat'),
            'no_hp'             => $this->input->post('no_hp'),
            'keluhan'           => $this->input->post('keluhan'),
            'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
            'jam_kunjungan'     => $this->input->post('jam_kunjungan'),
            'dokter_id'         => $this->input->post('dokter_id')
        ];

        $this->Pendaftaran_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data pasien berhasil diperbarui.');
        redirect('pasien_admin');
    }

    public function delete($id) {
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('success', 'Data pasien berhasil dihapus.');
        redirect('pasien_admin');
    }
}
