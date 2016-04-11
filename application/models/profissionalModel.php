<?php

class ProfissionalModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }


    public function insereProfissional($dadosProfissional) {
        $this->db->insert('profissionais', $dadosProfissional);
		$idInserido = $this->db->insert_id();
        return $idInserido;
    }

    public function buscarIdProfissional($id){

        $this->db->select('id_profissional,nome_profissional');
        $this->db->from('profissionais');
        $this->db->where('usuario_id',$id);
        $query = $this->db->get();
        return $query->result();

    }

    

}





