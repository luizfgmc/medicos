<?php

	class cadastro extends CI_Controller{
			
		function __construct(){

			parent::__construct();
            $this->load->model('ProfissionalModel');

		}
		

        public function index() {
            $this->load->model("estadosModel");
            //Pega informaçoes dos estados
            $estados = $this->estadosModel->getInfoEstados();
      
            $this->load->model("ProfissaoModel");
            //Pega dados das profissoes
            $profissoes = $this->ProfissaoModel->getInfoProfissao();

            $dadosView = array('estados' => $estados,'profissoes'=>$profissoes);
            $this->load->view('layout/header_home');
            $this->load->view('insere_profissional', $dadosView);
            $this->load->view('layout/footer_home');
        }



            public function enviarCartaoAgradecimento($idMedico) {
                
                $this->load->library('email');
                
                // Resetar informações armazenadas na classe
                $this->email->clear(TRUE);
                
                $this->load->model("MedicoModel");
                $medico = $this->MedicoModel->getTodasInfoMedicos($idMedico);
                
                $nomeMedico = $medico->nome_medico;
                $email = $medico->email;
                
                $this->email->from('noreply.medicoamigo@gmail.com', 'Medico Amigo');
                $this->email->to($email);
                $this->email->subject($nomeMedico . ', seja bem vindo!');
                $this->email->message('Oi ' . $nomeMedico . ', <br/> Seja bem vindo a equipe Medico Amigo!');
                //$this->email->cc($email); Mantive comentado caso precise algum dia. Email com copia.
                //$this->email->attach('/path/to/file1.png');  Mantive comentado caso precise algum dia. Anexar.
                //$this->email->attach('/path/to/file2.pdf');  Mantive comentado caso precise algum dia. Pode anexar varios docs.
                $this->email->send();
                
            }


        public function validarCadastroProfissional()
        {

            // Valida se os parametros foram enviados corretamentos
            $this->load->library('Form_validation');
            $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|valida_cpf');
            $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
            $this->form_validation->set_rules('uf', 'uf', 'trim|required');  
        }   

    	 public function insereProfissional() {
            $dataPost = $_POST;
            $this->load->model('UsuarioModel');
            $emailCadastrado = $this->UsuarioModel->autenticar($dataPost['email']);

            if(!empty($emailCadastrado)){
                echo "Email já cadastrado!";
                exit();
            }

            $this->validarCadastroProfissional();
            
            if ($this->form_validation->run() == FALSE){
                $this->index();
            }
            else{
                $arrayInserirUsuario = array(
                    "email" => $dataPost['email'],
                 
                    "password_hash" => sha1($dataPost['senha']),
                    "tipo" => 'P',
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s")            
                );
                //Insere um usuário na tabela e pegue o id inserido
                $idUsuarioInserido = $this->UsuarioModel->insereUsuario($arrayInserirUsuario);
                $arrayInserirProfissional = array(
                    "nome_profissional" => $dataPost['nome'],
                    "cpf" => str_replace(".","",$dataPost['cpf']),
                    "id_profissao" => $dataPost['profissao'],
                    "uf" => $dataPost['uf'],
                    "telefone" => str_replace("-","",$dataPost['telefone']),
                    "usuario_id" => $idUsuarioInserido,
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s"),);
                                    
    			// Insere um profissional na tabela
                $idProfissional = $this->ProfissionalModel->insereProfissional($arrayInserirProfissional);
    			
    			// Envia o agradecimento ao profissional
        		//$this->enviarCartaoAgradecimento($idMedicoInserido);

                 $arrayProfissional = array('tipo' => $data[0]->tipo,'email' => $data[0]->email,'id_usuario' => $data[0]->id,'id_medico' =>$idMedicoInserido);
                $this->session->set_userdata('medico', $arrayProfissional);
                redirect(base_url('medico/solicitacoes'));
    			
            }
        }

        


      




}