<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_Library {
    private $CI;
    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    // metodo que verifica se o usuário está logado
    public function verifica_login() {
        if (empty($this->CI->session->userdata('nome'))) {
            redirect('login');
            exit();
        }
    }

}
