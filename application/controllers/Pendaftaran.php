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
