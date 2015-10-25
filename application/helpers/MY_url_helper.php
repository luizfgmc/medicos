<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('force_ssl'))
{
    function force_ssl()
    {
		$CI =& get_instance();
        if ( ! $CI->input->server('HTTPS'))
        {
			$CI->config->config['base_url'] = $CI->config->config['base_url_absolute_ssl'];
			redirect($CI->uri->uri_string());
        }
    }
}
 
if ( ! function_exists('remove_ssl'))
{
	function remove_ssl()
	{
		$CI =& get_instance();
        if ($CI->input->server('HTTPS'))
		{
			$CI =& get_instance();
			$CI->config->config['base_url'] = $CI->config->config['base_url_absolute'];
			redirect($CI->uri->uri_string());
        }
	}
}
?>