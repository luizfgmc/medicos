<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Medico extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');


        $this->loginmedico->valida_sessao_medico();
    }

    public function obterIdMedico($usuario, $senha) {

        $this->load->model("MedicoModel");
        $idMedico = $this->MedicoModel->obterIdMedico($usuario, $senha);

        if ($idMedico > 0) {

            return $idMedico;
        } else {

            return 0;
        }
    }

    public function gerarHash($idMedico, $tipo = "json", $email = "") {

        // Obter chave Hash gerada pelo metodo GerarHash da classe MedicoModel
        $this->load->model("MedicoModel");
        $chave = $this->MedicoModel->gerarHash($idMedico, $email);

        // Factory: Verificar tipo solicitado pelo usuario
        //por default array
        //Usar encode para retornar a chave no formato solicitado
        if ($tipo == 'json') {

            $chave = json_encode($chave);
        } elseif ($tipo == 'string') {

            // já retorna como string entao é só manter.
        } elseif ($tipo == 'array') {

            $chave = array('chave' => $chave);
        } else {
            // Caso usuario informe um tipo que não seja Json, array ou string então retorna isso.
            $chave = array('chave' => 'Tipo não informado!');
        }

        // Retornar a chave. 
        return $chave;
    }

	public function chares() {
		
		// Gerar um numero aleatorio entre 1 e 4. Essa sera a posicao do dia original no array.
		$posicaoAno = rand(0, 3);
		
		// Obter dia Original
		$dia = date("d");
		
		// Obter array de dias falsos
		$diaF = array(
			($dia -1) % date("t"), 
			($dia -2) % date("t"), 
			($dia -3) % date("t"), 
			($dia -4) % date("t"));
		
		// Alimentar array com os dias do mês
		$arr = array();
		for ($i = 0; $i < 4; $i++) {
			
			if ($i == $posicaoAno) {
				array_push($arr, $dia);
			} else {
				array_push($arr, $diaF[$i]);
			}
			
		}
		
        $data['dias'] = $arr;
		$data['hora'] = date("h:m");
		$this->session->set_flashdata('hora', $data['hora']);
		
		$this->load->view('layout/header_home');
        $this->load->view('chares', $data);
        $this->load->view('layout/footer_home');
	
	}
	
    public function solicitacoes() {

        $id = $this->session->userdata('medico');
        $this->load->model('solicitacaoModel', 'sm');
        $data['query'] = $this->sm->verSolicitcoes($id['id_medico']);
        $this->load->view('layout/header');
        $this->load->view('solicitacoes', $data);
        $this->load->view('layout/footer');
    }

    public function aprovarSolicitacao($idSolicitacao) {

        $this->load->model('solicitacaoModel', 'sm');
        $data['query'] = $this->sm->aprovarSolicitcao($idSolicitacao);
        $this->load->view('layout/header');
        $this->load->view('aprovar_solicitacao', $data);
        $this->load->view('layout/footer');
    }

    public function reprovarSolicitacao($idSolicitacao) {

        $this->load->model('solicitacaoModel', 'sm');
        $data = $this->sm->reprovarSolicitacao($idSolicitacao);
        redirect('medico/solicitacoes');
    }

    public function aprovarSolicitacaoSalvar() {


        $idSolicitacao = $this->input->post('id');
        $dataNaoFormatada = explode('/',$this->input->post('data_agendamento'));
        $dataFormatada=$dataNaoFormatada['2'].'/'.$dataNaoFormatada['1'].'/'.$dataNaoFormatada['0'];
        $this->load->model("MedicoModel");
        $this->load->model('solicitacaoModel', 'sm');
        $arrayDados = array(
            "data_agendamento" => $dataFormatada,
            "hora_agendamento" => $this->input->post('hora_agendamento'),
            "status" => "AP",
            "updated_at" => date('Y-m-d H:i:s'),
        );
        if($this->MedicoModel->getDisponibilidadeMedico($dataFormatada, date('H:i:s', strtotime($this->input->post('hora_agendamento'))))<1)
        {
            $this->sm->aprovarSolicitcaoSalvar($arrayDados, $idSolicitacao);
        }
        else
        {
            $this->session->set_userdata('mensagemSolicitacao',true);
        }
        redirect(base_url().'medico/solicitacoes');

    }

    public function index() {

        $this->load->model("especialidadesModel");
        //Pega informaçoes das especialidades
        $especialidades = $this->especialidadesModel->getInfoEspecialidade();

        $this->load->model("estadosModel");
        //Pega informaçoes dos estados
        $estados = $this->estadosModel->getInfoEstados();

        $dadosView = array('especialidades' => $especialidades, 'estados' => $estados);

        $this->load->view('layout/header_home');
        $this->load->view('insere_medicos', $dadosView);
        $this->load->view('layout/footer_home');
    }

    public function visualizaEditaMedicoMedicos() {

        $id = $this->session->userdata('medico');


        $this->load->model("especialidadesModel");
        //Pega informaçoes das especialidades
        $especialidades = $this->especialidadesModel->getInfoEspecialidade();
        $this->load->model("estadosModel");
        //Pega informaçoes dos estados
        $estados = $this->estadosModel->getInfoEstados();
        $this->load->model("MedicoModel");
        $infoMedico = $this->MedicoModel->getTodasInfoMedicos($id['id_medico']);
        $rankingMedico=$this->MedicoModel->getRankMedico($id['id_medico']);
        $dadosView = array('especialidades' => $especialidades, 'estados' => $estados, 'infoMedico' => $infoMedico,'rankingMedico'=>$rankingMedico);
        $this->load->view('layout/header');
        $this->load->view('editar_medicos', $dadosView);
        $this->load->view('layout/footer');
    }

    public function salvaEditaMedica() {

        $id = $this->session->userdata('medico');

        $dataPost = $_POST;
        $arrayEditarMedico = array(
            "nome_medico" => $dataPost['nomeMedico'],
            "especialidade_id" => $dataPost['especialidadeMedico'], 
            "crm" => $dataPost['numeroCRM'],
            "crm_uf" => $dataPost['crmUF'],
            "telefone" => str_replace("-","",$dataPost['telefoneMedico']),
            "updated_at" => date("Y-m-d H:i:s"),
        );
        $this->load->model("MedicoModel");
        $this->MedicoModel->editarMedico($arrayEditarMedico, $id['id_medico']);
        redirect('medico/solicitacoes');
    }

    public function solicitarConsulta(){


        $this->load->model('pacienteModel','pm');
        $this->load->model('agendaModel','am');
        $pacientes['paciente'] = $this->pm->listaPacientes();
        $medico = $this->session->userdata('medico');
        $idInstituicao = $this->session->userdata('instituicao');
        $idAgenda= $this->am->getAgendaMedico($medico['id_medico']);
        $data['query'] = array('idAgenda'=>$idAgenda,
            'idInstituicao'=>$idInstituicao['id_instituicao'],
            'pacientes'=>$pacientes
        );

        $this->load->view('layout/header');
        $this->load->view('solicitacao', $data);
        $this->load->view('layout/footer');

    }

}

?>