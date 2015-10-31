<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class loginMedico {
   
    private $CI;
    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    // metodo que verifica se o usuário está logado
    public function valida_sessao_medico() {
        
        if (empty($this->CI->session->userdata('medico'))) {
            redirect('acesso');
            exit();
        }
    }

}
