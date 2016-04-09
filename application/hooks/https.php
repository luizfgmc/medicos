<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
function trigger_https()
{
	// do nothing for these urls
	$exclude_url_list = array();
	//$exclude_url_list[] = '/(.*)js$/';
	foreach ($exclude_url_list as $exclude_url) {
		if(preg_match($exclude_url, uri_string()))
		{
			return;
		}
	}
 
	//switch to HTTPS for these urls
	$ssl_url_list = array();
	
//	$ssl_url_list[] = '/(.*)home(.*)$/';
//	$ssl_url_list[] = '/(.*)acesso(.*)$/';
//	$ssl_url_list[] = '/(.*)clinica(.*)$/';
//	$ssl_url_list[] = '/(.*)medico(.*)$/';
//	$ssl_url_list[] = '/(.*)agenda(.*)$/';
//	$ssl_url_list[] = '/(.*)cadastroMedico(.*)$/';
//	$ssl_url_list[] = '/(.*)paciente(.*)$/';
//	$ssl_url_list[] = '/(.*)soliciticao(.*)$/';
//	$ssl_url_list[] = '/(.*)adm(.*)$/';
//	$ssl_url_list[] = '/(.*)instituicao(.*)$/';
//	$ssl_url_list[] = '/(.*)webservice(.*)$/';
//	$ssl_url_list[] = '/(.*)soap(.*)$/';



 
	foreach ($ssl_url_list as $ssl_url) {
		if(preg_match($ssl_url, uri_string()))
		{
			force_ssl();
			return;
		}
	}
 
	// still here? switch to HTTP (if necessary)
	remove_ssl();
}
 
/* End of file https.php */
/* Location: ./system/application/hooks/https.php */