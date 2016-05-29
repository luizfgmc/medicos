<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Clinica extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper('url');

        $this->loginmedico->valida_sessao_medico();
    }

    public function index() {

        $this->load->model('estadosModel');
        $estado['estados'] = $this->estadosModel->getInfoEstados();

        $this->load->view('layout/header');
        $this->load->view('insere_clinicas', $estado);
        $this->load->view('layout/footer');
    }

    //lista todos as clinicas do medico
    public function listaClinicas() {

        $id = $this->session->userdata('medico');

        $this->load->model('clinicaModel', 'cm');
        $data["query"] = $this->cm->listaClinicas($id['id_medico']);
        $this->load->view('layout/header');
        $this->load->view('clinicas', $data);
        $this->load->view('layout/footer');
    }

    //insere uma nova clinica do medico
    public function insereClinica() {

        $id = $this->session->userdata('medico');

        $data = $_POST;

        $this->load->model('clinicaModel', 'cm');
        $this->load->library('Form_validation');
        $this->form_validation->set_rules('nomeClinica', 'Nome', 'trim|required');
        $this->form_validation->set_rules('telefoneClinica', 'Telefone', 'trim|required');
        $this->form_validation->set_rules('enderecoClinica', 'Endereco', 'trim|required');
        $this->form_validation->set_rules('numeroClinica', 'Numero', 'trim|required');
        $this->form_validation->set_rules('bairroClinica', 'Bairro', 'trim|required');
        $this->form_validation->set_rules('cidadeClinica', 'Cidade', 'trim|required');
        $this->form_validation->set_rules('ufClinica', 'Uf', 'trim|required');
        $this->form_validation->set_rules('cepClinica', 'Cep', 'trim|required');
		
		//Validacao do formato do CEP
        $this->load->model('cepModel', 'cepM');
		$vCep = $this->cepM->validarFormatoCep(str_replace(".", "",$data['cepClinica']));
		
		if ($vCep == false) {
			$this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>CEP inválido!</div>");
			redirect(base_url('clinica'));
			exit();
		}
		
		if ($data['ufClinica'] == 'Selecione') {
			$this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Gentileza escolher uma UF!</div>");
			redirect(base_url('clinica'));
			exit();
		}
		
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $arrayInsereClinica = array(
                "medico_id" => $id['id_medico'],
                "nome" => $data['nomeClinica'],
                "telefone" => str_replace("-","",$data['telefoneClinica']),
                "endereco" => $data['enderecoClinica'],
                "end_numero" => $data['numeroClinica'],
                "end_complemento" => $data['complementoClinica'],
                "bairro" => $data['bairroClinica'],
                "cidade" => $data['cidadeClinica'],
                "uf" => $data['ufClinica'],
                "cep" => preg_replace("/\D+/","" ,$data['cepClinica']),
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            );
            $this->cm->insereClinica($arrayInsereClinica);
            $this->load->view("insere_clinicas.php");
            redirect('clinica/listaClinicas');
            $this->load->view('layout/footer');
        }
    }

    //buscar clinica pelo id para edicao
    public function editarClinica($idClinica) {

        $this->load->model('clinicaModel', 'cm');
        $data['query'] = $this->cm->buscarClinicaPorId($idClinica);
        $this->load->model('estadosModel');
        $estado = $this->estadosModel->getInfoEstados();
        $data['estados'] = $estado;
        $this->load->view('layout/header');
        $this->load->view('editar_clinica', $data);
        $this->load->view('layout/footer');
    }
    //funcao para editar clinicas
    public function editarClinicaSalvar($idClinica) {

        $id = $this->session->userdata('medico');
        $data = $_POST;
        $this->load->model('clinicaModel', 'cm');
        $arrayEditarClinica = array(
            "medico_id" => $id['id_medico'],
            "nome" => $data['nomeClinica'],
            "telefone" => str_replace("-","",$data['telefoneClinica']),
            "endereco" => $data['enderecoClinica'],
            "end_numero" => $data['numeroClinica'],
            "end_complemento" => $data['complementoClinica'],
            "bairro" => $data['bairroClinica'],
            "cidade" => $data['cidadeClinica'],
            "uf" => $data['ufClinica'],
            "cep" =>  preg_replace("/\D+/","" ,$data['cepClinica']),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        );
        $this->cm->editarClinica($idClinica, $arrayEditarClinica);
        redirect('clinica/listaClinicas');
    }
    //funcao para excluir clinicas
    public function excluirClinica($idClinica) {
		
        $this->load->model('clinicaModel', 'cm');
        
		$qtdClinicas = $this->cm->obterQuantidadeClinicasMedico($this->session->userdata('medico')['id_medico']);
		if ($qtdClinicas <= 1) {
			$this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Não pode-se deixar excluir uma clínica caso haja apenas uma clínica para o médico!</div>");
			redirect(base_url('clinica/listaClinicas'));
			exit();
		}
		
		$qtdCons = $this->cm->obterQuantidadeConsultas($idClinica);
		if ($qtdCons > 0) {
			$this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Não pode-se deixar excluir uma clínica sendo que tenha consultas em aberto para ela!</div>");
			redirect(base_url('clinica/listaClinicas'));
			exit();
		}
		
		
		
		$this->cm->excluirClinica($idClinica);
        redirect('clinica/listaClinicas');
    }
}
?>