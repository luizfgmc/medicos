<?php

class MedicoModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
	
	public function insereMedico($dadosMedico) {
        $this->db->insert('medicos', $dadosMedico);
		$idInserido = $this->db->insert_id();
        return $idInserido;
    }
    
    public function editarMedico($dadosMedico,$idMedico) {
        $this->db->where('id', $idMedico);
        $this->db->update('medicos', $dadosMedico);
    }

    public function getMedicos($apelido='med') {
        // Retornar todas as informações de todos os médicos.
		// Como médico também é usuario então retorna informações de usuario inner join medico
        $this->db->select("*")
			->from("medicos {$apelido}")
			->join("usuarios", "{$apelido}.usuario_id = usuarios.id");
        
		return $this;
    }

    public function getTodasInfoMedicos($idMedico,$apelido='med'){
        $this->getMedicos($apelido)
			->db->select("{$apelido}.*")
			->where("{$apelido}.id",$idMedico);
        $query = $this->db->get();
        return $query->row();
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
	
	public function obterIdMedico($usuario, $apelido='med') {
		
		$this->getMedicos($apelido);
		$this->db->select("{$apelido}.id");
		$this->db->where("usuarios.email",$usuario);
			
        $query = $this->db->get();
        return $query->row()->id;
		
	}
	
	public function autenticar($email){
       
       $query = $this->db->get_where('Usuarios', array('email'=>$email));
  
       return $query->result();

    }
	
	public function autenticarCpf($cpf){
                
       $query = $this->db->get_where('Medicos', array('cpf'=>$cpf));
  
       return $query->result();

    }

    public function getDisponibilidadeMedico($dataAgendamento,$horaAgendamento,$apelido='med',$apelidoSolicitacao='sol',$apelidoAgenda='agenda')
    {
        $arrayLoginMedoc = $this->session->userdata('medico');
        $arrayLoginMedoc['id_medico'];
        $this->db->select("{$apelido}.id")
            ->from("medicos {$apelido}")
            ->join("agendas {$apelidoAgenda}","{$apelidoAgenda}.medico_id = {$apelido}.id")
            ->join("solicitacoes {$apelidoSolicitacao}","{$apelidoSolicitacao}.agenda_id = {$apelidoAgenda}.id")
            ->where("{$apelido}.id",$arrayLoginMedoc['id_medico'])
            ->where("{$apelidoSolicitacao}.data_agendamento",$dataAgendamento)
            ->where("{$apelidoSolicitacao}.hora_agendamento",$horaAgendamento);
        $query = $this->db->get();
        return $query->num_rows();

    }

    public function getRankMedico($id_medico,$apelidoMedico="med",$apelidoSolicitacao="sol",$apelidoFeedback="feed",$apelidoAgenda="age")
    {
        $this->db->select("SUM({$apelidoFeedback}.ranking) as ranking")
        ->from("medicos {$apelidoMedico}")
        ->join("agendas {$apelidoAgenda}","{$apelidoAgenda}.medico_id = {$apelidoMedico}.id ")
        ->join("solicitacoes {$apelidoSolicitacao}", "{$apelidoSolicitacao}.agenda_id = {$apelidoAgenda}.id")
        ->join("feedback_solicitacao {$apelidoFeedback}","{$apelidoFeedback}.id_solicitacao = {$apelidoSolicitacao}.id")
        ->where("{$apelidoMedico}.id",$id_medico);
        $query = $this->db->get();
        return $query->row();
    }

}






