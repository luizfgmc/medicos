<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class loginprofissional {
   
    private $CI;
    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    // metodo que verifica se o usuário está logado
    public function valida_sessao_profissional() {
        
        if (empty($this->CI->session->userdata('profissional'))) {
            redirect('home');
            exit();
        }
    }

}
