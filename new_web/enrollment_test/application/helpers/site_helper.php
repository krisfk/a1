<?php

    /**

     * @file Global Helper Functions

     * 

     */

	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	

	if(!function_exists('current_full_url'))

	{

		function current_full_url()

		{

		//	$CI =& get_instance();

			$url = current_url();

		//	$url = $CI->config->site_url($CI->uri->uri_string());

			return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;

		}

	}

	

	

	if(!function_exists('dump'))

	{

		function dump($msg)

		{

			echo '<pre>';

			var_dump($msg);

			echo '</pre>';

		}

	}

	

	if(!function_exists('js_redirect'))

	{

		function js_redirect($url){

			echo "<script type='text/javascript'>

				window.onload = function () { top.location.href = '" . site_url($url) . "'; };

				</script>";

		}

	}

?>