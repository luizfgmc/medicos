<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('layout/header_home');
        $this->load->view('home');
        $this->load->view('layout/footer_home');
    }


}

?>