<?php

class cepModel extends CI_Model{

	function __construct(){

		parent::__construct();
		$this->load->database();

	}

	function validarFormatoCep($cep) {
		
		// retirar espacos em branco dos lados (caso tenha)
		$cep = trim($cep);
		
		// Executar expressao regular para avaliar o cep
		$avaliaCep = ereg("^[0-9]{5}-[0-9]{3}$", $cep);
		
		// verificar o resultado
		if($avaliaCep != true) {            
			
			return false;
		
		} else {
		
			return true;
		
		}
		
	}

}