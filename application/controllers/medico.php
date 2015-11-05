<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Medico extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
     // comentei isso porque faz o meu webservice parar de funcionar
	 //$this->loginmedico->valida_sessao_medico();

    }
	
	public function enviarCartaoAgradecimento($idMedico) {
		
		$this->load->library('email');
		
		// Resetar informações armazenadas na classe
		$this->email->clear(TRUE);
		
		$this->load->model("MedicoModel");
		$medico = $this->MedicoModel->getTodasInfoMedicos($idMedico);
		
		$nomeMedico = $medico->nome;
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
	
	public function obterIdMedico($usuario, $senha) {
		
		$this->load->model("MedicoModel");
		$idMedico = $this->MedicoModel->obterIdMedico($usuario, $senha);
		
		if ($idMedico > 0) {
			
			return $idMedico;
		
		} else {
			
			return 0;
			
		}
		
	}
	
	public function gerarHash($idMedico, $tipo="json", $email="") {
		
		// Obter chave Hash gerada pelo metodo GerarHash da classe MedicoModel
		$this->load->model("MedicoModel");
		$chave = $this->MedicoModel->gerarHash($idMedico, $email);
		
		// Factory: Verificar tipo solicitado pelo usuario
		//por default array
		//Usar encode para retornar a chave no formato solicitado
		if ($tipo == 'json') {
			
			$chave = json_encode($chave);
			
		} elseif ($tipo == 'string') {
			
			// já retorna como string entao é só manter.
		
		} elseif ($tipo == 'array') {
			
			$chave = array ('chave' => $chave);
		
		} else {
			// Caso usuario informe um tipo que não seja Json, array ou string então retorna isso.
			$chave = array('chave' => 'Tipo não informado!');
			
		}
		
		// Retornar a chave. 
		return $chave;
	
	}


    public function solicitacoes(){

        $id = $this->session->userdata('medico');    
        $this->load->model('solicitacaoModel','sm');
        $data['query'] = $this->sm->verSolicitcoes($id['id_medico']);
        $this->load->view('layout/header');
        $this->load->view('solicitacoes',$data);
        $this->load->view('layout/footer');

    }

    public function aprovarSolicitacao($idSolicitacao){

         $this->load->model('solicitacaoModel','sm');
         $data['query'] = $this->sm->aprovarSolicitcao($idSolicitacao);

         $this->load->view('aprovar_solicitacao', $data);

    }


    public function reprovarSolicitacao($idSolicitacao){

         $this->load->model('solicitacaoModel','sm');
         $data = $this->sm->reprovarSolicitacao($idSolicitacao);
         echo $data;

    }

    public function aprovarSolicitacaoSalvar(){

        $idSolicitacao = $this->input->post('id');
        $arrayDados = array(
             
            "data_agendamento"=>$this->input->post('data_agendamento'),
            "hora_agendamento"=>$this->input->post('hora_agendamento'),
            "status"=>"AP",
            "updated_at"=>date('Y-m-d H:i:s'),
           
        );


        $this->load->model('solicitacaoModel','sm');
       $this->sm->aprovarSolicitcaoSalvar($arrayDados, $idSolicitacao);
        
        echo "sucesso";        

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
                "nome" => $dataPost['nomeMedico'],
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

    public function listarMedicos() {
        $this->load->model("MedicoModel");
        $listaDeMedicos = $this->MedicoModel->listarNomeTodosMedicos();
        $dadosView = array('listaDeMedicos' => $listaDeMedicos);
        
        
        $this->load->view('lista_medicos', $dadosView);
        
    }
    
    public function visualizaEditaMedicoMedicos() {
        
         $id = $this->session->userdata('medico'); 
           

        $this->load->model("especialidadesModel");
        //Pega informaçoes das especialidades
        $especialidades = $this->especialidadesModel->getInfoEspecialidade();
        $this->load->model("estadosModel");
        //Pega informaçoes dos estados
        $estados = $this->estadosModel->getInfoEstados();
        $this->load->model("MedicoModel");
        $infoMedico = $this->MedicoModel->getTodasInfoMedicos($id['id_medico']);
        $dadosView = array('especialidades' => $especialidades,'estados' => $estados,'infoMedico' => $infoMedico);
        $this->load->view('layout/header');
        $this->load->view('editar_medicos', $dadosView);       
        $this->load->view('layout/footer');
    }
    
    public function salvaEditaMedica() {
                
         $id = $this->session->userdata('medico'); 

        $dataPost = $_POST;
        $arrayEditarMedico = array(
            "nome" => $dataPost['nomeMedico'],
            "especialidade_id" => $dataPost['especialidadeMedico'],
            "crm" => $dataPost['numeroCRM'],
            "crm_uf" => $dataPost['crmUF'],
            "telefone" => $dataPost['telefoneMedico'],
            "updated_at" => date("Y-m-d H:i:s"),
        );
        $this->load->model("MedicoModel");
        $this->MedicoModel->editarMedico($arrayEditarMedico,$id['id_medico']);  
        redirect('medico/listarMedicos');
        
    }

    public function excluirMedico($idMedico,$idUsuario) {
         $id = $this->session->userdata('medico');    
         
        $this->load->model("MedicoModel");
        $this->load->model("UsuarioModel");
        $this->MedicoModel->excluirMedico($id['id_medico']);
        $this->UsuarioModel->excluirUsuario($id['id_usuario']);
        redirect('medico/listarMedicos');
    }

}

?>