<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignIn Extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('grandslam');
    }

    public function index(){
        //$this->load->view('SignIn');
        //echo($this->grandslam->greet());
        $this->grandslam->templateview('signin');

    }

    public function LoginAuthenticate(){
        echo('Authenticating');
    }
}