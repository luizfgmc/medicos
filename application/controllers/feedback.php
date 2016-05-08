<?php

class Feedback extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->logininstituicao->valida_sessao_instituicao();
    }


    // Função que mostra o formulário que a instituição preenche com o feedback do solicitação já efetuada pelo medico
    // @$id_solicitacao -> int id da solicitação que o cliente foi atendido
    function inserir_feedback($id_solicitacao)
    {
        $dados=array('id_solicitacao'=>$id_solicitacao);
        $this->load->view('layout/header');
        $this->load->view('insere_feedback_ranking',$dados);
        $this->load->view('layout/footer');

    }

    function salva_feedback()
    {
        $data_post= $_POST;
        $dados_feedback = array(
            "ranking" => $data_post['ranking'],
            "id_solicitacao" => $data_post['id_solicitacao'],
        );
        $this->load->model('feedbacksolicitacaoModel','fsm');
        if($this->fsm->getFeedbackBySolicitacao($data_post['id_solicitacao'])<1) {
            $this->fsm->insereFeedback($dados_feedback);
        }
        else{
            echo 'Já existe feedback para essa consulta';
        }
    }


}


?>