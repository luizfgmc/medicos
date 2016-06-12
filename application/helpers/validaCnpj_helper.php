<?php
/**
 * Created by PhpStorm.
 * User: diogo
 * Date: 12/06/2016
 * Time: 12:17
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('validaCnpj'))
{

    //Efetua a validação matematica do digito verificador do CNPJ
    function validaCnpj($cnpj)
    {
        $cnpjValido = false;
        $tamanhoCnpjValido = 14;
        $primeiroDigitoVerificador = null;
        $segundoDigitoVerificador = null;

        $cnpj = preg_replace('/[^0-9]/', '', (string)$cnpj);

        // Valida tamanho
        if (strlen($cnpj) == $tamanhoCnpjValido) {

            $primeiroDigitoVerificador = $this->calculaDigitoVerificadorCnpj(substr($cnpj,1,12));
            $segundoDigitoVerificador = $this->calculaDigitoVerificadorCnpj(substr($cnpj,1,13));

            if ($cnpj{12} == $primeiroDigitoVerificador && $cnpj{13} == $segundoDigitoVerificador){
                $cnpjValido = true;
            }
            return $cnpjValido;
        }
    }

    //Efetua o calculo dos digitos verificador do cnpj
    function calculaDigitoVerificadorCnpj($cnpj){

        $fatorMultiplicacao = strlen($cnpj == 12 ? 5 : 6);

        // Valida primeiro dígito verificador
        for ($i = 0, $j = $fatorMultiplicacao, $soma = 0; $i < strlen($cnpj); $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;

        $digito = $resto < 2 ? 0 : 11 - $resto;

        return $digito;
    }

}