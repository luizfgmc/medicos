<?php

	class SolicitacaoModel extends CI_Model{
			
		function __construct(){

			parent::__construct();

		}
		
		public function naoCompareceu($idSolicitacao) {
			
			// Alterar status da solicitacao para NC (Nao Compareceu)
			$dados = array('status' => 'NC');
			$this->db->where('id', $idSolicitacao);
			$this->db->update('solicitacoes', $dados);
			
			// Obter ID do paciente que nao compareceu
			$this->db->select('paciente_id');
			$this->db->from('solicitacoes');
			$this->db->where('id', $idSolicitacao);
			
			// Armazenar informacoes
			$idPaciente = $this->db->get()->result_array()[0]['paciente_id'];
			$dados = array('atividade' => 'I');
			
			// Alterar status do paciente para I (Inativo)
			$this->db->where('id', $idPaciente);
			$this->db->update('pacientes', $dados);
			
		}
		
		public function remarcar($idSolicitacao, $novoData, $novoHorario) {
			
			$dados = array('data_agendamento' => $novoData, 'hora_agendamento' => $novoHorario);
			$this->db->where('id', $idSolicitacao);
			$this->db->update('solicitacoes', $dados);
			
		}

		//Consulta todas as solicitações da instituição informada
		public function getSolicitacoesInstituicao($id){
			
			$this->db->select('*, s.id, p.nome_paciente');
			$this->db->from('solicitacoes as s');
			$this->db->join('pacientes as p','s.paciente_id = p.id');
			$this->db->where('s.instituicao_id', $id);
			$this->db->where('s.flg_retorno', '0');
			$query = $this->db->get();
			return $query->result();

		}

		public function compareceu($idSolicitacao) {
			
			// Alterar status da solicitacao para CO (Compareceu)
			$dados = array('status' => 'CO');
			$this->db->where('id', $idSolicitacao);
			$this->db->update('solicitacoes', $dados);
			
		}

		public function verSolicitcoes($medicoId){

			$this->login->valida_sessao('medico');
			$this->db->select('*, s.id, p.nome_paciente');
			$this->db->from('solicitacoes as s'); 
			$this->db->join('agendas as a','s.agenda_id = a.id');
			$this->db->join('medicos as m','a.medico_id = m.id');
			$this->db->join('pacientes as p','s.paciente_id = p.id');
			$this->db->where('m.id', $medicoId);
			//$this->db->where('s.flg_retorno', '0');
			$query = $this->db->get();
			return $query->result();

		}

		public function salvarComentarioConsulta($solicitacaoId, $obs){
			$this->db->where(['id'=>$solicitacaoId]);
			$this->db->update('solicitacoes',['observacao'=>$obs]);
			exit('Consulta Fechada');
		}

		public function aprovarSolicitcao($id){

			$this->login->valida_sessao('medico');
			$query = $this->db->get_where('solicitacoes', array('id'=>$id));
			return $query->result();

		}

		public function reprovarSolicitacao($id){
			
			$arrSolicitcao = array('status'=>'RJ');

			$this->db->update('solicitacoes', $arrSolicitcao, array('id'=>$id));

			if($this->db->affected_rows() == 1)
				return "A solicitcao foi rejeitada";
			else
				return "ocorreu um erro.";
		}
		
		public function aprovarSolicitcaoSalvar($arrayDados, $idSolicitacao){

			$this->db->update('solicitacoes',$arrayDados, array('id'=>$idSolicitacao));

		}

		public function solicitarConsultaSalvar($arrayDados){

			$this->db->insert('solicitacoes',$arrayDados);
		}
		
		private function getTodosHorarios() {
		
		// Retornar todos os horários da agenda
		$this->db->select('solicitacoes.status, solicitacoes.descricao');
		$this->db->select('solicitacoes.data_agendamento, solicitacoes.hora_agendamento');
		$this->db->select('pacientes.nome_paciente, pacientes.telefone');
		$this->db->from('solicitacoes');
		$this->db->join('agendas', 'agendas.id = solicitacoes.agenda_id');
		$this->db->join('medicos', 'medicos.id = agendas.medico_id');
		$this->db->join('pacientes', 'pacientes.id = solicitacoes.paciente_id');
		$this->db->order_by('solicitacoes.data_agendamento', 'asc');
		$this->db->order_by('solicitacoes.hora_agendamento', 'asc');
		
		return $this;
	}
	
	public function getSolicitacao($idSolicitacao) {
		
		$this->getTodosHorarios()
			->db->where('solicitacoes.id', $idSolicitacao);
		
		$query = $this->db->get();
		
		return $query;
		
	}

    public function getTodosHorariosMedico($chave) {
		
		$this->getTodosHorarios()
			->db->where('medicos.chave_consulta', $chave);
		
		$query = $this->db->get();
		
		return $query->result();
    
	}

	public function getHorariosMedicoDia($chave, $data) {
		
		$this->getTodosHorarios()
			->db->where( array(
				'medicos.chave_consulta' => $chave,
				'solicitacoes.data_agendamento' => $data)
				);
		
		$query =  $this->db->get();
		return $query->result();
		
		
	}
	
	public function getHorariosMedicoPeriodo($chave, $dataIn, $dataFi) {
		
		$this->getTodosHorarios()
			->db
				->where('medicos.chave_consulta', $chave)
				->where('solicitacoes.data_agendamento >=', $dataIn)
				->where('solicitacoes.data_agendamento <=', $dataFi);
				
		return $this->db->get();
		
	}


	}



?>
