<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Solicitacao extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
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
	
	public function teste() {
		return '1';
	}
	
	public function getHorariosMedicoDia($chave, $dia, $tipo='array') {
		
		$this->load->model("SolicitacaoModel");
		
		$query = $this->SolicitacaoModel->getHorariosMedicoDia($chave, $dia);
		
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
	 
}

?>