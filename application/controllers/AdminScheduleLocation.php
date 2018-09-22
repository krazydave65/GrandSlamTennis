<?php

class AdminScheduleLocation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        //Check if user has admin_rights to view this page
        if (isset($_SESSION['admin_rights'])){
            if ($_SESSION['admin_rights'] != 1){
                show_404();
            }
        }
        else {
            show_404();
        }
    }
    
    public function index(){
        
        //load up users
        $data['users'] = $this->usermodel->getAllUsers();
        //load up locations
        $data['locations'] = $this->locationmodel->getAllLocations();
        
        //load up events
        
        
        //send data to view
        $this->mylibrary->templateview('adminschedulelocation', $data);
        
    }

    public function AddNewUser(){
        
        //validate new user form data
        //parse form data
        $user_data = $this->input->post();
        $firstname = $user_data['first_name'];
        $lastname = $user_data['last_name'];
        $username = $user_data['username'];
        $email = $user_data['email'];
        $password = $user_data['password'];
        $passwordconfirm = $user_data['passwordconfirm'];
        
        $error_messages = Array();

        if ($firstname == "" || $lastname == "" || $username == "" 
        || $email == "" || $password == "" || $passwordconfirm == "" ) {
            array_push($error_messages, "Field must contain a value");
        }

        if ($password != $passwordconfirm) {
            array_push($error_messages, "Passwords must match");
        }

        if (!empty($error_messages)){
            $_SESSION['add_user_validation'] = $error_messages;
            $this->session->mark_as_flash('add_user_validation');
        }
        else 
        {
            //save new user to database
            $db_result = $this->usermodel->AddNewUser($firstname,$lastname,$username,$email,$password);
            
            if ($db_result){
                $_SESSION['add_user_success'] = "User '".$username."' successfully created!";
                $this->session->mark_as_flash('add_user_success');
            }
            else{
                $_SESSION['add_user_failed'] = "Failed to create new user";
                $this->session->mark_as_flash('add_user_failed');
            }
            
        }   

        redirect("adminschedulelocation");
    }
}