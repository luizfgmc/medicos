<?php
/**
 * Created by PhpStorm.
 * User: diogo
 * Date: 11/06/2016
 * Time: 19:16
 */
/*
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('load_view'))
{*/
    function load_view($view, $data)
    {
        $CI =& get_instance();
        $CI->load->view('layout/header');
        $CI->load->view($view,$data);
        $CI->load->view('layout/footer');
    }
/*
}
*/
?>