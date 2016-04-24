<?php

class ApoiadorModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
	
    public function insereApoiador($dadosApoiador) {
        $this->db->insert('apoiadores', $dadosApoiador);
		$idInserido = $this->db->insert_id();
        return $idInserido;
    }
	
	public function listaApoiadores($id){
		
		$this->db->select('*');
		$this->db->from('apoiadores as a'); 
		$this->db->join('usuarios as u','a.usuario_id = u.id');
		$this->db->where('a.instituicao_id', $id);
		
		$query = $this->db->get();
		return $query->result();

	}
	
	
	public function deletarApoiador($idApoiador){

		$this->db->delete('apoiadores', array('id_apoiador'=>$idApoiador));

	}
	
	public function editarSalvarApoiador($idApoiador, $arrayApoiador){

		$this->db->update('apoiadores', $arrayApoiador, array('id_apoiador'=>$idApoiador));
		
	}
	
	public function editarApoiador($idApoiador){

		$this->db->select('*');
		$this->db->from('apoiadores as a'); 
		$this->db->join('usuarios as u','a.usuario_id = u.id');
		$this->db->where('a.id_apoiador', $idApoiador);
		
		$query = $this->db->get();
		return $query->result();

	}
	
	public function autenticar($email){

		$this->db->select('*');
		$this->db->from('apoiadores as a'); 
		$this->db->join('usuarios as u','a.usuario_id = u.id');
		//$this->db->join('instituicoes as i','a.instituicao_id = i.id');
		$this->db->where('u.email', $email);
		
		$query = $this->db->get();
		return $query->result();

	}
    
}














