<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);


	class Instituicao extends CI_Controller{

		function __construct(){

		parent::__construct();
		$this->load->helper('url');
	}

		public function index(){

			 $this->load->model('estadosModel');
		     $estado['estados'] = $this->estadosModel->getInfoEstados();
			 $this->load->view('cadastrar_instituicao', $estado);

		}


		public function instituicoes(){

			$this->load->model('instituicaoModel', 'im');
			$data['query'] = $this->im->listaInstituicoes();


			$this->load->view('instituicoes', $data);


		}

		public function insereInsituicao(){

			$this->load->model('instituicaoModel', 'im');

			$data = $_POST;

			$this->load->library('Form_validation');
        	$this->form_validation->set_rules('cnpjInstituicao', 'CNPJ', 'trim|required|valida_cnpj');
        
	        if ($this->form_validation->run() == FALSE){
	            $this->index();
	        }
	        else{

				$arrayInstiuicao = array(

					"nome"=>$data['nomeInstituicao'],
					"cnpj"=>$data['cnpjInstituicao'],
	     		    "responsavel"=>$data['responsavelInstituicao'],
	    			"endereco"=>$data['enderecoInstituicao'],
	    			"end_numero"=>$data['end_numeroInstituicao'],
	    			"complemento"=>$data['complementoInstituicao'],
	    			"bairro"=>$data['bairroInstituicao'],
	     			"cidade"=>$data['cidadeInstituicao'],
	    			"uf"=>$data['ufInstituicao'],
	     			"cep"=>$data['cepInstituicao'],
	      			"telefone"=>$data['telefoneInstituicao'],
	                "status"=>$data['statusInstituicao'],
	                "usuario_id"=>59,
	                "created_at" => date("Y-m-d H:i:s"),
	           		 "updated_at" => date("Y-m-d H:i:s"),
					
	           		
				);

				 $this->im->insereInstituicao($arrayInstiuicao);
				 redirect("Instituicao/instituicoes");
			}

		}


		public function editarInstituicao($id){

			$this->load->model('instituicaoModel', 'im');
			$data['query'] = $this->im->editarInstituicao($id);
			$this->load->model('estadosModel');
			$estado= $this->estadosModel->getInfoEstados();
			$data['estados'] = $estado;

			$this->load->view('editar_instituicao', $data);

		}

		public function editarSalvarInstituicao($id){

			$this->load->model('instituicaoModel', 'im');

			$data = $_POST;

			$arrayInstiuicao = array(

				"nome"=>$data['nomeInstituicao'],
				"cnpj"=>$data['cnpjInstituicao'],
     		    "responsavel"=>$data['responsavelInstituicao'],
    			"endereco"=>$data['enderecoInstituicao'],
    			"end_numero"=>$data['end_numeroInstituicao'],
    			"complemento"=>$data['complementoInstituicao'],
    			"bairro"=>$data['bairroInstituicao'],
     			"cidade"=>$data['cidadeInstituicao'],
    			"uf"=>$data['ufInstituicao'],
     			"cep"=>$data['cepInstituicao'],
      			"telefone"=>$data['telefoneInstituicao'],
                "status"=>$data['statusInstituicao'],
                "usuario_id"=>59,
                "created_at" => date("Y-m-d H:i:s"),
           		 "updated_at" => date("Y-m-d H:i:s"),
				
           		
			);

			 $this->im->editarSalvarInstituicao($arrayInstiuicao, $id);
			 redirect("Instituicao/instituicoes");

		}

		public function deletaInstituicao($id){

			$this->load->model('instituicaoModel', 'im');
			$this->im->deletaInstituicao($id);
			redirect("Instituicao/instituicoes");

		}

	}



?>