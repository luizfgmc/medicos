<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Instituicao extends CI_Controller {

    function __construct() {

		parent::__construct();
		$this->load->helper('url');
        $this->login->valida_sessao('instituicao');         
	}

    public function index(){

        $data = $this->getSolicitacoesInstituicao();
        $this->load->view('layout/header');
        $this->load->view('solicitacoes_instituicao',$data);
        $this->load->view('layout/footer');

    }

    public function getSolicitacoesInstituicao()
    {
        $id = $this->session->userdata('instituicao');
        $this->load->model('solicitacaoModel', 'sm');
        $data['query'] = $this->sm->verSolicitcoesInstituicao($id['id_instituicao']);
        return $data;
    }

}

?>