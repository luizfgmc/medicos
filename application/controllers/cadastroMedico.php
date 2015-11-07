<?php

	class ScadastroMedico extends CI_Controller{
			
		function __construct(){

			parent::__construct();

		}
		

	 public function insereMedico() {
        $dataPost = $_POST;

    
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

            //Insere um usuário na tabela e pegue o id inserido
            $idUsuarioInserido = $this->UsuarioModel->insereUsuario($arrayInserirUsuario);

            $arrayInserirMedico = array(
                "nome_medico" => $dataPost['nomeMedico'],
                "cpf" => $dataPost['cpfMedico'],
                "especialidade_id" => $dataPost['especialidadeMedico'],
                "crm" => $dataPost['numeroCRM'],
                "crm_uf" => $dataPost['crmUF'],
                "telefone" => $dataPost['telefoneMedico'],
                "usuario_id" => $idUsuarioInserido,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
                
            );

            $this->load->model("MedicoModel");
            
			// Insere um medico na tabela
            $idMedicoInserido = $this->MedicoModel->insereMedico($arrayInserirMedico);
			
			// Envia o agradecimento ao medico
			$this->enviarCartaoAgradecimento($idMedicoInserido);
			
            redirect('medico/index');
        }
    }

    


    public function formMedico() {
        $this->load->model("especialidadesModel");
        //Pega informaçoes das especialidades
        $especialidades = $this->especialidadesModel->getInfoEspecialidade();
        
        $this->load->model("estadosModel");
        //Pega informaçoes dos estados
        $estados = $this->estadosModel->getInfoEstados();
        
        $dadosView = array('especialidades' => $especialidades,'estados' => $estados);
        $this->load->view('insere_medicos', $dadosView);
    }




}