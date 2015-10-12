<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Clinica extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->helper('url');
	}
	

	 public function index() {
        
        $this->load->model('estadosModel');
		$estado['estados'] = $this->estadosModel->getInfoEstados();
		   		

        $this->load->view('insere_clinicas', $estado);
    }

	//lista todos as clinicas do medico
	public function listaClinicas(){
		
		$this->load->model('clinicaModel' , 'cm' );	
		$data["query"] = $this->cm->listaClinicas();		
		$this->load->view('clinicas' , $data);
		
	}

	


	//insere uma nova clinica do medico
	public function insereClinica(){

		$data = $_POST;
		$this->load->model('clinicaModel' ,'cm');
		
		$arrayInsereClinica = array(
			"medico_id" => 48,
			"nome" => $data['nomeClinica'],
			"telefone" => $data['telefoneClinica'],
		    "endereco" => $data['enderecoClinica'],
			"end_numero" => $data['numeroClinica'],
		    "end_complemento" => $data['complementoClinica'],
		    "bairro" => $data['bairroClinica'],
		    "cidade" => $data['cidadeClinica'],
			"uf" => $data['ufClinica'],
		    "cep" => $data['cepClinica'],
		    "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
            );


		$this->cm->insereClinica($arrayInsereClinica);

		$this->load->view("insere_clinicas.php");
		redirect('clinica/listaClinicas');

	}

	//buscar clinica pelo id para edicao
	public function editarClinica($idClinica){
		
		$this->load->model('clinicaModel' , 'cm');
		$data['query'] = $this->cm->buscarClinicaPorId($idClinica);
		$this->load->model('estadosModel');
		$estado= $this->estadosModel->getInfoEstados();
		$data['estados'] = $estado;
		
		$this->load->view('editar_clinica' , $data);
	
	}


	//funcao para editar clinicas
	public function editarClinicaSalvar($idClinica){

		$data = $_POST;
		$this->load->model('clinicaModel' , 'cm');

		$arrayEditarClinica = array(
			"medico_id" => 48,
			"nome" => $data['nomeClinica'],
			"telefone" => $data['telefoneClinica'],
		    "endereco" => $data['enderecoClinica'],
			"end_numero" => $data['numeroClinica'],
		    "end_complemento" => $data['complementoClinica'],
		    "bairro" => $data['bairroClinica'],
		    "cidade" => $data['cidadeClinica'],
			"uf" => $data['ufClinica'],
		    "cep" => $data['cepClinica'],
		    "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        );

	
	
		$this->cm->editarClinica($idClinica, $arrayEditarClinica);
		redirect('clinica/listaClinicas');

	}

	//funcao para excluir clinicas
	public function excluirClinica($idClinica){

		$this->load->model('clinicaModel' , 'cm');
		$this->cm->excluirClinica($idClinica);
		redirect('clinica/listaClinicas');

	}


}










?>