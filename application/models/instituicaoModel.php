<?php
	

	class InstituicaoModel extends CI_Model{

		function __construct(){

			parent::__construct();
			$this->load->database();

		}


		public function listaInstituicoes(){

			$query = $this->db->get_where('instituicoes', array('usuario_id'=>59));
			return $query->result();
			
		}

		public function insereInstituicao($arrayInstituicao){

			$this->db->insert("instituicoes" , $arrayInstituicao);


		}

		public function editarInstituicao($id){
			$query = $this->db->get_where('instituicoes', array('usuario_id'=>59));
			return $query->result();
		}

		public function editarSalvarInstituicao($data, $id){

			$this->db->update('instituicoes', $data, array("id"=>$id));
		}


		public function deletaInstituicao($id){

			$this->db->delete('instituicoes', array('id'=>$id));

		}


	}

?>