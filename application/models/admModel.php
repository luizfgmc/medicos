<?php
	

	class admModel extends CI_Model{

		function __construct(){

			parent::__construct();
			$this->load->database();

		}

		 public function autenticar($email){

	       $query = $this->db->get_where('Usuarios',array('email'=>$email));
	       return $query->result();


    }

}