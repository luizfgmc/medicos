<?php
class UsuarioModel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }

    public function insereUsuario($dadosUsuario) {
        $this->db->insert('usuarios', $dadosUsuario);
        $idInserido = $this->db->insert_id();
        return $idInserido;
    }
    
    public function excluirUsuario($idUsuario) {        
        $this->db->delete('usuarios', array('id' => $idUsuario));
    }

    public function autenticar($email){
                
       $query = $this->db->get_where('Usuarios', array('email'=>$email));
  
       return $query->result();

    }
}

?>