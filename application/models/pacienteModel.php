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
		
		public function obterEspecialidadeAgenda($idAgenda){
		
			$this->db->limit(1);
			$this->db->select("m.especialidade_id");
			$this->db->from("agendas a");
			$this->db->join("medicos m", "m.id = a.medico_id");
			$this->db->where("a.id = {$idAgenda}");
			
			
			$query = $this->db->get();
			 
			return $query->row()->especialidade_id;
		
		}
		
		public function listaPacientesFiltrado($idAgenda, $apelido='p'){
			
			// Deixei a verificacao de especialidade se um dia for usar
			// nao concordo de o paciente nao poder consultar com a mesma especialidade
			// nesse caso esta proibindo de solicitar 2 consultas na mesma agenda pro mesmo paciente
			//$especialidade = $this->obterEspecialidadeAgenda($idAgenda);
			
			$this->db->distinct();
			$this->db->select("{$apelido}.*");
			$this->db->from("pacientes {$apelido}");
			$this->db->join("solicitacoes s", "{$apelido}.id = s.paciente_id", "left");
			$this->db->join("agendas a", "s.agenda_id = a.id", "left");
			$this->db->join("medicos m", "a.medico_id = m.id", "left");
			
			$this->db->where("{$apelido}.atividade = 'A'");
			$this->db->where("a.id <> {$idAgenda}");
			//$this->db->where("m.especialidade_id <> {$especialidade}");
			
			$query = $this->db->get();
			 
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