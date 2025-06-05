<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'pasien') {
            redirect('auth/login');
        }
        $this->load->model('Pendaftaran_model');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['riwayat'] = $this->Pendaftaran_model->get_by_user($user_id);

        $this->load->view('templates/header');
        $this->load->view('riwayat/index', $data);
        $this->load->view('templates/footer');
    }
}
