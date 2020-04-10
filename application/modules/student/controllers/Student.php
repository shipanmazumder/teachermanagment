<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		/*
		|=============
		|	module load
		|=============
		*/
		$this->load->module('users');
		$this->load->module('batch');
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
		$this->load->model('student/Student_model');
		$this->load->model('batch/Batch_model');
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
	|	new student page load
	|===========
	*/
	public function add_student($batchid='',$batch_id='')
	{
		$student_id=$this->Student_model->view_all_student_by_batch($batchid);
		if(count($student_id)>0)
		{
			$data['student_id']=@$student_id[0]->student_id+1;
		}
		else 
		{
			$data['student_id']=$batch_id.'01';
		}
		$data['batchid']=$batchid;
		$data['batch_id']=$batch_id;
		$data['main_content']='add_student';
		$this->load->view('page', $data);
	}
	/*
	|==================
	|	validate  and data entry
	|==================
	*/
	public function add_student_data_check($batchid='',$batch_id='')
	{
		$this->form_validation->set_rules('student_id', 'student_id', 'trim|is_unique[student.student_id]');
		$this->form_validation->set_rules('batch_id', 'batch_id', 'trim');
		$this->form_validation->set_rules('student_name', 'Student Name', 'trim|required');
		$this->form_validation->set_rules('student_mobile', 'Student Mobile', 'trim|required|min_length[11]|max_length[15]');
		$this->form_validation->set_rules('education', 'Education', 'trim');
		$this->form_validation->set_rules('class', 'class', 'trim');
		$this->form_validation->set_rules('department', 'department', 'trim');
		$this->form_validation->set_rules('address', 'address', 'trim');
		$this->form_validation->set_rules('blood_group', 'blood_group', 'trim');
		if ($this->form_validation->run() == FALSE) {
			$student_id=$this->Student_model->view_all_student_by_batch($batchid);
			if(count($student_id)>0)
			{
				$data['student_id']=@$student_id[0]->student_id+1;
			}
			else 
			{
				$data['student_id']=$batch_id.'01';
			}
			$data['batchid']=$batchid;
			$data['batch_id']=$batch_id;
			$data['main_content']='add_student';
			$this->load->view('page', $data);
		} else {
			if ($this->Student_model->add_student_data()) {
				$data["success"]		="Successfully Add Student";
				$student_id=$this->Student_model->view_all_student_by_batch($batchid);
				if(count($student_id)>0)
				{
					$data['student_id']=@$student_id[0]->student_id+1;
				}
				else 
				{
					$data['student_id']=$batch_id.'01';
				}
				$data['batchid']=$batchid;
				$data['batch_id']=$batch_id;
				$data['main_content']='add_student';
				$this->load->view('page', $data);
			}
		}
	}
	/*
	|==================
	|	view all students
	|==================
	*/
	public function view_all_running_student($value='')
	{
		$data['main_content']='view_student';
		$data['allstudent']=$this->Student_model->view_all_running_student();
		$this->load->view('page', $data);
	}
	/*
	|==================
	|	view student by id
	|==================
	*/
	public function view_single_student($value='')
	{
		if($this->Student_model->view_single_student($value))
		{
			$data['main_content']	='view_single_student';
			$data['singleview']=$this->Student_model->view_single_student($value);
			$data['student_payment']=$this->Student_model->view_student_payment($value);
			$this->load->view('page', $data);
		}
		else
		{
			redirect('errors/not-found');
		}
	}
	/*
	|==================
	|	 student data by id
	|==================
	*/
	public function edit_student_by_id($value='',$indicator='')
	{
		
		if($this->Student_model->view_single_student($value))
		{
			$data['main_content']	='edit_student';
			$data['indicator']	=$indicator;
			$data['singleview']=$this->Student_model->view_single_student($value);
			$this->load->view('page', $data);
		}
		else
		{
			redirect('errors/not-found');
		}
	}
	/*
	|======================
	|	validate and student  data update by id
	|======================
	*/
	public function edit_student_data_check($studentid='',$batchid='',$indicator='')
	{
		$this->form_validation->set_rules('batch_id', 'batch_id', 'trim');
		$this->form_validation->set_rules('student_name', 'Student Name', 'trim|required');
		$this->form_validation->set_rules('student_mobile', 'Student Mobile', 'trim|required|min_length[11]|max_length[15]');
		$this->form_validation->set_rules('education', 'Education', 'trim');
		$this->form_validation->set_rules('department', 'department', 'trim');
		$this->form_validation->set_rules('class', 'class', 'trim');
		$this->form_validation->set_rules('address', 'address', 'trim');
		$this->form_validation->set_rules('blood_group', 'blood_group', 'trim');
		$this->form_validation->set_rules('activity', 'activity', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$data['main_content']	='edit_student';
			$data['indicator']	=$indicator;
			$data['singleview']=$this->Student_model->view_single_student($studentid);
			$this->load->view('page', $data);
		} else {
			if ($this->Student_model->edit_student_data_check($studentid)) {
				if ($indicator=='batch') 
				{
					$this->batch->batch_details($batchid,'running');
				}
				else 
				{
					redirect('student/view-all-running-student');
				}
			}
			else
			{
				if (isset($this->Student_model->someerror)) {
					$data["errorlogin"]=$this->Student_model->someerror;
				}
				if($this->Student_model->view_single_student($studentid))
				{
					$data['singleview']=$this->Student_model->view_single_student($studentid);
				}
				$data['main_content']	='edit_student';
				$data['indicator']	=$indicator;
				$data['singleview']=$this->Student_model->view_single_student($studentid);
				$this->load->view('page', $data);
			}
		}
	}
	/*
	|======================
	|	delete student by id
	|======================
	*/
	public function delete_student_by_id($studentid='',$batchid='',$indicator='')
	{
		if ($this->Student_model->delete_student_by_id($studentid)) {
			if($indicator=='batch')
			{
				$this->batch->batch_details($batchid,'running');
			}
			elseif ($indicator=='end-batch') 
			{
				$this->batch->batch_details($batchid,'end');
			}
			else 
			{
				redirect('student/view-all-running-student');
			}
		}
	}
}
/* End of file Student.php */
/* Location: ./application/modules/Student/controllers/Student.php */