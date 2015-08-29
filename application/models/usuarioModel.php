
<?php
	class UsuarioModel
	{

		public function insereUsuario($dadosUsuario)
		{
			$this->db->insert('usuarios', $dadosUsuario); 
			$idInserido=$this->db->insert_id();
			return $idInserido;
			
		}
	
	}
	
?>