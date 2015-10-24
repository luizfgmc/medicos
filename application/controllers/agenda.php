<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Agenda extends CI_Controller {

    function __construct() {

        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {


        $this->load->model('clinicaModel', 'cm');
        $data['clinica'] = $this->cm->getNomeIdClinica();

        $this->load->view('layout/header');


        $this->load->view('insere_Agenda', $data);
        $this->load->view('layout/footer');
    }

    public function listaAgendas() {

        $this->load->model('AgendaModel', 'am');
        $data['query'] = $this->am->listaAgendas();

        $this->load->view('agenda', $data);
    }

    public function insereAgenda() {

		   		$medico_id = $this->session->userdata('medico');

<<<<<<< HEAD
		   		 $arrayAgenda = array(
		   		 	
		   		 	"medico_id"=>$medico_id['id'],
		   		 	"data_emissao"=>date('Y-m-d'),
		   		 	"quantidade"=>$this->input->post('quantidadeAgenda'),
		   		 	"saldo"=>$this->input->post('quantidadeAgenda'),
		   		 	"created_at" => date("Y-m-d H:i:s"),
           			"updated_at" => date("Y-m-d H:i:s"),
           			"clinica_id"=>$this->input->post('clinicas'),

		   		 );
		   		
		   		var_dump($arrayAgenda);
		   		
=======
        $arrayAgenda = array(
            "medico_id" => 50,
            "data_emissao" => date('Y-m-d'),
            "quantidade" => $this->input->post('quantidadeAgenda'),
            "saldo" => $this->input->post('quantidadeAgenda'),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
            "clinica_id" => $this->input->post('clinicas'),
        );

>>>>>>> 490ce1a6a32ef6ab5c7dacf6a3e69d3064f01c56

        $this->load->model('AgendaModel', 'am');
        $this->am->insereAgenda($arrayAgenda);
        redirect('Agenda/listaAgendas');
    }

    public function editarAgenda($idAgenda) {

        $this->load->model('AgendaModel', 'am');
        $this->load->model('ClinicaModel', 'cm');

        $data['query'] = $this->am->editarAgenda($idAgenda);
        $data['clinica'] = $this->cm->getNomeIdClinica();


        $this->load->view('editar_agenda', $data);
    }

    public function editarSalvarAgenda($idAgenda) {

        $arrayAgenda = array(
            "medico_id" => 50,
            "data_emissao" => date('Y-m-d'),
            "quantidade" => $this->input->post('quantidadeAgenda'),
            "saldo" => $this->input->post('quantidadeAgenda'),
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
            "clinica_id" => $this->input->post('clinicas'),
        );


        $this->load->model('AgendaModel', 'am');
        $this->am->editarSalvarAgenda($idAgenda, $arrayAgenda);
        redirect('Agenda/listaAgendas');
    }

    public function deletarAgenda($idAgenda) {

        $this->load->model('AgendaModel', 'pm');
        $this->pm->deletarAgenda($idAgenda);
        redirect('Agenda/listaAgendas');
    }

}

?>