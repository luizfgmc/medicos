<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
    }

    public function index() {

        $dados = array();

        $this->load->view('layout/header_home');
        $this->load->view('home', $dados);
        $this->load->view('layout/footer_home');
    }

}

?>