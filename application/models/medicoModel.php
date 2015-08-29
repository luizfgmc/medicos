<?php
	
	class MedicoModel
	{
		public function insereMedico($dadosMedico)
		{
			$this->db->insert('medicos', $dadosMedico); 
		}
		
		public function listarMedicos()
		{
			$this->db->select('id_medico')
			->from('medicos');
			$query = $this->db->get();
			return $this;
		}
		
		public function listarNomeTodosMedicos()
		{
			$this->listarMedicos()
			->db->select('nome');
			$query = $this->db->get();
			return $this;
		}
		
		public function excluirMedico($idMedico)
		{
			$this->db->delete('medicos', array('id_medico' => idMedico)); 
		}		
	}
	