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


}