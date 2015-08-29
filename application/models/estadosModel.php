<?php

class EstadosModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function getEspecialidade($apelido = 'uf') {
        $this->db->select("{$apelido}.id")
                ->from("estados {$apelido} ");
        return $this;
    }

    public function getInfoEstados($apelido = 'uf') {
        $this->getEspecialidade($apelido)
                ->db->select("{$apelido}.uf");
        $query = $this->db->get();
        return $query->result();
    }

}

?>