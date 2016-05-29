<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('mascara_string')){
	function mascara_string($mascara,$string){
		$string =str_replace(" ", "", $string);
		for($i = 0; $i<strlen($string); $i++){
			$mascara[strpos($mascara, "#")] = $string[$i];
		}
		return str_replace("#","",$mascara);
	}
}
?>
