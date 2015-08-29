<?php

class Medico extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('insere_medicos');
    }

    public function insereMedico() {
        $dataPost = $_POST;
        $arrayInserirUsuario = array(
            "email" => $dataPost['emailMedico'],
            "password_hash" => $dataPost['senhaMedico'],
            "tipo" => 'x'
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
        redirect('medico/formMedico');
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

    public function listarMedico() {
        $this->load->model("MedicoModel");
        $listaDeMedicos = $this->MedicoModel->listarNomeTodosMedicos();
        $dadosView = array('listaDeMedicos' => $listaDeMedicos);

        $this->load->view('insere_medicos', $dadosView);
    }

    public function excluirMedico($idMedico) {
        $this->load->model("MedicoModel");
        $this->MedicoModel->excluirMedico($idMedico);
    }

}

?>