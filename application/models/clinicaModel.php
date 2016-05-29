<?php
	
	class ClinicaModel extends CI_Model{

		function __construct(){

			parent::__construct();
			$this->load->database();

		}
			

		//funcao para inserir clinica
		public function insereClinica($data){

			$this->db->insert('clinicas',$data);
		}

		
		public function autenticarClinica($idClinica){
					
		   $query = $this->db->get_where('Clinicas', array('id'=>$idClinica));
	  
		   return $query->result();

		}
		
		//busca uma determinada clinica pelo id
		public function buscarClinicaPorId($idClinica){
			$id = $this->session->userdata('medico');	

			$query = $this->db->get_where('clinicas', array('id'=>$idClinica,'medico_id'=>$id['id_medico']));
			return $query->result();
		}

		//pega somente nome e id das clinicas para usar na agenda
		public function getNomeIdClinica(){

			$this->db->select('id, nome');
			$this->db->from('clinicas');
			$query = $this->db->get();
			return $query->result();

		}


		//funcao que lista todas as clinicas do medico
		public function listaClinicas($id){

			 $query = $this->db->get_where('clinicas', array('medico_id'=>$id));
			return  $query->result();
				

		}

		//funcao para editar clinica pelo id
		public function editarCLinica($idClinica, $data){

			$id = $this->session->userdata('medico');	
			$this->db->update('clinicas', $data, array('id' => $idClinica,'medico_id'=>$id['id_medico']));

		}


		//funcao para excluir clinica pelo id
		public function excluirClinica($idClinica){

			$this->db->delete('clinicas' , array('id' => $idClinica));
			echo("clinica deletada");

		}


	}


?>