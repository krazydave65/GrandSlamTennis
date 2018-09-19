<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyLibrary {
    
    protected $CI;

    public function __construct(){
        $this->CI =& get_instance();
    }

    public function TemplateView($viewName, $data = []) {
        $this->CI->load->view('Templates/Header');
        $this->CI->load->view($viewName,$data);
        $this->CI->load->view('Templates/Footer');
    }

    public function Greet(){
        return 'Hello from library';
    }
}