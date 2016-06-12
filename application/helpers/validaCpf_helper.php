<?php
/**
 * Created by PhpStorm.
 * User: diogo
 * Date: 12/06/2016
 * Time: 13:34
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('validaCpf')) {

    //Efetua a validação matematica do digito verificador do CNPJ
    function validaCpf($cpf)
    {
        $cpfValido = false;

        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        if (strlen($cpf) == 11 || !preg_match('/^([0-9])\1+$/', $cpf)) {
            // 10 primeiros digitos do cpf
            $digit = substr($cpf, 0, 9);
            // Calculo dos 2 digitos verificadores
            for ($j = 10; $j <= 11; $j++) {
                $sum = 0;
                for ($i = 0; $i < $j - 1; $i++) {
                    $sum += ($j - $i) * ((int)$digit[$i]);
                }
                $summod11 = $sum % 11;
                $digit[$j - 1] = $summod11 < 2 ? 0 : 11 - $summod11;
            }

            $cpfValido = $digit[9] == ((int)$cpf[9]) && $digit[10] == ((int)$cpf[10]);
        }

        return $cpfValido;
    }
}