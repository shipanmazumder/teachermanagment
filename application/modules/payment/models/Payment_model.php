<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {
	/*
	|======================
	|	@var error catch
	|======================
	*/
	public $someerror='';
	/*
	|============
	|	monthly payment
	|=============
	*/
	public function monthly_payment_count()
	{
		$today=date("n", strtotime("previous month"));
		$month=date('y').$today;
		$this->db->select('*,SUM(pay) as total_pay');
		$this->db->from('payment');
		$this->db->where('pay_month', $month);
		$this->db->where('pay_user_id',$this->users->getId());
		return $this->db->get()->result();
	}
	/*
	|============
	|	monthly payment
	|=============
	*/
	public function view_all_payment()
	{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->join('student', 'payment.payment_st_id = student.studentid','left');
		$this->db->join('batch', 'payment.payment_batch_id = batch.batchid','left');
		$this->db->where('pay_user_id',$this->users->getId());
		return $this->db->get()->result();
	}
	/*
	|===========
	|	ajax get student id by batch 
	|===========
	*/
	public function get_all_student_id($value='')
	{
		$date=date("y-n", strtotime("previous month"));
		$condition=array(
			'batch_id'=>$value,
			'st_user_id'=>$this->users->getId(),
			'activity'=>'Active'
		);
		$query=$this->db->get_where('student',$condition);
		return $query->result();
	}
	public function search_student($batch_id,$pay_month)
	{
		$data=array();
		$month=date('y').$pay_month;
		$this->db->select('*');
		$this->db->from('student');
		$this->db->where('st_batch_id', $batch_id);
		$this->db->where('st_user_id', $this->users->getId());
		$this->db->where('activity', "Active");
		$result=$this->db->get()->result();
		
		return $result;
	}
	/*
	|===========
	|	ajax get student name
	|===========
	*/
	public function get_student_name($value='')
	{
		$condition=array(
			'studentid'=>$value,
			'st_user_id'=>$this->users->getId()
		);
		$query=$this->db->get_where('student',$condition);
		return $query->result();
	}
	
	public function check_payment($st_id,$pay_month)
	{
		$obj=array(
			'payment_st_id' => $st_id,
			'pay_month' => date('y').$pay_month,
			'pay_user_id' => $this->users->getId(),
		);
		$query=$this->db->get_where('payment',$obj);
		return $query->result();
	}
	
	/*
	|==================
	|	view all payment
	|==================
	*/
	public function view_student_payment($batchid='',$pay_month='')
	{
		$st_pay_date=date('y').$pay_month;
		$this->db->select('*');
		$this->db->from('payment');
		//$this->db->join('student', 'payment.payment_st_id = student.studentid','left');
		$this->db->join('batch', 'payment.payment_batch_id = batch.batchid','left');
		$this->db->where('payment.payment_batch_id', $batchid);
		$this->db->where('payment.pay_month', $st_pay_date);
		$this->db->where('payment.pay_user_id', $this->users->getId());
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	view total payment
	|==================
	*/
	public function view_total_payment($pay_month='')
	{
		$st_pay_date=date('y').$pay_month;
		$this->db->select('*,SUM(pay) as total_payment');
		$this->db->from('payment');
		$this->db->where('pay_month', $st_pay_date);
		$this->db->where('pay_user_id', $this->users->getId());
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	payment data by id
	|==================
	*/
	public function payment_data_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->join('student', 'payment.student_id = student.studentid','left');
		$this->db->join('course', 'payment.course_id = course.courseid','left');
		$this->db->join('batch', 'payment.batch_id = batch.batchid','right');
		$this->db->where('payment.paymentid',$id);
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	delete payment data by id
	|==================
	*/
	public function delete_payment_data($id)
	{
		$this->db->delete('payment',array('paymentid'=>$id));
		if($this->db->affected_rows())
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

/* End of file Payment_model.php */
/* Location: ./application/modules/Payment/models/Payment_model.php */