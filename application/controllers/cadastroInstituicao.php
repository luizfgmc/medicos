<?php

	class cadastroInstituicao extends CI_Controller{
			
		function __construct(){

			parent::__construct();

		}
		

          public function index() {
            $this->load->model("estadosModel");
            //Pega informaçoes dos estados
            $estados = $this->estadosModel->getInfoEstados();
            
            $dadosView = array('estados' => $estados);
            $this->load->view('layout/header_home');
            $this->load->view('insere_instituicoes', $dadosView);
            $this->load->view('layout/footer_home');
        }


    	 public function insereInstituicao() {
            $this->load->library('Form_validation');
			$this->form_validation->set_rules('nomeInstituicao', 'Nome', 'trim|required');
			$this->form_validation->set_rules('cnpjInstituicao', 'CNPJ', 'trim|required|valida_cnpj');
			$this->form_validation->set_rules('responsavelInstituicao', 'Responsavel', 'trim|required');
			$this->form_validation->set_rules('enderecoInstituicao', 'Endereco', 'trim|required');
			$this->form_validation->set_rules('end_numeroInstituicao', 'Numero', 'trim|required');
			$this->form_validation->set_rules('bairroInstituicao', 'Bairro', 'trim|required');
			$this->form_validation->set_rules('cidadeInstituicao', 'Cidade', 'trim|required');
			$this->form_validation->set_rules('ufInstituicao', 'Estado', 'trim|required');
			$this->form_validation->set_rules('cepInstituicao', 'CEP', 'trim|required');
			$this->form_validation->set_rules('telefoneInstituicao', 'Telefone', 'trim|required');
			
			$dataPost = $_POST;
            $this->load->model('usuarioModel', 'um');
			$this->load->model('instituicaoModel', 'im');
				
            $data = $this->um->autenticar($dataPost['emailInstituicao']);
            if(!empty($data)){
                $this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Email já cadastrado</div>");
                redirect(base_url('cadastroInstituicao'));
                exit();
            }
			
			$cpf = $this->im->autenticarCnpj(str_replace(".","",$dataPost['cnpjInstituicao']));
			if(!empty($cpf)){
                echo "CNPJ já cadastrado!";
                exit();
            }
			
			//Validacao do formato do CEP
			$this->load->model('cepModel', 'cepM');
			$vCep = $this->cepM->validarFormatoCep(str_replace(".", "",$dataPost['cepInstituicao']));
			
			if ($vCep == false) {
				echo ("CEP inválido!");
				exit();
			}

            if ($this->form_validation->run() == FALSE){
                $this->index();
            }
            else{
                $arrayInserirUsuario = array(
                    "email" => $dataPost['emailInstituicao'],
                    "password_hash" => sha1($dataPost['senhaInstituicao']),
                    "tipo" => 'I',
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s")            
                );
            
                //Insere um usuário na tabela e pegue o id inserido
                $idUsuarioInserido = $this->um->insereUsuario($arrayInserirUsuario);
                $email = $arrayInserirUsuario['email'];

                $arrayInstiuicao = array(
					"nome" => $dataPost['nomeInstituicao'],
					"cnpj" => str_replace("/","",str_replace("-","", str_replace(".","",$dataPost['cnpjInstituicao']))),
					"responsavel" => $dataPost['responsavelInstituicao'],
					"endereco" => $dataPost['enderecoInstituicao'],
					"end_numero" => $dataPost['end_numeroInstituicao'],
					"complemento" => $dataPost['complementoInstituicao'],
					"bairro" => $dataPost['bairroInstituicao'],
					"cidade" => $dataPost['cidadeInstituicao'],
					"uf" => $dataPost['ufInstituicao'],
					"cep" => str_replace("-","", str_replace(".","",$dataPost['cepInstituicao'])),
					"telefone" => str_replace("-","",$dataPost['telefoneInstituicao']),
					"status" => 'A',
					"usuario_id" => $idUsuarioInserido,
					"created_at" => date("Y-m-d H:i:s"),
					"updated_at" => date("Y-m-d H:i:s"),
				);
                  
    			// Insere um medico na tabela
				$this->im->insereInstituicao($arrayInstiuicao);
				redirect("Instituicao/instituicoes");

   			
            }
        }
}