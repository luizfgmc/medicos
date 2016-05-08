<?php

class FeedbackSolicitacaoModel extends CI_Model{

    function __construct(){

        parent::__construct();
        $this->load->database();

    }

    public function getFeedbackBySolicitacao($id,$apelido="feed")
    {
        $this->db->select("{$apelido}.id_feedback")
        ->from("feedback_solicitacao {$apelido}")
        ->where("id_solicitacao",$id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function insereFeedback($dadosFeedback) {
        $this->db->insert('feedback_solicitacao', $dadosFeedback);
    }

}