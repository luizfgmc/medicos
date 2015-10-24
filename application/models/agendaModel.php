<?php

	class AgendaModel extends CI_Model{

		function __construct(){

			parent::__construct();

		}


		public function listaAgendas(){

			
			$this->db->select('a.medico_id, a.data_emissao, a.id, a.quantidade, a.saldo, a.clinica_id, m.nome, m.telefone, m.crm, e.descricao, c.nome, c.telefone, c.endereco, c.end_numero');
			$this->db->from('agendas as a');
			$this->db->join('clinicas as c','a.clinica_id = c.id');
			$this->db->join('medicos as m', 'c.medico_id = m.id');
			$this->db->join('especialidades as e','m.especialidade_id = e.id');
			$query = $this->db->get();
			
			return $query->result();



		}

		public function insereAgenda($arrayAgenda){

			$this->db->insert('Agendas', $arrayAgenda);
		}

		
		public function editarAgenda($idAgenda){

			$this->db->select('c.nome, a.id, a.quantidade');
			$this->db->from('agendas as a');
			$this->db->join('clinicas as c','a.clinica_id = c.id');
			$this->db->where(array('a.id'=>$idAgenda));
			$query = $this->db->get();
			return $query->result();

		}

		public function editarSalvarAgenda($idAgenda, $arrayAgenda){

			$this->db->update('Agendas', $arrayAgenda, array('id'=>$idAgenda));

		}


		public function deletarAgenda($idAgenda){

			$this->db->delete('Agendas', array('id'=>$idAgenda));

		}

	}



?>