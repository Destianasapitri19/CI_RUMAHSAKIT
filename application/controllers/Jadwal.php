<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
        $this->load->model('Pendaftaran_model');
    }

    public function index() {
    $this->load->model('Pendaftaran_model');
    $data['jadwal'] = $this->Pendaftaran_model->get_by_status('diterima');

    $this->load->view('templates/header');
    $this->load->view('jadwal/index', $data);
    $this->load->view('templates/footer');
}

}
