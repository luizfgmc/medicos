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

   public function getProfissional($apelido='prof') {
        // Retornar todas as informações de todos os profissional.
        // Como profissional também é usuario então retorna informações de usuario inner join profissional
        $this->db->select("{$apelido}.id_profissional")
            ->from("profissionais {$apelido}")
            ->join("usuarios", "{$apelido}.usuario_id = usuarios.id");
        
        return $this;
    }


    public function getTodasInfoProfissional($idProfissional,$apelido='prof'){
        $this->getProfissional($apelido)
            ->db->select("{$apelido}.*")
            ->where("{$apelido}.id_profissional",$idProfissional);
        $query = $this->db->get();
        return $query->row();            
    }


    public function editarProfissional($dadosProfissional,$idProfissional) {
        $this->db->where('id_profissional', $idProfissional);
        $this->db->update('profissionais', $dadosProfissional);
    }

    

}





