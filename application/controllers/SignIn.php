<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignIn Extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('MyLibrary');
        $this->load->library('session');
    }

    public function index(){
        
        $this->mylibrary->templateview('signin');
        
    }

    public function LoginAuthenticate(){
        $user_data = $this->input->post();
        $username = $user_data['user_name'];
        $password = $user_data['password'];

        if ($this->usermodel->getauthentication($username, $password)) {
            $this->mylibrary->templateview('signin');
        }
        else {
            $this->mylibrary->templateview('signin');
        }
        
        
        
        //authenticate user information

        //TODO: if success: create a session and redirect to user page or admin page

        //TODO: if failed authentication then send back to signin page with error message
    }
}