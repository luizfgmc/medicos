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
        
		if ($data_post['ranking'] < 3 && strlen($data_post['observacao']) == 0) {
			echo("Percebemos que houve um problema nesse atendimento. Para garantir sempre um sistema melhor para todos, precisamos que comente o que aconteceu para que possamos evitar em consultas futuras.");
			exit();
		}
		
		$dados_feedback = array(
            "ranking" => $data_post['ranking'],
            "id_solicitacao" => $data_post['id_solicitacao'],
            "observacao" => $data_post['observacao'],
            );
        $this->load->model('feedbacksolicitacaoModel','fsm');
        if($this->fsm->getFeedbackBySolicitacao($data_post['id_solicitacao'])<1) {
            $this->fsm->insereFeedback($dados_feedback);
            redirect('instituicao');
        }
        else{
            echo 'Já existe feedback para essa consulta';
        }
    }
}
?>