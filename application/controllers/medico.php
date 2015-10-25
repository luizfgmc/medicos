<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Medico extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        
         $this->loginmedico->valida_sessao_medico();

    }

    public function solicitacoes(){

        $id = $this->session->userdata('medico');    
        $this->load->model('solicitacaoModel','sm');
        $data['query'] = $this->sm->verSolicitcoes($id['id_medico']);

        $this->load->view('solicitacoes',$data);

    }

    public function aprovarSolicitacao($idSolicitacao){

        echo $idSolicitacao;

         $this->load->model('solicitacaoModel','sm');
         $data['query'] = $this->sm->aprovarSolicitcao($idSolicitacao);

         $this->load->view('aprovar_solicitacao', $data);

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
               
        $this->load->view('layout/header');
        $this->load->view('insere_medicos');
        $this->load->view('layout/footer');
    }

    public function insereMedico() {
        $dataPost = $_POST;

        $this->load->library('Form_validation');
        $this->form_validation->set_rules('cpfMedico', 'CPF', 'trim|required|valida_cpf');
        $this->form_validation->set_rules('nomeMedico', 'Nome', 'trim|required');
        $this->form_validation->set_rules('especialidade_id', 'Especialidade', 'trim|required');
        $this->form_validation->set_rules('crm_uf', 'CRMUF', 'trim|required');
        $this->form_validation->set_rules('crm', 'CRM', 'trim|required');

        
        if ($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            $arrayInserirUsuario = array(
                "email" => $dataPost['emailMedico'],
                "password_hash" => $dataPost['senhaMedico'],
                "tipo" => 'x',
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
            $this->MedicoModel->insereMedico($arrayInserirMedico);  
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
    
    public function visualizaEditaMedicoMedicos($idMedico) {
        $this->load->model("especialidadesModel");
        //Pega informaçoes das especialidades
        $especialidades = $this->especialidadesModel->getInfoEspecialidade();
        $this->load->model("estadosModel");
        //Pega informaçoes dos estados
        $estados = $this->estadosModel->getInfoEstados();
        $this->load->model("MedicoModel");
        $infoMedico = $this->MedicoModel->getTodasInfoMedicos($idMedico);
        $dadosView = array('especialidades' => $especialidades,'estados' => $estados,'infoMedico' => $infoMedico);
        $this->load->view('layout/header');
        $this->load->view('editar_medicos', $dadosView);       
        $this->load->view('layout/footer');
    }
    
    public function salvaEditaMedica() {
        $dataPost = $_POST;
        $arrayEditarMedico = array(
            "nome" => $dataPost['nomeMedico'],
            "cpf" => $dataPost['cpfMedico'],
            "especialidade_id" => $dataPost['especialidadeMedico'],
            "crm" => $dataPost['numeroCRM'],
            "crm_uf" => $dataPost['crmUF'],
            "telefone" => $dataPost['telefoneMedico'],
            "updated_at" => date("Y-m-d H:i:s"),
        );
        $this->load->model("MedicoModel");
        $this->MedicoModel->editarMedico($arrayEditarMedico,$dataPost['idMedico']);  
        redirect('medico/listarMedicos');
        
    }

    public function excluirMedico($idMedico,$idUsuario) {
        $this->load->model("MedicoModel");
        $this->load->model("UsuarioModel");
        $this->MedicoModel->excluirMedico($idMedico);
        $this->UsuarioModel->excluirUsuario($idUsuario);
        redirect('medico/listarMedicos');
    }

}

?>