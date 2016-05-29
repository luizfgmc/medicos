<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Paciente extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->logininstituicao->valida_sessao_instituicao();
    }

    public function index() {

        $this->load->model('estadosModel');
        $estado['estados'] = $this->estadosModel->getInfoEstados();

        $this->load->view('layout/header');
        $this->load->view('insere_paciente', $estado);
        $this->load->view('layout/footer');
    }


    public function listaPacientes() {

        $this->load->model('pacienteModel', 'pm');
        $data['query'] = $this->pm->listaPacientes();
        $this->load->view('layout/header');
        $this->load->view('pacientes', $data);
        $this->load->view('layout/footer');
    }

    public function inserePaciente() {
		
		$this->load->model('pacienteModel', 'pm');
		
		$cpf = $this->pm->autenticarCpf(str_replace(".","", $this->input->post('cpfPaciente')));
			if(!empty($cpf)){
                echo "CPF já cadastrado!";
                exit();
            }

        $arrayPaciente = array(
            "nome_paciente" => $this->input->post('nomePaciente'),
            "cpf" =>preg_replace("/\D+/","" , $this->input->post('cpfPaciente')),
            "endereco" => $this->input->post('enderecoPaciente'),
            "end_numero" => $this->input->post('numeroPaciente'),
            "complemento" => $this->input->post('complementoPaciente'),
            "bairro" => $this->input->post('bairroPaciente'),
            "uf" => $this->input->post('ufPaciente'),
            "cidade" => $this->input->post('cidadePaciente'),
            "cep" => preg_replace("/\D+/","" ,$this->input->post('cepPaciente')),
            "telefone" => preg_replace("/\D+/","" ,$this->input->post('telefonePaciente')),
			"atividade" => 'A',
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        );

		
        $this->pm->inserePaciente($arrayPaciente);
        redirect('paciente/listaPacientes');
    }

    public function editarPaciente($idPaciente) {

        $this->load->model('pacienteModel', 'pm');
        $this->load->model('estadosModel');
        $estado = $this->estadosModel->getInfoEstados();

        $data['query'] = $this->pm->editarPaciente($idPaciente);
        $data['estados'] = $estado;

        $this->load->view('layout/header');
        $this->load->view('editar_paciente', $data);
        $this->load->view('layout/footer');
    }

    public function editarSalvarPaciente($idPaciente) {

        $arrayPaciente = array(
            "nome_paciente" => $this->input->post('nomePaciente'),
            "cpf" => preg_replace("/\D+/","" , $this->input->post('cpfPaciente')),
            "endereco" => $this->input->post('enderecoPaciente'),
            "end_numero" => $this->input->post('numeroPaciente'),
            "complemento" => $this->input->post('complementoPaciente'),
            "bairro" => $this->input->post('bairroPaciente'),
            "uf" => $this->input->post('ufPaciente'),
            "cidade" => $this->input->post('cidadePaciente'),
            "cep" => preg_replace("/\D+/","" , $this->input->post('cepPaciente')),
            "telefone" => preg_replace("/\D+/","" , $this->input->post('telefonePaciente')),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
            "atividade"=>"A"
        );

        $this->load->model('pacienteModel', 'pm');
        $this->pm->editarSalvarPaciente($idPaciente, $arrayPaciente);
        redirect('paciente/listaPacientes');
    }

    public function deletarPaciente($idPaciente) {

        $this->load->model('pacienteModel', 'pm');
        $this->pm->deletarPaciente($idPaciente);
        redirect('paciente/listaPacientes');
    }

}

?>