<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Instituicao extends CI_Controller {

    function __construct() {

		parent::__construct();
		$this->load->helper('url');
        $this->logininstituicao->valida_sessao_instituicao();
         
	}

    public function index(){

        $id = $this->session->userdata('instituicao');    
        $this->load->model('solicitacaoModel','sm');
        $data['query'] = $this->sm->verSolicitcoesInstituicao($id['id_instituicao']);
        $this->load->view('layout/header');
        $this->load->view('solicitacoes_instituicao',$data);
        $this->load->view('layout/footer');

    }

}

?>