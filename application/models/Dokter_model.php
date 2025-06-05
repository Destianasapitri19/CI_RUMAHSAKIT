<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter_model extends CI_Model {

    public function get_all_dokter() {
        return $this->db->get('dokter')->result();
    }
}
