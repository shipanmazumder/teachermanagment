<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	/*
	|======================
	|	@var error catch
	|======================
	*/

	public $someerror='';

	/*
	|======================
	|	total student count  for dashboard
	|======================
	*/
	public function total_student($value='')
	{
		 
		return $this->db->count_all('student');
	}
	/*
	|==================
	|	add  student  data
	|==================
	*/
	public function add_student_data()
	{
		$object=array(
			'student_id'	=> $this->input->post('student_id'),
			'st_batch_id'	=> $this->input->post('batch_id'),
			'student_name'	=> $this->input->post('student_name'),
			'student_mobile'	=> $this->input->post('student_mobile'),
			'education'	=> $this->input->post('education'),
			'department'	=> $this->input->post('department'),
			'class'	=> $this->input->post('class'),
			'address'	=> $this->input->post('address'),
			'blood_group'	=> $this->input->post('blood_group'),
			'st_user_id'	=> $this->users->getId()
		);
		$obj=array(
			'student_id'	=>$this->input->post('student_id'),
			'st_user_id'	=> $this->users->getId()
		);
		$result=$this->db->get_where('student', $obj);
		if($result->num_rows()>=1)
		{
			$this->someerror="Student Id Exits";
		}
		else {
		
			$insert=$this->db->insert('student', $object);
			if($insert)
			{
				return TRUE;
			}
			else 
			{
				return FALSE;	
			}
		}
		
	}
	/*
	|==================
	|	view all students
	|==================
	*/
	public function view_all_running_student()
	{
		$this->db->select('*');
		$this->db->from('batch');
		$this->db->join('student', 'batch.batchid=student.st_batch_id', 'left');
		$this->db->order_by('student.studentid', 'desc');
		$this->db->where('student.activity', 'Active');
		$this->db->where('student.st_user_id', $this->users->getId());
		$query=$this->db->get();
		return $query->result();
	}
	
	/*
	|==================
	|	view all students by batch
	|==================
	*/
	public function view_all_student_by_batch($value)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('st_batch_id', $value);
		$this->db->order_by('studentid', 'desc');
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	view all runing students by batch
	|==================
	*/
	public function view_all_runing_student_by_batch($value)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('st_batch_id', $value);
		$this->db->where('activity', "Active");
		$this->db->order_by('studentid', 'desc');
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	view student by id
	|==================
	*/
	public function view_single_student($id)
	{
		$this->db->select('*');
		$this->db->from('student');
		$this->db->join('batch', 'student.st_batch_id = batch.batchid','left');
		$this->db->where('student.studentid',$id);
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	view student by id
	|==================
	*/
	public function view_student_payment($id)
	{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('payment_st_id',$id);
		$this->db->where('pay_user_id', $this->users->getId());
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|======================
	|	validate and student  data update by id
	|======================
	*/
	public function edit_student_data_check($value='')
	{
		$object=array(
			'st_batch_id'	=> $this->input->post('batch_id'),
			'student_name'	=> $this->input->post('student_name'),
			'student_mobile'	=> $this->input->post('student_mobile'),
			'education'	=> $this->input->post('education'),
			'department'	=> $this->input->post('department'),
			'class'	=> $this->input->post('class'),
			'address'	=> $this->input->post('address'),
			'blood_group'	=> $this->input->post('blood_group'),
			'activity'	=> $this->input->post('activity'),
		);
		$this->db->update('student', $object,array('studentid'=>$value));
		if($this->db->affected_rows())
		{
			return TRUE;
		}
		else
		{
			$this->someerror="Same Data OR Something Wrong!";
			return FALSE;
		}
	}
	/*
	|======================
	|	delete student by id
	|======================
	*/
	public function delete_student_by_id($value='')
	{
		$this->db->delete('student',array('studentid'=>$value));
		if($this->db->affected_rows())
		{
			@$this->db->delete('payment',array('payment_st_id'=>$value));
			@$this->db->delete('attendances',array('atten_student_id'=>$value));
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}

/* End of file Student_model.php */
/* Location: ./application/modules/Student/models/Student_model.php */