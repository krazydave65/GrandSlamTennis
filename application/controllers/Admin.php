<?php

class Admin extends CI_Controller {
   
    public function Index(){
        //load view for login
        $this->load->view('admin/login');
    }

    public function Login(){
        //authenticate
        $user_data = $this->input->post();
        $username = $user_data['user_name'];
        $password = $user_data['password'];

        if ($this->usermodel->getauthentication($username, $password)) {
            if ($_SESSION['admin_rights'] == 1 ){

                echo "successfull login" . $_SESSION['username'];
            }
            else {
                echo "failed login";
            }
        }
        else {
            echo "failed login";
        }

    }
}