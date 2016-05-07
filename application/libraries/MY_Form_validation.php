<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

	protected $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
    }

    /**
    * MY_Form_validation::alpha_extra().
    * Alpha-numeric with periods, underscores, spaces and dashes.
    */
    public function alpha_extra($str) {
        $this->CI->form_validation->set_message('alpha_extra', "<div class='erroSolicitacao'>O %s deve conter somente caracteres alfanúmericos, espaços, pontos, underscores & dashes.");
        return ( ! preg_match("/^([\.\s-a-z0-9_-])+$/i", $str)) ? FALSE : TRUE;
    }

    
    /*
	Metodo para validação de CPF
    */

    public function valida_cpf($cpf)
    {
        $this->CI->form_validation->set_message('valida_cpf',"<div class='erroSolicitacao'>O %s informado não é válido.</div>");
        $cpf = preg_replace('/[^0-9]/','',$cpf);
        if(strlen($cpf) != 11 || preg_match('/^([0-9])\1+$/', $cpf))
        {
            return false;
        }
        // 9 primeiros digitos do cpf
        $digit = substr($cpf, 0, 9);
        // calculo dos 2 digitos verificadores
        for($j=10; $j <= 11; $j++)
        {
            $sum = 0;
            for($i=0; $i< $j-1; $i++)
            {
                $sum += ($j-$i) * ((int) $digit[$i]);
            }
            $summod11 = $sum % 11;
            $digit[$j-1] = $summod11 < 2 ? 0 : 11 - $summod11;
        }
        
        return $digit[9] == ((int)$cpf[9]) && $digit[10] == ((int)$cpf[10]);
    }

    
    /*
    Metodo para validação de CNPJ
    */
    public function valida_cnpj($cnpj){
    	$soma = 0;
    	$digito = 0;
    	$valido = false;
    	$this->CI->form_validation->set_message('valida_cnpj', "<div class='erroSolicitacao'>O %s informado não é válido.</div>");

    	$cnpj = preg_replace('/[^0-9]/', '', $cnpj);

    	$cnpj_calculado = substr($cnpj, 0, 12);

    	echo $cnpj_calculado;

    	function retornaDigito($cnpj){
    		$soma = 0;
    		$contador = 0;
    		$digito = -1;

    		if (strlen($cnpj) == 12){
    			$contador = 5;
    		}
    		elseif (strlen($cnpj) == 13){
    			$contador = 6;
    		}
    		else{
    			return $digito;
    		}

    		for ($i=0; $i < strlen($cnpj); $i++) { 
    			$soma += $cnpj[$i] * $contador;

    			$contador--;

    			if($contador < 2){
    				$contador = 9;
    			}
    		}

    		//O digito é igual ao resto da divisão menos 11 quando maior ou igual a 2
    		//Caso contrario é igual a 0    		
    		$digito = (($soma % 11) < 2) ? 0 : 11 - ($soma % 11);

    		return $digito;
    	}

    	//Calcula o primeiro digito verificador e anexa ao CNPJ
    	$digito = retornaDigito($cnpj_calculado);
    	echo $digito;
    	if ($digito >= 0 && $digito <= 9) {
    		$cnpj_calculado = $cnpj_calculado . $digito;
    	}
    	else{
    		return $valido;
    	}

    	//Calcula segundo digito veirificador e anexa ao CNPJ
    	echo $cnpj_calculado;
    	$digito = retornaDigito($cnpj_calculado);
    	echo $digito;
    	if ($digito >= 0 && $digito <= 9) {
    		$cnpj_calculado = $cnpj_calculado . $digito;
    	}
    	else{
    		return $valido;
    	}

    	if ($cnpj == $cnpj_calculado) {
    		$valido = true;
    	}

    	return $valido;

    }

    // add more function to apply custom rules.
}