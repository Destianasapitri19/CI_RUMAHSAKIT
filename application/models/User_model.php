<?php

class User_model extends CI_Model {

public function check_user($username, $password){
    $this->db->where('username', trim($username));
    $user = $this->db->get('users')->row();

    if ($user && password_verify(trim($password), $user->password)) {
        return $user;
    }
    return false;
}
public function insert_user($data){
    return $this->db->insert('users', $data);
}

public function get_all_pasien() {
    $this->db->where('role', 'pasien');
    return $this->db->get('users')->result();
}

public function delete_user($id) {
    $this->db->where('id', $id);
    return $this->db->delete('users');
}

public function get_user_by_id($id) {
    return $this->db->get_where('users', ['id' => $id])->row();
}

public function update_user($id, $data) {
    $this->db->where('id', $id);
    return $this->db->update('users', $data);
}

}