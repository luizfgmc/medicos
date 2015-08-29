<?php

class Medico extends CI_Controller {

    function __construct() {
        parent::__construct();
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
        $idUsuarioInserido = $this->usuario_model->insereUsuario($arrayInserirUsuario);

        $arrayInserirMedico = array(
            "nome" => $dataPost['nomeMedico'],
            "cpf" => $dataPost['cpfMedico'],
            "especialidade_id" => $dataPost['especialidadeMedico'],
            "crm" => $dataPost['numeroCRM'],
            "crm_uf" => $dataPost['crmUF'],
            "telefone" => $dataPost['telefone'],
            "usuario_id" => $idUsuarioInserido
        );

        $this->load->model("MedicoModel");
        // Insere um medico na tabela
        $this->medico_model->insereMedico($arrayInserirMedico);

        redirect();
    }

    public function formMedico() {
        $this->load->view('insere_medicos');
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