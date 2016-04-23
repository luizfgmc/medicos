<?php

	class AgendaModel extends CI_Model{

		function __construct(){

			parent::__construct();

		}


		public function listaAgendas(){

			
			$this->db->select('a.medico_id, a.data_emissao, a.id, a.quantidade, a.saldo, a.clinica_id, m.nome_medico, m.telefone, m.crm, e.descricao, c.nome, c.telefone, c.endereco, c.end_numero');
			$this->db->from('agendas as a');
			$this->db->join('clinicas as c','a.clinica_id = c.id');
			$this->db->join('medicos as m', 'a.medico_id = m.id');
			$this->db->join('especialidades as e','m.especialidade_id = e.id');
			$query = $this->db->get();
			
			return $query->result();



		}

		public function getAgendaMedico($idMedico)
		{
			$this->db->select('id');
			$this->db->from('agendas');
			$this->db->where('medico_id',$idMedico);
			$query = $this->db->get();
			return $query->row();
		}

		public function listaAgendasMedico(){

			$id = $this->session->userdata('medico');	

			$this->db->select('a.medico_id, a.data_emissao, a.id, a.quantidade, a.saldo, a.clinica_id, m.nome_medico, m.telefone, m.crm, e.descricao, c.nome, c.telefone, c.endereco, c.end_numero');
			$this->db->from('agendas as a');
			$this->db->join('clinicas as c','a.clinica_id = c.id');
			$this->db->join('medicos as m', 'c.medico_id = m.id');
			$this->db->join('especialidades as e','m.especialidade_id = e.id');
			$this->db->where('a.medico_id',$id['id_medico']);
			$query = $this->db->get();
		

			return $query->result();


		}


		public function insereAgenda($arrayAgenda){

			$this->db->insert('Agendas', $arrayAgenda);
		}

		
		public function editarAgenda($idAgenda){

			$id = $this->session->userdata('medico');	
			$id_medico = $id['id_medico'];

			$this->db->select('c.nome, a.id, a.quantidade, a.medico_id');
			$this->db->from('agendas as a');
			$this->db->join('clinicas as c','a.clinica_id = c.id');
			$this->db->where(array('a.id'=>$idAgenda, 'a.medico_id'=>$id_medico));
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