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
                ->from("{$apelido} medicos");
        return $this;
    }

    public function listarNomeTodosMedicos($apelido='med') {
        $this->getMedicos()
        ->db->select("{$apelido}.nome");
        return $this;
    }

    public function excluirMedico($idMedico) {
        $this->db->delete('medicos', array('id' => idMedico));
    }

}
