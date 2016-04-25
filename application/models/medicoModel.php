<?php

class MedicoModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
	
	public function top10() {
		
		$dataHoje = date("Y-m-d");
		$dataAntes = date('Y-m-d', strtotime('-7 days', strtotime($dataHoje)));
					
		$this->db->select('medicos.nome');
		$this->db->select_sum('agendas.quantidade - agendas.saldo', 'total');
		$this->db->from('agendas');
		$this->db->join('medicos', 'medicos.id = agendas.medico_id');
		$this->db->order_by('total desc');
		$this->db->group_by('medicos.nome');
		$this->db->limit(10);
		$this->db->where('agendas.data_emissao >=', $dataAntes);
        return $this->db->get()->result_array();
	}

     public function buscarIdMedico($id){

        $this->db->select('id,nome_medico');
        $this->db->from('medicos');
        $this->db->where('usuario_id',$id);
        $query = $this->db->get();
        return $query->result();

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
	
	public function gerarHash ($idMedico, $email="") {
		
		// Obter data para gerar chave unica
		$data = date("d/m/Y-H:i:s");			
		
		// Obter email do médico para gerar chave unica
		if ($email == "") {
			$email = $this->getTodasInfoMedicos($idMedico)->email;
		}
		
		// Gerar chave Hash a partir da classe encrypt do framework CodeIgniter
		$this->load->library('encrypt');
		$chave = $this->encrypt->encode($email . $data);
		$chave = sha1($chave);
		
		// Registrar chave no banco.
		// Tem que acontecer nessa classe para garantir que não irá retornar uma chave diferente do banco
		$dadosEditarMedico = array('chave_consulta' => $chave);
		$this->editarMedico($dadosEditarMedico, $idMedico);
		
		// Retornar chave igual a do banco
		return $chave;
		
	}
	
	public function obterIdMedico($usuario, $apelido='med') {
		
		$this->getMedicos($apelido);
		$this->db->select("{$apelido}.id");
		$this->db->where("usuarios.email",$usuario);
			
        $query = $this->db->get();
        return $query->row()->id;
		
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
        $this->db->select("AVG({$apelidoFeedback}.ranking) as ranking")
        ->from("medicos {$apelidoMedico}")
        ->join("agendas {$apelidoAgenda}","{$apelidoAgenda}.medico_id = {$apelidoMedico}.id ")
        ->join("solicitacoes {$apelidoSolicitacao}", "{$apelidoSolicitacao}.agenda_id = {$apelidoAgenda}.id")
        ->join("feedback_solicitacao {$apelidoFeedback}","{$apelidoFeedback}.id_solicitacao = {$apelidoSolicitacao}.id")
        ->where("{$apelidoMedico}.id",$id_medico);
        $query = $this->db->get();
        return $query->row();
    }

}






