<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends CI_Model {
	/*
	|======================
	|	@var error catch
	|======================
	*/
    public $someerror='';
    
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
		$query=$this->db->get();
		return $query->result();
    }
    /*
	|==================
	|	search student
	|==================
	*/
    public function search_student($batchid)
    {
        $object=array(
            'st_batch_id'=>$batchid,
            'activity'=>'Active',
            'st_user_id' =>$this->users->getId()
        );
       $query=$this->db->get_where('student',$object);
       return $query->result();
    }
    /*
	|==================
	|	check attendance
	|==================
	*/
    public function check_attendance($batchid,$studentid)
    {
        $m=date('m');
        $y=date('y');
        $this->db->select('*');
        $this->db->from('attendances');
        $this->db->where('atten_batch_id', $batchid);
        $this->db->where('atten_student_id', $studentid);
        $this->db->where('month', $m);
        $this->db->where('year', $y);
        $this->db->where('atten_user_id', $this->users->getId());
        return $this->db->get()->num_rows();
    }
    
}

/* End of file Attendance_model.php */
