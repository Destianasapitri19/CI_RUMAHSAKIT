<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
        $this->load->model('Pendaftaran_model');
    }

    public function index() {
        $status = $this->input->get('status');

        if ($status) {
            $data['pendaftaran'] = $this->Pendaftaran_model->get_by_status($status);
        } else {
            $data['pendaftaran'] = $this->Pendaftaran_model->get_all_with_detail();
        }

        $this->load->view('templates/header');
        $this->load->view('pendaftaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function setujui($id) {
        $this->Pendaftaran_model->update_status($id, 'diterima');
        $this->session->set_flashdata('success', 'Pendaftaran disetujui.');
        redirect('pendaftaran_admin');
    }

    public function tolak($id) {
        $this->Pendaftaran_model->update_status($id, 'ditolak');
        $this->session->set_flashdata('success', 'Pendaftaran ditolak.');
        redirect('pendaftaran_admin');
    }
}
