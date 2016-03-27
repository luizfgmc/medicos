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

		
		//busca uma determinada clinica pelo id
		public function buscarClinicaPorId($idClinica){
			$id = $this->session->userdata('medico');	

			$query = $this->db->get_where('clinicas', array('id'=>$idClinica,'medico_id'=>$id['id_medico']));
			return $query->result();
		}

		//pega somente nome e id das clinicas que relacionam com o medico logado para usar na agenda
		public function getNomeIdClinica(){

			$id = $this->session->userdata('medico');
		
			$this->db->select('id, nome');
			$this->db->from('clinicas');
			$this->db->where(array('medico_id'=>$id['id_medico']));

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

			$status = $this->verificaClinicaPorAgenda($idClinica);

			if(!$status){

				$this->db->delete('clinicas' , array('id' => $idClinica));
				exit("Clínica deletada");

			}else{
				exit("Essa clínica não pode ser deletada, pois, está vinculada a uma agenda");
			}


			

		}

		//verifica se a clinica está vinculada a alguma agenda
		public function verificaClinicaPorAgenda($idClinica){

			$query = $this->db->get_where('agendas', ['clinica_id'=>$idClinica]);

			if (!empty($query->result())) {

				return true;
				
			}else{

				return false;

			}
			
			return false;

		}	
	}


?>