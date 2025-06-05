<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cek apakah user login & role pasien
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'pasien') {
            redirect('auth/login');
        }

        $this->load->model('Pendaftaran_model');
        $this->load->model('Dokter_model'); // untuk ambil list dokter
    }

    public function index() {
        // Ambil data dokter untuk dropdown
        $data['dokter'] = $this->Dokter_model->get_all_dokter();

        $this->load->view('templates/header');
        $this->load->view('pendaftaran/form', $data);
        $this->load->view('templates/footer');
    }

    public function simpan() {
    // Aturan validasi
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric|min_length[10]');
    $this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
    $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal Kunjungan', 'required|callback_valid_tanggal');
    $this->form_validation->set_rules('jam_kunjungan', 'Jam Kunjungan', 'required');
    $this->form_validation->set_rules('dokter_id', 'Dokter', 'required');

    if ($this->form_validation->run() == FALSE) {
        $data['dokter'] = $this->Dokter_model->get_all_dokter();
        $this->load->view('templates/header');
        $this->load->view('pendaftaran/form', $data);
        $this->load->view('templates/footer');
    } else {
        $data = [
            'user_id'           => $this->session->userdata('user_id'),
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
        $this->Pendaftaran_model->insert($data);
        $this->session->set_flashdata('success', 'Pendaftaran berhasil dikirim.');
        redirect('pendaftaran');
    }
}

public function valid_tanggal($tanggal) {
    $today = date('Y-m-d');
    
    if ($tanggal < $today) {
        $this->form_validation->set_message('valid_tanggal', 'Tanggal kunjungan tidak boleh sebelum hari ini.');
        return FALSE;
    }

    return TRUE;
}



}
