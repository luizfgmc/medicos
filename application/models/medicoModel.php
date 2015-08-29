<?php

class MedicoModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function insereMedico($dadosMedico) {
        $this->db->insert('medicos', $dadosMedico);
    }

    public function getMedicos($apelido='med') {
        $this->db->select("{$apelido}.id")
                ->from("medicos {$apelido}");
        return $this;
    }

    public function listarNomeTodosMedicos($apelido='med') {
        $this->getMedicos()
        ->db->select("{$apelido}.nome,{$apelido}.usuario_id");
        $query = $this->db->get();
        return $query->result();        
    }

    public function excluirMedico($idMedico) {
        
        $this->db->delete('medicos', array('id' => $idMedico));
    }

}
