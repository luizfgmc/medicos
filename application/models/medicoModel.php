<?php

class MedicoModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    
    public function autenticar($email){
        
       $query = $this->db->get_where('Usuarios', array('email'=>$email));
       return $query->result();


    }

     public function buscarIdMedico($id){

        $this->db->select('id');
        $this->db->from('medicos');
        $this->db->where('usuario_id',$id);
        $query = $this->db->get();
        return $query->result();

    }


    public function insereMedico($dadosMedico) {
        $this->db->insert('medicos', $dadosMedico);
    }
    
    public function editarMedico($dadosMedico,$idMedico) {
        $this->db->where('id', $idMedico);
        $this->db->update('medicos', $dadosMedico);
    }

    public function getMedicos($apelido='med') {
        $this->db->select("{$apelido}.id")
                ->from("medicos {$apelido}");
        return $this;
    }
    
    public function getTodasInfoMedicos($idMedico,$apelido='med'){
        $this->getMedicos()
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

}
