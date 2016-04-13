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

        $paciente = $this->input->post('paciente');
            
        $this->verificaPaciente($paciente);

        $this->veriicaSaldoAgenda($this->input->post('id_agenda'));

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
          $this->sm->addSaldo('id',$this->input->post('id_agenda'), 'saldo_empenhado');
          $this->sm->removerSaldo('id',$this->input->post('id_agenda'), 'saldo');

          redirect('instituicao');

    }
        

      //verifica o campo paciente do formulário
      public function verificaPaciente($paciente){

        if(empty($paciente) || $paciente == 'Selecione')
            exit("Não é possível solicitar consulta sem selcionar um paciente!");

    } 

    //verifica se o saldo da agenda é maior que zero
    public function veriicaSaldoAgenda($idAgenda){
         
         $this->load->model('agendaModel','am');
         $data = $this->am->verificaSaldoAgenda($idAgenda);

         if(empty($data)){
              exit("saldo insuficiente");
          }else{

            $saldo = (double) $data[0]->saldo;
         
            if ($saldo <= 0 ) {
                
                exit("saldo insuficiente");       

            }  
        } 

    }
    

}

?>