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
        $this->db->select('pendaftaran.*, dokter.nama_dokter, dokter.spesialis');
        $this->db->from('pendaftaran');
        $this->db->join('dokter', 'dokter.id = pendaftaran.dokter_id');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->result();
    }

    public function get_all_with_detail() {
        $this->db->select('pendaftaran.*, dokter.nama_dokter, dokter.spesialis');
        $this->db->from('pendaftaran');
        $this->db->join('dokter', 'dokter.id = pendaftaran.dokter_id');
        return $this->db->get()->result();
    }

    public function update_status($id, $status) {
        $this->db->where('id', $id);
        return $this->db->update('pendaftaran', ['status' => $status]);
    }

    public function get_terdaftar() {
        $this->db->select('pendaftaran.*, dokter.nama_dokter, dokter.spesialis');
        $this->db->from('pendaftaran');
        $this->db->join('dokter', 'dokter.id = pendaftaran.dokter_id');
        $this->db->where('pendaftaran.status', 'diterima');
        return $this->db->get()->result();
    }

    public function count_all() {
        return $this->db->count_all('pendaftaran');
    }

    public function count_by_status($status) {
        return $this->db->where('status', $status)->count_all_results('pendaftaran');
    }

    public function get_by_status($status) {
        $this->db->select('pendaftaran.*, dokter.nama_dokter, dokter.spesialis');
        $this->db->from('pendaftaran');
        $this->db->join('dokter', 'dokter.id = pendaftaran.dokter_id');
        $this->db->where('status', $status);
        return $this->db->get()->result();
    }

    public function get_all_pasien() {
        $this->db->where('role', 'pasien');
        return $this->db->get('users')->result();
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }

    public function get_latest_by_user($user_id) {
    $this->db->where('user_id', $user_id);
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1);
    return $this->db->get('pendaftaran')->row();
}

}
