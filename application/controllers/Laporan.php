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

    public function cetak_pdf() {
    $this->load->library('pdf');
    $this->load->model('Pendaftaran_model');
    $data['pendaftaran'] = $this->Pendaftaran_model->get_all_with_detail();

    $html = $this->load->view('laporan/pdf_view', $data, true);
    $this->pdf->loadHtml($html);
    $this->pdf->render();
    $this->pdf->stream("laporan_pendaftaran.pdf", array("Attachment" => 1));
}
public function unduh_csv() {
    $this->load->model('Pendaftaran_model');
    $pendaftaran = $this->Pendaftaran_model->get_all_with_detail();

    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=laporan_pendaftaran.csv");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = fopen("php://output", "w");
    fputcsv($output, ['No', 'Nama', 'Tgl Lahir', 'Alamat', 'No HP', 'Keluhan', 'Dokter', 'Jadwal', 'Status']);

    $no = 1;
    foreach ($pendaftaran as $p) {
        fputcsv($output, [
            $no++,
            $p->nama,
            $p->tgl_lahir,
            $p->alamat,
            $p->no_hp,
            $p->keluhan,
            $p->nama_dokter . ' (' . $p->spesialis . ')',
            $p->tanggal_kunjungan . ' ' . $p->jam_kunjungan,
            $p->status
        ]);
    }

    fclose($output);
    exit;
}

}
