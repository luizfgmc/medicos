<?php

	class SolicitacaoModel extends CI_Model{
			
		function __construct(){

			parent::__construct();

		}

		public function verSolicitcoes($medicoId){

			 $this->loginmedico->valida_sessao_medico();
			$this->db->select('*, s.id, p.nome_paciente');
			$this->db->from('solicitacoes as s'); 
			$this->db->join('agendas as a','s.agenda_id = a.id');
			$this->db->join('medicos as m','a.medico_id = m.id');
			$this->db->join('pacientes as p','s.paciente_id = p.id');
			$this->db->where('m.id', $medicoId);
			$query = $this->db->get();
			return $query->result();

		}


		public function aprovarSolicitcao($id){

			 $this->loginmedico->valida_sessao_medico();
			$query = $this->db->get_where('solicitacoes', array('id'=>$id));
			return $query->result();

		}

		public function reprovarSolicitacao($id){

			 $this->loginmedico->valida_sessao_medico();
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

	}



?>
