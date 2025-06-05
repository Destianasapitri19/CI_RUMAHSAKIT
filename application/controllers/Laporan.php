<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
        $this->load->model('Pendaftaran_model');
    }

    public function index() {
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all_with_detail();
        $this->load->view('templates/header');
        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }
}
