<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batch_model extends CI_Model {
	/*
	|======================
	|	@var error catch
	|======================
	*/
	public $someerror='';
	/*
	|======================
	|	add student data
	|======================
	*/
	public function add_new_batch_data($value='')
	{
		$checkBox = implode(',', $_POST['batch_day']);
		$object=array(
			'batch_id'			=>$this->input->post('batch_id'),
			'start_date'		=>$this->input->post('start_date'),
			'batch_day'			=>$checkBox,
			'batch_time'		=>$this->input->post('batch_time'),
			'batch_user_id'		=>$this->users->getId()

		);
		$insert=$this->db->insert('batch', $object);
		if($insert)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
		
	}
	/*
	|==================
	|	view all   batch
	|==================
	*/
	public function view_all_batch()
	{
		$this->db->select('*');
		$this->db->from('batch');
		$this->db->where('batch_user_id',$this->users->getId());
		$this->db->order_by('batchid', 'desc');
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	view all running  batch
	|==================
	*/
	public function view_all_running_batch()
	{
		$this->db->select('*');
		$this->db->from('batch');
		$this->db->where('batch_status',"Running");
		$this->db->where('batch_user_id',$this->users->getId());
		$this->db->order_by('batchid',"desc");
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	view all end  batch
	|==================
	*/
	public function view_all_end_batch()
	{
		$this->db->select('*');
		$this->db->from('batch');
		$this->db->where('batch_status',"End");
		$this->db->where('batch_user_id',$this->users->getId());
		$this->db->order_by('batchid', 'desc');
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	student count by  batch
	|==================
	*/
	public function student_count_by_batch($batchid,$student_status)
	{
		$this->db->select('student_id,COUNT(studentid) as total_st');
		$this->db->from('student');
		$this->db->where('st_batch_id', $batchid);
		$this->db->where('activity', $student_status);
		$this->db->where('st_user_id',$this->users->getId());
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	batch data by id
	|==================
	*/
	public function batch_data_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('batch');
		$this->db->where('batchid',$id);
		$query=$this->db->get();
		return $query->result();
	}
	/*
	|==================
	|	data update by id
	|==================
	*/
	public function edit_batch_data($value='')
	{
		$batch_status=$this->input->post('batch_status');
		$checkBox = implode(',', $_POST['batch_day']);
		$object=array(
			'start_date'			=>$this->input->post('start_date'),
			'batch_day'		=>$checkBox,
			'batch_time'		=>$this->input->post('batch_time'),
			'batch_status'				=>$this->input->post('batch_status')

		);
		$this->db->update('batch', $object,array('batchid' => $value));
		if($this->db->affected_rows())
		{
				if($batch_status=="End")
				{
					$this->db->update('student', array('activity'=>'Closed'),array('st_batch_id' => $value,'st_user_id' => $this->users->getId()));
				}
			return TRUE;
		}
		else 
		{
			$this->Batch_model->someerror='Same Data Or Something Wrong';
			return FALSE;
		}
	}
	/*
	|==================
	|	delete batch data by id
	|==================
	*/
	public function delete_batch_data($id)
	{

		$this->db->delete('batch',array('batchid'=>$id));
		if($this->db->affected_rows())
		{
			$this->db->delete('student',array('st_batch_id'=>$id));
			$this->db->delete('attendances',array('atten_batch_id'=>$id));
			$this->db->delete('payment',array('payment_batch_id'=>$id));
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

/* End of file Batch_model.php */
/* Location: ./application/modules/batch/models/Batch_model.php */