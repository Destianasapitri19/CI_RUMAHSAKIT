<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_admin extends CI_Controller {

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
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all_with_detail();

        $this->load->view('templates/header');
        $this->load->view('pendaftaran/admin_list', $data);
        $this->load->view('templates/footer');
    }

    public function update_status($id, $status) {
        $this->Pendaftaran_model->update_status($id, $status);
        $this->session->set_flashdata('success', 'Status pendaftaran berhasil diubah.');
        redirect('pendaftaran_admin');
    }
}
