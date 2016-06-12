<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Medico extends CI_Controller {

    private $dadosSessao;

    function __construct() {
        parent::__construct();

        $this->load->helper(array('url','view'));
        $this->dadosSessao = $this->login->valida_sessao('medico');
    }

    public function index() {

        $this->load->model("especialidadesModel");
        //Pega informaçoes das especialidades
        $especialidades = $this->especialidadesModel->getInfoEspecialidade();

        $this->load->model("estadosModel");
        //Pega informaçoes dos estados
        $estados = $this->estadosModel->getInfoEstados();

        $dadosView = array('especialidades' => $especialidades, 'estados' => $estados);

        load_view_home('insere_medicos',$dadosView);
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
			($dia -1) ,
			($dia -2),
			($dia -3),
			($dia -4));
		
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
		
		load_view_home('chares',$data);
 	}
	
    public function solicitacoes() {

        $id = $this->dadosSessao['id_medico'];
        $this->load->model('solicitacaoModel', 'sm');
        $data['query'] = $this->sm->verSolicitcoes($id);

        load_view('solicitacoes',$data);

    }

    public function aprovarSolicitacao($idSolicitacao) {
        $this->load->model('solicitacaoModel', 'sm');
        $data['query'] = $this->sm->aprovarSolicitcao($idSolicitacao);

        load_view('aprovar_solicitacao',$data);
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
			"flg_retorno" => $this->input->post('retorno'),
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

    public function visualizaEditaMedicoMedicos() {

        $idMedico = $this->dadosSessao['id_medico'];
        $this->load->model("especialidadesModel");
        //Pega informaçoes das especialidades
        $especialidades = $this->especialidadesModel->getInfoEspecialidade();
        $this->load->model("estadosModel");
        //Pega informaçoes dos estados
        $estados = $this->estadosModel->getInfoEstados();
        $this->load->model("MedicoModel");
        $infoMedico = $this->MedicoModel->getTodasInfoMedicos($idMedico);
        $rankingMedico=$this->MedicoModel->getRankMedico($idMedico);
        $dadosView = array('especialidades' => $especialidades, 'estados' => $estados, 'infoMedico' => $infoMedico,'rankingMedico'=>$rankingMedico);

        load_view('editar_medicos', $dadosView);
    }

    public function salvaEditaMedica() {

        $idMedico = $this->dadosSessao['id_medico'];

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
        $this->MedicoModel->editarMedico($arrayEditarMedico, $idMedico);
        redirect('medico/solicitacoes');
    }

    public function solicitarConsulta(){


        $this->load->model('pacienteModel','pm');
        $this->load->model('agendaModel','am');
        $pacientes['paciente'] = $this->pm->listaPacientes();
        $idMedico = $this->dadosSessao['id_medico'];
        $idInstituicao = $this->session->userdata('instituicao');
        $idAgenda= $this->am->getAgendaMedico($idMedico);
        $data['query'] = array('idAgenda'=>$idAgenda,
            'idInstituicao'=>$idInstituicao['id_instituicao'],
            'pacientes'=>$pacientes
        );

        load_view('solicitacao_medico',$data);

    }

    public function solicitarConsultaSalvar()
    {

        $idMedico = $this->dadosSessao['id_medico'];
        $dataNaoFormatada = explode('/',$this->input->post('data_agendamento'));
        $dataFormatada=$dataNaoFormatada['2'].'/'.$dataNaoFormatada['1'].'/'.$dataNaoFormatada['0'];
        $arraySolicitcao = array(
            'instituicao_id'=>$idMedico,
            'paciente_id'=>$this->input->post('paciente'),
            'solicitante'=>$this->input->post('solicitante'),
            'data_emissao'=> date('Y-m-d'),
            "data_agendamento" => $dataFormatada,
            "hora_agendamento" => $this->input->post('hora_agendamento'),
            'status'=>'AP',
            'descricao'=> $this->input->post('descricao'),
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'agenda_id'=> $this->input->post('id_agenda'),
            'flg_retorno'=> 1,
        );
        
        $this->load->model("MedicoModel");
        $this->load->model('solicitacaoModel','sm');

        if($this->MedicoModel->getDisponibilidadeMedico($dataFormatada, date('H:i:s', strtotime($this->input->post('hora_agendamento'))))<1)
        {
            $this->sm->solicitarConsultaSalvar($arraySolicitcao);
        }
        else
        {
            $this->session->set_userdata('mensagemSolicitacao',true);
        }

        redirect('medico/solicitacoes');

    }

}

?>