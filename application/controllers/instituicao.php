<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Instituicao extends CI_Controller {

    function __construct() {

		parent::__construct();
		$this->load->helper('url');
		
		 $this->logininstituicao->valida_sessao_instituicao();
         
	}

    public function index(){

        $id = $this->session->userdata('instituicao');    
        $this->load->model('solicitacaoModel','sm');
        $data['query'] = $this->sm->verSolicitcoesInstituicao($id['id_instituicao']);
        $this->load->view('layout/header');
        $this->load->view('solicitacoes_instituicao',$data);
        $this->load->view('layout/footer');

    }

    public function solicitarConsulta($idAgenda){


        $this->load->model('pacienteModel','pm');
        $pacientes['paciente'] = $this->pm->listaPacientes();
        
        $idInstituicao = $this->session->userdata('instituicao');

        $data['query'] = array('idAgenda'=>$idAgenda,
                      'idInstituicao'=>$idInstituicao['id_instituicao'],
                      'pacientes'=>$pacientes
        );    

        $this->load->view('layout/header');
        $this->load->view('solicitacao', $data);
        $this->load->view('layout/footer');

    }

    public function solicitarConsultaSalvar(){

         $idInstituicao = $this->session->userdata('instituicao');

        $arraySolicitcao = array(
             'instituicao_id'=>$idInstituicao['id_instituicao'],
             'paciente_id'=>$this->input->post('paciente'),
             'solicitante'=>$this->input->post('solicitante'),
             'data_emissao'=> date('Y-m-d'),
             'status'=>'PE',
             'descricao'=> $this->input->post('descricao'),
             'created_at'=>date("Y-m-d H:i:s"),
             'updated_at'=>date("Y-m-d H:i:s"),
             'agenda_id'=> $this->input->post('id_agenda'),
             
        );


          $this->load->model('solicitacaoModel','sm');
          $this->sm->solicitarConsultaSalvar($arraySolicitcao);

          redirect('instituicao');

    }
    
    

    

}

?>