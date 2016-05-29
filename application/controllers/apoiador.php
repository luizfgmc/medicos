<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Apoiador extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->logininstituicao->valida_sessao_instituicao();
    }

    public function index() {
        $this->load->view('layout/header');
        $this->load->view('insere_apoiador');
        $this->load->view('layout/footer');
    }
	
	public function listaApoiadores() {
		
		$idInstituicao = $this->session->userdata('instituicao')['id_instituicao'];
		
        $this->load->model('apoiadorModel', 'am');
        $data['query'] = $this->am->listaApoiadores($idInstituicao);
        $this->load->view('layout/header');
        $this->load->view('apoiadores', $data);
        $this->load->view('layout/footer');
    }

    public function insereApoiador() {
		
		$dataPost = $_POST;
		$this->load->model('UsuarioModel', 'um');
		$data = $this->um->autenticar($dataPost['emailApoiador']);
		
		if(!empty($data)){
			$this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Email já cadastrado</div>");
            redirect(base_url('apoiador'));
			exit();
		}
		
		if($dataPost['emailApoiador'] != $dataPost['emailConfirmeApoiador']){
			$this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Emails não conferem!</div>");
			redirect(base_url('apoiador'));
			exit();
		}
		
		if($dataPost['senhaApoiador'] != $dataPost['senhaConfirmeApoiador']){
			$this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Senhas não conferem!</div>");
			redirect(base_url('apoiador'));
			exit();
		}
		
		redirect(base_url('apoiador'));
			exit();
		
		$this->load->library('Form_validation');
		$this->form_validation->set_rules('nomeApoiador', 'Nome', 'trim|required');
		
		if ($this->form_validation->run() == FALSE){
			$this->index();
		} else{
			
			$arrayInserirUsuario = array(
				"email" => $dataPost['emailApoiador'],
				"password_hash" => sha1($dataPost['senhaApoiador']),
				"tipo" => 'A',
				"created_at" => date("Y-m-d H:i:s"),
				"updated_at" => date("Y-m-d H:i:s")            
			);
			
			$this->load->model("ApoiadorModel", "am");
			
			//Insere um usuário na tabela e pegue o id inserido
			$idUsuarioInserido = $this->um->insereUsuario($arrayInserirUsuario);
			$idInstituicao = $this->session->userdata('instituicao')['id_instituicao'];  
			
			$arrayInserirMedico = array(
				"nome" => $dataPost['nomeApoiador'],
				"usuario_id" => $idUsuarioInserido,
				"instituicao_id" => $idInstituicao,
				"created_at" => date("Y-m-d H:i:s"),
				"updated_at" => date("Y-m-d H:i:s"),
				
			);
			
			// Insere um medico na tabela
			$idApoiadorInserido = $this->am->insereApoiador($arrayInserirMedico);
			
			redirect(base_url('instituicao'));
		}
       
    }
	
	
    public function deletarApoiador($idApoiador) {

        $this->load->model('apoiadorModel', 'am');
        $this->am->deletarApoiador($idApoiador);
        redirect('apoiador/listaApoiadores');
    }
	
	public function editarApoiador($idApoiador) {

        $this->load->model('apoiadorModel', 'am');
        
        $data['query'] = $this->am->editarApoiador($idApoiador);
        
        $this->load->view('layout/header');
        $this->load->view('editar_apoiador', $data);
        $this->load->view('layout/footer');
    }
	
    public function editarSalvarApoiador($idApoiador) {
		
		$dataPost = $_POST;
		$this->load->model('UsuarioModel', 'um');
		$data = $this->um->autenticar($dataPost['emailApoiador']);
		
		$this->load->model('ApoiadorModel', 'am');
		$dataApoiador = $this->am->editarApoiador($idApoiador);
		
		if(!empty($data) && $data[0]->email != $dataApoiador[0]->email) {
			echo "Email já cadastrado!";
			exit();
		}
		
		if($dataPost['emailApoiador'] != $dataPost['emailConfirmeApoiador']){
			echo "Emails não conferem!";
			exit();
		}
		
		if($dataPost['senhaApoiador'] != $dataPost['senhaConfirmeApoiador']){
			echo "Senhas não conferem!";
			exit();
		}
		
		$this->load->library('Form_validation');
		$this->form_validation->set_rules('nomeApoiador', 'Nome', 'trim|required');
		
		
		
		$arrayApoiador = array(
            "nome" => $this->input->post('nomeApoiador'),
			"updated_at" => date("Y-m-d H:i:s")
        );
		$arrayUsuario = array(
            "email" => $this->input->post('emailApoiador'),
			"password_hash" => sha1($dataPost['senhaApoiador']),
			"updated_at" => date("Y-m-d H:i:s")
        );
		
		$this->am->editarSalvarApoiador($idApoiador, $arrayApoiador);
        $this->um->editarSalvarUsuario($dataApoiador[0]->usuario_id, $arrayUsuario);
		
		redirect('apoiador/listaApoiadores');
    }

}

?>