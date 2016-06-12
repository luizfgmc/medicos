<?php

/**
 * Created by PhpStorm.
 * User: diogo
 * Date: 11/06/2016
 * Time: 21:15
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('getHashMedico'))
{
    function getHashMedico($dado)
    {
        // Obter data para gerar chave unica
        $data = date("d/m/Y-H:i:s");

        $CI =& get_instance();
        // Gerar chave Hash a partir da classe encrypt do framework CodeIgniter
        $CI->load->library('encrypt');
        $chave = $CI->encrypt->encode($dado . $data);
        $chave = sha1($chave);
        
        return $chave;        
    }
}

?>