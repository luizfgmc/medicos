<?php

class EspecialidadesModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function getEspecialidade($apelido = 'espc') {
        $this->db->select("{$apelido}.id")
                ->from("especialidades {$apelido} ");
        return $this;
    }

    public function getInfoEspecialidade($apelido = 'espc') {
        $this->getEspecialidade($apelido)
                ->db->select("{$apelido}.descricao");
        $query = $this->db->get();
        return $query->result();
    }

}

?>