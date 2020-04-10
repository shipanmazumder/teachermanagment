<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		/*
		|=============
		|	module load
		|=============
		*/
		$this->load->module('users');
		$this->load->module('student');
		$this->load->module('batch');
		$this->load->module('payment');
		/*
		|=============
		|	model load
		|=============
		*/
		$this->load->model('student/Student_model');
		$this->load->model('batch/Batch_model');
		$this->load->model('payment/Payment_model');
		
	}
	public function index()
	{
		/*=============redirect ==============*/
		$this->users->_member_area();
		
		$data['main_content']='dashboard_page';
		$data['total_batch']=$this->Batch_model->view_all_running_batch();
		$data['total_student']=$this->Student_model->view_all_running_student();
		$data['total_payment']=$this->Payment_model->monthly_payment_count();
		
		$this->load->view('page', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/modules/Dashboard/controllers/Dashboard.php */