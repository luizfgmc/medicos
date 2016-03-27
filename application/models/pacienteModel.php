<?php

	class PacienteModel extends CI_Model{

		function __construct(){

			parent::__construct();

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

		//verifica se já exsite o cpf do paciente no banco
		public function verificaCpf($cpf){

			$query = $this->db->get_where('pacientes', ['cpf'=>$cpf]);
			$existeCpf = false;

			if(!empty($query->result())) {

				$existeCpf = true;
			}

			return $existeCpf;
		}

		//verifica se o paciente está vinculado a uma solicitação

		public function verificaPacientePorSolicitacao($idPaciente){

			$query = $this->db->get_where('solicitacoes', ['paciente_id'=>$idPaciente]);

			if(!empty($query->result()))
				return true;
			else
				return false;

			
			return false;


		}


	}



?>