<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends MY_Controller {

	public function index()
	{
		$this->load->view('error_page');
	}

}

/* End of file Error.php */
/* Location: ./application/modules/Error/controllers/Error.php */