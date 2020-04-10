<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	if ( ! function_exists('formatdate'))
	{
	    function formatdate($var = '')
	    {

	        return date('d-M-y',strtotime($var));
	    }   
	}
	if ( ! function_exists('formattime'))
	{
	    function formattime($var = '')
	    {

	        return date('g:i A',strtotime($var));
	    }   
	}
?>