<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		/*
		|=============
		|	module load
		|=============
		*/
		$this->load->module('users');
		$this->load->module('student');
		/*
		|===========
		|	check login && redirect
		|===========
		*/
		$this->users->_member_area();
		/*
		|=============
		|	model load
		|=============
		*/
		$this->load->model('Batch_model');
		$this->load->model('student/Student_model');
	}
	/*
	|====================
	|	default load
	|====================
	*/
	public function index()
	{
		redirect('dashboard','refresh');
	}
	/*
	|===========
	|	new batch page load
	|===========
	*/
	public function add_batch()
	{
		$batch_id=$this->Batch_model->view_all_batch();
		$date= date('y');
		if($date==substr(@$batch_id[0]->batch_id,0,2))
		{
			$data['batch_id']=@$batch_id[0]->batch_id+1;
		}
		else
		{
			$data['batch_id']=$date.'01';
		}
		$data['main_content']='add_batch';
		$this->load->view('page', $data);
	}
	/*
	|==================
	|	validate  and data entry
	|==================
	*/
	public function add_new_batch()
	{
		$this->form_validation->set_rules('batch_id', 'Batch Id', 'trim');
		$this->form_validation->set_rules('start_date', 'start_date', 'trim');
		$this->form_validation->set_rules('batch_day', 'Batch Day', 'trim');
		$this->form_validation->set_rules('batch_time', 'batch_time', 'trim');

		if ($this->form_validation->run() ==FALSE)
		{
			$data['main_content']='add_batch';
			$this->load->view('page', $data);
		}
		else
		{
			if ($this->Batch_model->add_new_batch_data()) {
				redirect('batch/view-runnig-batch-list','refresh');
			}
		}
	}
	/*
	|==================
	|	view all running batch
	|==================
	*/
	public function view_all_running_batch()
	{
		$data['main_content']='view_running_batch';
		$data['view_all_running_batch']=$this->Batch_model->view_all_running_batch();
		$result=$this->Batch_model->view_all_running_batch();
		$total_student=array();
		if(isset($result))
		{
			$i=0;
			foreach ($result as $value) {
				$temp=$this->Batch_model->student_count_by_batch($value->batchid,"Active");
				$total_student[]=$temp[$i]->total_st;
			}
		}
		$data['student_count_by_batch']=$total_student;
		$this->load->view('page', $data);
	}
	/*
	|==================
	|	view all running batch
	|==================
	*/
	public function view_all_end_batch()
	{
		$data['main_content']='view_end_batch';
		$data['view_all_end_batch']=$this->Batch_model->view_all_end_batch();
		$result=$this->Batch_model->view_all_end_batch();
		$total_student=array();
		if(isset($result))
		{
			$i=0;
			foreach ($result as $value) {
				$temp=$this->Batch_model->student_count_by_batch($value->batchid,"Closed");
				$total_student[]=$temp[$i]->total_st;
			}
		}
		$data['student_count_by_batch']=$total_student;
		$this->load->view('page', $data);
	}
	/*
	|==================
	|	batch details by id
	|==================
	*/
	public function batch_details($value='',$indicator)
	{
		if($this->Batch_model->batch_data_by_id($value))
		{
			$data['main_content']='batch_details';
			$data['indicator']=$indicator;
			$data['batchtdata']=$this->Batch_model->batch_data_by_id($value);
			$data['all_student_by_batch']=$this->Student_model->view_all_student_by_batch($value);
			$this->load->view('page', $data);
		}
		else 
		{
			redirect('errors/not-found');
		}
	}
	/*
	|==================
	|	batch data by id
	|==================
	*/
	public function batch_data_by_id($value='')
	{
		if($this->Batch_model->batch_data_by_id($value))
		{
			$data['main_content']='edit_batch';
			$data['batchtdata']=$this->Batch_model->batch_data_by_id($value);
			$this->load->view('page', $data);
		}
		else 
		{
			redirect('errors/not-found');
		}
	}
	/*
	|==================
	|	validate  and data update by id
	|==================
	*/
	public function edit_batch_data($value='')
	{
		$this->form_validation->set_rules('start_date', 'start_date', 'trim');
		$this->form_validation->set_rules('batch_day', 'batch_day', 'trim');
		$this->form_validation->set_rules('batch_time', 'batch_time', 'trim');
		$this->form_validation->set_rules('batch_status', 'batch_status', 'trim');

		if ($this->form_validation->run() ==FALSE)
		{
			$data['main_content']='edit_batch';
			$data['batchtdata']=$this->Batch_model->batch_data_by_id($value);
			$this->load->view('page', $data);
		}
		else
		{
			if ($this->Batch_model->edit_batch_data($value)) {
				redirect('batch/view-runnig-batch-list','refresh');
			}
			else {
				if (isset($this->Batch_model->someerror)) {
					$data["errorlogin"]=$this->Batch_model->someerror;
				}
				if($this->Batch_model->batch_data_by_id($value))
				{
					$data['batchtdata']=$this->Batch_model->batch_data_by_id($value);
				}
				$data['main_content']='edit_batch';
				$this->load->view('page', $data);
			}
		}
	}
	/*
	|==================
	|	delete batch data by id
	|==================
	*/
	public function delete_batch_data($id='')
	{

		if ($this->Batch_model->delete_batch_data($id)) {
			redirect('batch/view-end-batch-list');
		}
	}
}

/* End of file batch.php */
/* Location: ./application/modules/batch/controllers/batch.php */