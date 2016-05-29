<?php

	class PacienteModel extends CI_Model{

		function __construct(){

			parent::__construct();

		}
		
		public function autenticarCpf($cpf){
					
		   $query = $this->db->get_where('pacientes', array('cpf'=>$cpf));
	  
		   return $query->result();

		}


		public function listaPacientes(){

			$query = $this->db->get_where('pacientes',array('atividade' => 'A'));
	
			return $query->result();


		}

		public function inserePaciente($arrayPaciente){

			$this->db->insert('pacientes', $arrayPaciente);
		}

		
		public function editarPaciente($idPaciente){

			$query = $this->db->get_where('pacientes', array('id'=>$idPaciente));
			return $query->result();

		}

		public function editarSalvarPaciente($idPaciente, $arrayPaciente){

			$this->db->update('pacientes', $arrayPaciente, array('id'=>$idPaciente));

		}


		public function deletarPaciente($idPaciente){

			$this->db->delete('pacientes', array('id'=>$idPaciente));

		}

	}



?>