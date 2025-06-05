<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {

    public function insert($data) {
        return $this->db->insert('pendaftaran', $data);
    }

    public function get_all() {
        return $this->db->get('pendaftaran')->result();
    }

    public function get_by_user($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->get('pendaftaran')->result();
    }

    // Ambil semua pendaftaran + detail pasien dan dokter
public function get_all_with_detail() {
    $this->db->select('pendaftaran.*, users.nama as nama_pasien, dokter.nama_dokter, dokter.spesialis');
    $this->db->from('pendaftaran');
    $this->db->join('users', 'users.id = pendaftaran.user_id');
    $this->db->join('dokter', 'dokter.id = pendaftaran.dokter_id');
    return $this->db->get()->result();
}

// Ubah status pendaftaran (diterima / ditolak)
public function update_status($id, $status) {
    $this->db->where('id', $id);
    return $this->db->update('pendaftaran', ['status' => $status]);
}

}
