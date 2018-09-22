<?php

class User {
    public $username;
    public $first_name;
    public $last_name;
    public $registered_date;
    public $email;
    public $admin_rights;
    public $logged_in;
}

class UserModel extends CI_Model{

    public function getAllUsers(){
        $query = $this->db->get('users');

        $AllUserObjects = Array();

        foreach ($query->result_array() as $user)
        {
            $new_user_object = $this->User($user['username'], $user['first_name']
            , $user['last_name'], $user['registered_date'],$user['email'], $user['admin_rights']
            , FALSE
            );

            array_push($AllUserObjects, $new_user_object);
        }

        return $AllUserObjects;
    }

    public function AddNewUser($firstname,$lastname,$username,$email,$password){
        $data = array(
            'first_name' => $firstname,
            'last_name' => $lastname,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            );
        
        //parameters: table_name, table_column_data
        $str = $this->db->insert_string('users', $data);
        
        //insert into database...returns true or false
        if ($this->db->query($str)){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }


    public function User($username,$first_name,$last_name,$registered_date,$email,$admin_rights,$logged_in = FALSE){
        $NewUser = new User();
        $NewUser->username = $username;
        $NewUser->first_name = $first_name;
        $NewUser->last_name = $last_name;
        $NewUser->registered_date = $registered_date;
        $NewUser->email = $email;
        $NewUser->admin_rights = $admin_rights;

        return $NewUser;          
    }

    public function getAuthentication($username,$password){
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $query = $this->db->query($sql, array($username, $password));

        $user = $query->row_array();

        if (isset($user)){
            //authenticated successful
            $user_data_info = array(
                    'username' => $user['username'],
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