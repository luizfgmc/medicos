<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Instituicao extends CI_Controller {

    //Metodo construtor da classe, carrega helper e valida sessão instituição
    function __construct() {

		parent::__construct();
		$this->load->helper('url');
        $this->login->valida_sessao('instituicao');         

	}

    //Pagina principal do usuario instituição
    public function index(){

        $id = $this->getIdInstituicao();
        $data = $this->getSolicitacoesInstituicao($id);
        $this->load->view('layout/header');
        $this->load->view('solicitacoes_instituicao',$data);
        $this->load->view('layout/footer');

    }

    //Consulta as solicitações efetuadas pelas instituições
    public function getSolicitacoesInstituicao($id){

        $this->load->model('solicitacaoModel', 'sm');
        $data['query'] = $this->sm->verSolicitcoesInstituicao($id);
        return $data;

    }

    //Pega o ID da instituicao logada
    public function getIdInstituicao(){

        $dadosSessao = $this->session->userdata('instituicao');
        $id = $dadosSessao['id_instituicao'];
        return $id;

    }

}

?>