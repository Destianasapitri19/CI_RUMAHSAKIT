<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }

        $this->load->model('Pendaftaran_model');
    }

    public function index() {
        $data['total_pendaftaran'] = $this->Pendaftaran_model->count_all();
        $data['total_diterima']    = $this->Pendaftaran_model->count_by_status('diterima');
        $data['total_ditolak']     = $this->Pendaftaran_model->count_by_status('ditolak');
        $data['total_proses']      = $this->Pendaftaran_model->count_by_status('proses');

        $this->load->view('templates/header');
        $this->load->view('dashboard', $data); // nama view kamu adalah 'Dashboard.php'
        $this->load->view('templates/footer');
    }
}
