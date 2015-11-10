<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class loginAdm {
   
    private $CI;
    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    // metodo que verifica se o usuário está logado
    public function valida_sessao_adm() {
        
        if (empty($this->CI->session->userdata('adm'))) {
            redirect('home');
            exit();
        }
    }

}
