<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Profissional extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->loginprofissional->valida_sessao_profissional();
    }

    public function visualizaEditaMedicoProfissional() {

        $id = $this->session->userdata('profissional');
        $this->load->model("estadosModel");
        //Pega informaçoes dos estados
        $estados = $this->estadosModel->getInfoEstados();
        $this->load->model("ProfissionalModel");
        $infoProfissional = $this->ProfissionalModel->getTodasInfoProfissional($id['id_profissional']);
        $dadosView = array('estados' => $estados, 'infoProfissional' => $infoProfissional);
        $this->load->view('layout/header');
        $this->load->view('editar_profissional', $dadosView);
        $this->load->view('layout/footer');
    }

        public function salvaEditaProfissional() {

        $id = $this->session->userdata('profissional');

        $dataPost = $_POST;
        $arrayEditarProfissional = array(
            "nome_profissional" => $dataPost['nome'],
            "uf" => $dataPost['uf'],
            "telefone" => str_replace("-","",$dataPost['telefone']),
            "updated_at" => date("Y-m-d H:i:s"),
        );
        $this->load->model("ProfissionalModel");
        $this->ProfissionalModel->editarProfissional($arrayEditarProfissional, $id['id_profissional']);
        redirect('medico/solicitacoes');
    }

}

?>