<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Instituicao extends CI_Controller {
    
    public $dadosSessao;
    
    //Metodo construtor da classe, carrega helper e valida sessão instituição
    function __construct() {

		parent::__construct();
		$this->load->helper(array('url','view'));
        $this->dadosSessao = $this->login->valida_sessao('instituicao');

	}

    //Pega o ID da instituicao logada
    public function getIdInstituicao(){

        $id = $this->dadosSessao['id_instituicao'];
        return $id;

    }

    //Pagina principal do usuario instituição
    public function index(){

        $id = $this->getIdInstituicao();
        $data = $this->getSolicitacoesInstituicao($id);
        load_view('solicitacoes_instituicao',$data);
        
    }

    //Consulta as solicitações efetuadas pelas instituições
    public function getSolicitacoesInstituicao($id){

        $this->load->model('solicitacaoModel', 'sm');
        $data['query'] = $this->sm->getSolicitacoesInstituicao($id);
        return $data;

    }

}

?>