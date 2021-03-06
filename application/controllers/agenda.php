<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Agenda extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {

        $this->loginmedico->valida_sessao_medico();
        $this->load->model('clinicaModel', 'cm');
		$idMedico = $this->session->userdata('medico')['id_medico'];
        $data['clinica'] = $this->cm->listaClinicas($idMedico);

        $this->load->view('layout/header');


        $this->load->view('insere_Agenda', $data);
        $this->load->view('layout/footer');
    }

    //----lista as agendas do medico-----
    public function listarAgendasMedico() {

        $this->loginmedico->valida_sessao_medico();
        $this->load->model('AgendaModel', 'am');
        $data['query'] = $this->am->listaAgendasMedico();
        $this->load->view('layout/header');
        $this->load->view('minhas_agendas', $data);
        $this->load->view('layout/footer');
    }

    //----lista todas as agendas ------
    public function listaAgendas() {

        $this->logininstituicao->valida_sessao_instituicao();
        $this->load->model('AgendaModel', 'am');

        $data['query'] = $this->am->listaAgendasComSaldo();


        $this->load->view('layout/header');
        $this->load->view('agenda', $data);
        $this->load->view('layout/footer');
    }

    public function insereAgenda() {

        $this->loginmedico->valida_sessao_medico();
        $id = $this->session->userdata('medico');
		
		$this->load->model('ClinicaModel', 'cm');
		$data = $this->cm->autenticarClinica($this->input->post('clinicas'));
		if(empty($data)){
			$this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Clinica não cadastrada!</div>");
			redirect(base_url('agenda'));
			exit();
		}
		
		if($this->input->post('quantidadeAgenda') <= 0){
			$this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Gentileza informar a quantidade de consultas!</div>");
			redirect(base_url('agenda'));
			exit();
		}
		
		if($this->input->post('dia_agenda') == NULL){
			$this->session->set_userdata('erroEmail', "<div class='erroSolicitacao'>Gentileza selecionar o dia da semana!</div>");
			redirect(base_url('agenda'));
			exit();
		}
		
        $arrayAgenda = array(
            "medico_id" => $id['id_medico'],
            "data_emissao" => date('Y-m-d'),
            "quantidade" => $this->input->post('quantidadeAgenda'),
            "saldo" => $this->input->post('quantidadeAgenda'),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
            "clinica_id" => $this->input->post('clinicas'),
            "dia_semana" => $this->input->post('dia_agenda')
        );


        $this->load->model('AgendaModel', 'am');
        $this->am->insereAgenda($arrayAgenda);
        redirect('Agenda/listarAgendasMedico');
    }

    public function editarAgenda($idAgenda) {

        $this->loginmedico->valida_sessao_medico();
        $this->load->model('AgendaModel', 'am');
        $this->load->model('ClinicaModel', 'cm');

        $data['query'] = $this->am->editarAgenda($idAgenda);
        $data['clinica'] = $this->cm->getNomeIdClinica();


        $this->load->view('editar_agenda', $data);
    }

    public function editarSalvarAgenda($idAgenda) {

        $this->loginmedico->valida_sessao_medico();
         $id = $this->session->userdata('medico');

        $arrayAgenda = array(
            "medico_id" => $id['id_medico'],
            "data_emissao" => date('Y-m-d'),
            "quantidade" => $this->input->post('quantidadeAgenda'),
            "saldo" => $this->input->post('quantidadeAgenda'),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
            "clinica_id" => $this->input->post('clinicas'),
        );


        $this->load->model('AgendaModel', 'am');
        $this->am->editarSalvarAgenda($idAgenda, $arrayAgenda);
        redirect('Agenda/listarAgendasMedico');
    }

    public function deletarAgenda($idAgenda) {

        $this->loginmedico->valida_sessao_medico();
        $this->load->model('AgendaModel', 'pm');
        $this->pm->deletarAgenda($idAgenda);
        redirect('Agenda/listarAgendasMedico');
    }

}

?>