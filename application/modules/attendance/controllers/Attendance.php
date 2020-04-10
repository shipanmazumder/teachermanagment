<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		/*
		|=============
		|	module load
		|=============
		*/
		$this->load->module('users');
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
        $this->load->model('Attendance_model');
        
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
	|	new attendance page load
	|===========
	*/
	public function add_attendance()
	{
        $data['main_content']='add_attendance';
        $data['all_batch']=$this->Attendance_model->view_all_running_batch();
		$this->load->view('page', $data);
    }
    /*
	|===============
	|	ajax search function
	|===============
	*/
	public function search_student($value='')
	{
        $m=date('m');
        $y=date('y');
        $d = date('d');
        $pre_month = date("m", strtotime("previous month"));
        $days = cal_days_in_month(CAL_GREGORIAN, abs($pre_month), $y);
        if($_POST)
        {
            $batchid=$this->input->post('batch_id');
            $result=$this->Attendance_model->search_student($batchid);
            
            if(!empty($result)):
                foreach ($result as $key => $value) {
                    $atten_count=$this->Attendance_model->check_attendance($batchid,$value->studentid);
                    if(empty($atten_count))
                    {
                        $object=array(
                            'atten_batch_id' =>$value->st_batch_id,
                            'atten_student_id' =>$value->studentid,
                            'month' =>$m,
                            'year' =>$y,
                            'status' =>1,
                            'atten_count' =>0,
                            'atten_user_id' =>$this->users->getId()
                        );
                         $this->db->insert('attendances', $object);
                    }
                }
                ?>
                <form id="students_attendance_add" method="POST">
                    <table id="students_table" class="table students_table mt-x" style="width: 100%">
                        <thead>
                            <tr class="data_row">
                                <td>Student ID</td>
                                <td>Name</td>
                                <td>Today<br>Attendance</td>
                                <td>Prev Month<br>Attendance</td>
                                <td>This Month<br>Attendance</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=0;
                            foreach ($result as $key=>$student_value):
                                $pre_attendance = @get_student_monthly_attendance($student_value->studentid, $y, $pre_month ,$days,$this->users->getId());
                                $current_attendance = @get_student_monthly_attendance($student_value->studentid, $y, $m ,$days,$this->users->getId());
                                $attendance=get_student_attendance($student_value->studentid,$student_value->st_batch_id,$this->users->getId(), $y, $m, $d);
                        ?>
                            <tr class="data_row">
                                <td><?= $student_value->student_id; ?></td>
                                <td><a href="<?= base_url(); ?>student/view-single-student/<?= $student_value->studentid;?>" class="text-info"><?= $student_value->student_name; ?></a></td>
                                <td>
                                    <input type="hidden" name="id[]" id="id" value="<?= $i; ?>">
                                    <input type="hidden" name="batch" id="batch" value="<?= $student_value->st_batch_id; ?>">
                                    <input type="hidden" name="student[<?= $i; ?>]"  id="student" value="<?= $student_value->studentid; ?>">
                                    <span class="checkbox">
                                        <label><input type="checkbox" name="std_atd[<?= $i; ?>]" id="std_atd" <?php if($attendance=="P") echo "checked"; ?>  value="P" > Present</label>
                                    </span>
                                </td>
                                <td><span class="total_b_count">
                                    <?php
                                        if(!empty($pre_attendance)):
                                                $sum=0;
                                            foreach($pre_attendance as $key):
                                                if($key=="P"):
                                                     $sum=$sum+1;
                                                endif;
                                            endforeach; 
                                        echo @$sum;
                                        else:
                                            echo "0";
                                        endif; 
                                    ?>
                                    </span></td>
                                <td><span class="total_b_count">
                                    <?php
                                       if(!empty($current_attendance)):
                                                $sum=0;
                                            foreach($current_attendance as $key):
                                                if($key=="P"):
                                                     $sum=$sum+1;
                                                endif;
                                            endforeach; 
                                        echo @$sum;
                                        else:
                                            echo "0";
                                        endif; 
                                    ?>
                                </span></td>
                            </tr>
                        <?php
                            $i++;
                            endforeach;
                        ?>
                        </tbody>
                    </table>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-3 mt-5">
                                <button onclick="update_data()" type="button" class="btn btn-success w-100 form-control save_attendance"  name="submit">Save Attendance</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php
            else:
                ?>
                <h6 class="text-center text-danger">No data available</h6>
                <?php
            endif;
        }
    }
    /*
	|===============
	|	ajax  attendance add
	|===============
	*/
	public function update_attendance_data($value='')
	{
        $id=$_POST['id'];
        $today=date('y-m-d');
        $field = 'day_'.abs(date('d'));
        $status='';
        foreach ($id as $key => $value) {
            if(isset($_POST['std_atd'][$value])==false)
            {
               $this->status="A";
            }
            else {
                 $this->status="P";
            }

            $condition=array(
                'atten_batch_id' =>$_POST['batch'],
                'atten_student_id' =>$_POST['student'][$value],
                'month' =>date('m'),
                'year' =>date('y'),
                'atten_user_id' =>$this->users->getId()
            );
            $this->db->update('attendances', array($field=>$this->status), $condition);
        }
        return true;
	}
    /*
	|===============
	|	view attendance
	|===============
	*/
	public function view_attendance($value='')
	{
        $data['main_content']='view_attendance';
        $data['all_batch']=$this->Attendance_model->view_all_running_batch();
		$this->load->view('page', $data);
	}
    /*
	|===============
	|	view attendance
	|===============
	*/
	public function view_student_attendance($value='')
	{
        $batchid=$this->input->post('batch_id');
        $atten_month=$this->input->post('atten_month');
        $result=$this->Attendance_model->search_student($batchid);
        $days = cal_days_in_month(CAL_GREGORIAN, abs($atten_month), date('y'));
        if(count($result)>0):
            ?>
			<form id="students_attendance_add" method="POST">
                    <table class="datatable-responsive table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr class="data_row">
                                <td>Students - Date</td>
                                <td>Total</td>
                                <?php 
                                    for($i = 1; $i<=$days; $i++ ){ ?>
                                    <td><?php echo $i; ?></td>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=0;
                        $total_atten=0;
                            foreach ($result as $student_value):
                                $attendance = @get_student_monthly_attendance($student_value->studentid,date('y'), $atten_month ,$days,$this->users->getId());
                                //$total_st_atten=$this->Attendance_model->view_student_total_attendance($student_value->studentid);
                        ?>
                            <tr class="data_row">
                                <td>
                                <a href="<?= base_url(); ?>student/view-single-student/<?= $student_value->studentid;?>" class="text-info"><?= $student_value->student_name; ?></a><br />
                                <?= $student_value->student_id; ?>
                                </td>
                                <td><span class="total_b_count">
                                     <?php
                                       if(!empty($attendance)):
                                                $sum=0;
                                            foreach($attendance as $key):
                                                if($key=="P"):
                                                     $sum=$sum+1;
                                                endif;
                                            endforeach; 
                                        echo @$sum;
                                        else:
                                            echo "0";
                                        endif; 
                                    ?>
                                 </span>
                                </td>
                                <?php if(!empty($attendance)):
                                        foreach($attendance AS $key ): ?>
                                    <td> <?php echo $key ? $key : '='; ?></td>
                                <?php
                                            endforeach;
                                        else:
                                            ?>
                                            <td colspan="30"  class="text-center"><?php echo "No Data Found"; ?></td>
                                            <?php
                                        endif; 
                                ?>

                            </tr>
                        <?php
                            endforeach;
                        ?>
                        </tbody>
                    </table>
            </form>
            <?php
        else:
			?>
			<h6 class="text-center text-danger">No data available</h6>
            <?php
        endif;
	}
}

/* End of file Attendance.php */
