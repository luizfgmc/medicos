<?php

class ProfissaoModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function getProfissao($apelido = 'prof') {
        $this->db->select("{$apelido}.id_profissao")
                ->from("profissao {$apelido} ");
        return $this;
    }

    public function getInfoProfissao($apelido = 'prof') {
        $this->getProfissao($apelido)
                ->db->select("{$apelido}.nome_profissao");
        $query = $this->db->get();
        return $query->result();
    }

}

?>