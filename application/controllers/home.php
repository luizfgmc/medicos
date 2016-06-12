<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Home extends CI_Controller {

    //Metodo construtor da classe e efetua a carga dos helpers utilizados
    function __construct() {
        parent::__construct();
        $this->load->helper(array('url','view_helper'));
    }

    //Carrega a pagina principal da aplicação
    public function index() {

        $dados = array();

        load_view_home('home',$dados);

    }

}

?>