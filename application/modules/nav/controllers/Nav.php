<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nav extends MY_Controller {

	 function __construct()
	{
		parent::__construct();
		/*
		|=============
		|	model load
		|=============
		*/
		$this->load->module("users");
		/*
		|=============
		|	model load
		|=============
		*/
	}
	/*
	|====================
	|	default load
	|====================
	*/
	public function index()
	{
		$this->load->view('nav_page');
	}

}

/* End of file Nav.php */
/* Location: ./application/modules/Nav/controllers/Nav.php */