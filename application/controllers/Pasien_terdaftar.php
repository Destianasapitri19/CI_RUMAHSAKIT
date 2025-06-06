<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien_terdaftar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
        $this->load->model('Pendaftaran_model');
        $this->load->model('User_model');
        $this->load->model('Dokter_model');
    }

    public function index() {
        
        $data['pasien'] = $this->Pendaftaran_model->get_terdaftar();
        $this->load->view('templates/header');
        $this->load->view('pasien_terdaftar/index', $data);
        $this->load->view('templates/footer');
    }
}
