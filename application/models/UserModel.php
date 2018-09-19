<?php

class UserModel extends CI_Model{

    public function getData(){
        $query = $this->db->get('users');
        return $query->result();
    }

    public function getAuthentication($username,$password){
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $query = $this->db->query($sql, array($username, $password));

        $user = $query->row();

        if (isset($user)){
            //authenticated successful
            var_dump($user);
            $user_data_info = array(
                'username' => $user['user_name'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'registered_date' => $user['registered_date'],
                'email' => $user['email'],
                'admin_rights' => $user['admin_rights'],
                'logged_in' => TRUE
            );

            $this->session->set_userdata($user_data_info);

            return True;
        }
        else {
            return False;
        }

    }
}