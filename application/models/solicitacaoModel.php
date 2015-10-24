<?php

	class SolicitacaoModel extends CI_Model{
			
		function __construct(){

			parent::__construct();

		}

		public function verSolicitcoes($medicoId){

			$this->db->select('*, s.id');
			$this->db->from('solicitacoes as s'); 
			$this->db->join('agendas as a','s.agenda_id = a.id');
			$this->db->join('medicos as m','a.medico_id = m.id');
			$this->db->where('m.id', $medicoId);
			$query = $this->db->get();
			return $query->result();

		}


		public function aprovarSolicitcao($id){

			$query = $this->db->get_where('solicitacoes', array('id'=>$id));
			return $query->result();

		}


		public function aprovarSolicitcaoSalvar($arrayDados, $idSolicitacao){

			$this->db->update('solicitacoes',$arrayDados, array('id'=>$idSolicitacao));

		}

		public function solicitarConsulta(){



		}

	}



?>
