<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Solicitacao extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

	public function solicitarConsulta($idAgenda){


		$this->load->model('pacienteModel','pm');
		$pacientes['paciente'] = $this->pm->listaPacientes();

		$data['query'] = array('idAgenda'=>$idAgenda,'pacientes'=>$pacientes);

		$this->load->view('layout/header');
		$this->load->view('solicitacao', $data);
		$this->load->view('layout/footer');

	}	
	
	public function remarcar($idSolicitacao, $novoData, $novoHorario) {
		
		$this->load->model("SolicitacaoModel");
		$dataAtual = $this->SolicitacaoModel->getSolicitacao($idSolicitacao)->result_array()[0]['data_agendamento'];
		
		// Verificar se a data que está no banco é superior a data atual
		// se superior automaticamente é 24 maior
		$dataAgora = date('Y-m-d');
		if ($dataAgora < $dataAtual) {
			
			// Verificar se nova data é maior que a data de agora
			if ($novoData > $dataAgora) {
				
				$this->SolicitacaoModel->remarcar($idSolicitacao, $novoData, $novoHorario);
				
			}
			
		}
		
	}
	
	public function naoCompareceu($idSolicitacao) {
		
		$this->load->model("SolicitacaoModel");
		$this->SolicitacaoModel->naoCompareceu($idSolicitacao);
		
	}
	
	public function compareceu($idSolicitacao) {
		
		$this->load->model("SolicitacaoModel");
		$this->SolicitacaoModel->compareceu($idSolicitacao);
		
	}
	
	public function getTodosHorariosMedico($chave, $tipo='array') {
		
		$this->load->model("SolicitacaoModel");
		$query = $this->SolicitacaoModel->getTodosHorariosMedico($chave);
		
		exit(json_encode($query));
		
		/*foreach ($query->result_array() as $row) {
			
			$arrTemp = array('status' => $row['status'], 
								'descricao' => $row['descricao'],
								'data_agendamento' => $row['data_agendamento'],
								'hora_agendamento' => $row['hora_agendamento'],
								'nome' => $row['nome'],
								'telefone' => $row['telefone']
							);
			
			array_push($arr, $arrTemp);
		
		} */
		
		if ($tipo == 'json') {
			
			$arr = json_encode($arr);
			
		} elseif ($tipo == 'array') {
			
			// somente manter.
		
		} else {
			// Caso usuario informe um tipo que não seja Json ou array então retorna isso.
			$arr = array('chave' => 'Tipo não informado!');
			
		}
		
		return $arr;
		
	}
	
	public function teste() {
		return '1';
	}
	
	public function getHorariosMedicoDia($chave, $dia, $tipo) {
		
		$this->load->model("SolicitacaoModel");
		
		$query = $this->SolicitacaoModel->getHorariosMedicoDia($chave, $dia);
		
		exit(json_encode($query));	
		
		/*foreach ($query->result_array() as $row) {
			
			$arrTemp = array('status' => $row['status'], 
								'descricao' => $row['descricao'],
								'data_agendamento' => $row['data_agendamento'],
								'hora_agendamento' => $row['hora_agendamento'],
								'nome_paciente' => $row['nome'],
								'telefone' => $row['telefone']
							);
			
			array_push($arr, $arrTemp);
		
		} */
		
		if ($tipo == 'json') {
			
			$arr = json_encode($arr);
			
		} elseif ($tipo == 'array') {
			
			// somente manter.
		
		} else {
			// Caso usuario informe um tipo que não seja Json ou array então retorna isso.
			$arr = array('chave' => 'Tipo não informado!');
			
		}
		
		return $arr;
		
		return 'a';
	}
	
	public function getHorariosMedicoPeriodo($chave, $diaIn, $diaFi, $tipo='array') {
		
		$this->load->model("SolicitacaoModel");
		$query = $this->SolicitacaoModel->getHorariosMedicoPeriodo($chave, $diaIn, $diaFi);
		
		$arr = array();
		
		foreach ($query->result_array() as $row) {
			
			$arrTemp = array('status' => $row['status'], 
								'descricao' => $row['descricao'],
								'data_agendamento' => $row['data_agendamento'],
								'hora_agendamento' => $row['hora_agendamento'],
								'nome' => $row['nome'],
								'telefone' => $row['telefone']
							);
			
			array_push($arr, $arrTemp);
		
		}
		
		if ($tipo == 'json') {
			
			$arr = json_encode($arr);
			
		} elseif ($tipo == 'array') {
			
			// somente manter.
		
		} else {
			// Caso usuario informe um tipo que não seja Json ou array então retorna isso.
			$arr = array('chave' => 'Tipo não informado!');
			
		}

		return $arr;
		
	}

	//salva o comentario do medico sob a consulta
	public function salvarComentarioConsulta(){
			$this->load->model("SolicitacaoModel","sm");
			$obs = $this->input->post('observacao');
			$solicitacaoId = $this->input->post('solicitacao_id');
			
			$this->sm->salvarComentarioConsulta($solicitacaoId, $obs); 
			exit('Consulta Encerrada');
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

    public function reprovarSolicitacao($idSolicitacao)
    {
        $this->load->model('solicitacaoModel', 'sm');
        $this->sm->reprovarSolicitacaoInstituicao($idSolicitacao);
        redirect('instituicao');
    }
	 
}

?>