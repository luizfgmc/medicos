<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

	protected $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->CI->load->helper(array('validaCnpj','validaCpf'));
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
		$cpfValido = false;

		$this->CI->form_validation->set_message('valida_cpf',"<div class='erroSolicitacao'>O %s informado não é válido.</div>");

        $cpfValido = validaCpf($cpf);

        return $cpfValido;
    }


    /*
    Metodo para validação de CNPJ
    */

    public function valida_cnpj($cnpj)
    {

        $cnpjValido = null;

        $this->CI->form_validation->set_message('valida_cnpj', "<div class='erroSolicitacao'>O %s informado não é válido.</div>");

        $cnpjValido = validaCnpj($cnpj);

        return $cnpjValido;

    }

// add more function to apply custom rules.
}