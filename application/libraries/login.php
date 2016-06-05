<?php

/**
 * Created by PhpStorm.
 * User: diogo
 * Date: 05/06/2016
 * Time: 14:27
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login
{
    private $CI;
    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    // Metodo para verificar se o usuário esta conectado
    public function valida_sessao($usuario) {

        if (empty($this->CI->session->userdata($usuario))) {
            redirect('home');
            exit();
        }
    }
}