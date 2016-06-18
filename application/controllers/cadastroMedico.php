<?php

	class cadastroMedico extends CI_Controller{
			
		function __construct(){

			parent::__construct();

		}
		

          public function index() {
            $this->load->model("especialidadesModel");
            //Pega informaçoes das especialidades
            $especialidades = $this->especialidadesModel->getInfoEspecialidade();
            
            $this->load->model("estadosModel");
            //Pega informaçoes dos estados
            $estados = $this->estadosModel->getInfoEstados();
            
            $dadosView = array('especialidades' => $especialidades,'estados' => $estados);
            $this->load->view('layout/header_home');
            $this->load->view('insere_medicos', $dadosView);
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


    	 public function insereMedico() {
            $dataPost = $_POST;
            $this->load->model('usuarioModel', 'mm');
			
            $data = $this->mm->autenticar($dataPost['emailMedico']);
            if(!empty($data)){
                $this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Email já cadastrado</div>");
                redirect(base_url('cadastroMedico'));
                exit();
            }
			
			$cpf = $this->mm->autenticarCpf(str_replace(".","",$dataPost['cpfMedico']));
			if(!empty($cpf)){
                echo "CPF já cadastrado!";
                exit();
            }


            $this->load->library('Form_validation');
            $this->form_validation->set_rules('cpfMedico', 'CPF', 'trim|required|valida_cpf');
            $this->form_validation->set_rules('nomeMedico', 'Nome', 'trim|required');
            $this->form_validation->set_rules('especialidadeMedico', 'Especialidade', 'trim|required');
            $this->form_validation->set_rules('numeroCRM', 'CRM', 'trim|required');
            $this->form_validation->set_rules('crmUF', 'CRMUF', 'trim|required');
            
            
            if ($this->form_validation->run() == FALSE){
                $this->index();
            }
            else{
                $arrayInserirUsuario = array(
                    "email" => $dataPost['emailMedico'],
                    "password_hash" => sha1($dataPost['senhaMedico']),
                    "tipo" => 'M',
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s")            
                );

                $this->load->model("UsuarioModel");
                $this->load->model("MedicoModel");
  
             
                //Insere um usuário na tabela e pegue o id inserido
                $idUsuarioInserido = $this->UsuarioModel->insereUsuario($arrayInserirUsuario);
                $email = $arrayInserirUsuario['email'];

                $arrayInserirMedico = array(
                    "nome_medico" => $dataPost['nomeMedico'],
                    "cpf" => preg_replace("/\D+/","" ,$dataPost['cpfMedico']),
                    "especialidade_id" => $dataPost['especialidadeMedico'],
                    "crm" => preg_replace("/\D+/","" ,$dataPost['numeroCRM']),
                    "crm_uf" => $dataPost['crmUF'],
                    "telefone" => preg_replace("/\D+/","" ,$dataPost['telefoneMedico']),
                    "usuario_id" => $idUsuarioInserido,
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s"),
                    
                );
                
             //   $data = $this->usuarioModel->autenticar($email);  
                  
    			// Insere um medico na tabela
                $idMedicoInserido = $this->MedicoModel->insereMedico($arrayInserirMedico);
    			
    			// Envia o agradecimento ao medico
        		//$this->enviarCartaoAgradecimento($idMedicoInserido);

                 $arrayMedico = array(
                    'tipo' => $data[0]->tipo,
                    'nome' => $dataPost['nomeMedico'],
                    'email' => $data[0]->email,
                    'id_usuario' => $data[0]->id,
                    'id_medico' =>$idMedicoInserido,
                );
                $this->session->set_userdata('medico', $arrayMedico);
                redirect(base_url('medico/solicitacoes'));
   			
            }
        }
}