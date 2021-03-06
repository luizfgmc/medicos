<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class MedicoSoap extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
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
            "nome_medico" => $dataPost['nomeMedico'],
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



}

?>