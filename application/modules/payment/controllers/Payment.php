<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		/*
		|=============
		|	module load
		|=============
		*/
		$this->load->module('users');
		$this->load->module('dashboard');
		$this->load->module('student');
		$this->load->module('batch');
		$this->load->module('attendance');
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
		$this->load->model('Payment_model');
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
	|	new payment page load
	|===========
	*/
	public function add_payment($value='')
	{
		$data['main_content']='add_payment';
		$data['allbatch']=$this->Batch_model->view_all_running_batch();
		$this->load->view('page', $data);
	}
	    /*
	|===============
	|	ajax search function
	|===============
	*/
	public function view_student_for_payment($value='')
	{
		$batchid=$this->input->post('pay_batch_id');
		$pay_month=$this->input->post('pay_month');

		$result=$this->Payment_model->search_student($batchid,$pay_month);
		$st_id_payment=array();
		$pay_result=array();
		if(count($result)>0):
			foreach ($result as $key => $value) {
				$pay_result=$this->Payment_model->check_payment($value->studentid,$pay_month);
				if(count($pay_result)>0)
				{
					foreach ($pay_result as $key => $value) {
						$st_id_payment[]= $value->payment_st_id;
					}
				}
			}
			if(count($st_id_payment)!=count($result)): 
		?>
			<form id="students_payment_add" method="POST">
                <table id="students_table" class="table students_table mt-x" style="width: 100%">
                    <thead>
                        <tr class="da ta_row">
                            <td>Student ID</td>
                            <td>Name</td>
                            <td>Payment</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    	$i=0;
						foreach ($result as $student_value):
							$payment=$this->Payment_model->check_payment($student_value->studentid,$pay_month);
							if(!$payment):
	                    ?>
	                        <tr class="data_row">
	                            <td><?= $student_value->student_id; ?></td>
	                            <td><a href="<?= base_url(); ?>student/view-single-student/<?= $student_value->studentid;?>" class="text-info"><?= $student_value->student_name; ?></a></td>
	                            <td>
	                                <input type="hidden" name="id[]" id="id[]" value="<?= $i; ?>">
	                                <input type="hidden" name="batch" id="batch" value="<?= $student_value->st_batch_id; ?>">
	                                <input type="hidden" name="student[<?= $i; ?>]"  id="student[<?= $i; ?>]" value="<?= $student_value->studentid; ?>">
									<input type="hidden" name="pay_month"  id="pay_month" value="<?= date('y').$pay_month; ?>">	
									<input type="number" name="pay[<?= $i; ?>]" value="" class="input_field form-control taka" id="pay[<?= $i; ?>]"  placeholder="Taka"
													required="required" />
	                            </td>
	                        </tr>
						<?php
						endif;
						$i++;							
						endforeach;
					?>
                    </tbody>
                </table>
                 <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3 mt-5">
                            <button onclick="save_payment()" type="button" class="btn btn-success w-100 form-control save_payment"  name="submit">Save Payment</button>
                        </div>
                    </div>
                </div>
            </form>
		<?php
			else:
			?>
				<h6 class="text-center text-info">Payment Clear</h6>
			<?php
			endif;
        else:
			?>
			<h6 class="text-center text-danger">No data available</h6>
            <?php
        endif;
	}
	
	/*
	|===============
	|	ajax  payment add
	|===============
	*/
	public function add_new_payment($value='')
	{
        $data=$this->input->post('id');
        $today=date('y-m-d');

        foreach ($data as $value) 
        {
        	if($_POST['pay'][$value]!="")
            {
				$object=array(
					'payment_batch_id'	=>	$_POST['batch'],
					'payment_st_id'		=>	$_POST['student'][$value],
					'pay_month'			=>	$_POST['pay_month'],
					'pay'				=>	$_POST['pay'][$value],
					'pay_user_id'		=>	$this->users->getId(),
					'pay_date'	    =>  $today,
				);
				$this->db->insert('payment', $object);
			}
		}
        return true;
	}
	/*
	|==================
	|	view all payment
	|==================
	*/
	public function view_all_payment()
	{
		$data['main_content']='view_payment';
		$data['allbatch']=$this->Batch_model->view_all_running_batch();
		$data['all_payment']=$this->Payment_model->view_all_payment();
		$this->load->view('page', $data);
	}
	/*
	|==================
	|	view total payment
	|==================
	*/
	public function view_total_payment()
	{
		$data['main_content']='total_payment';
		$this->load->view('page', $data);
	}
	/*
	|===============
	|	view payment by ajax search
	|===============
	*/
	public function view_student_payment()
	{
        $batchid=$this->input->post('payment_batch_id');
		$pay_month=$this->input->post('pay_month');
		   $result=$this->Payment_model->view_student_payment($batchid,$pay_month);
		   	$st_id=array();
			$pay_id=array();
			$st_pay=array();
			$st_pay_date=array();
		   foreach ($result as $key => $value) {
			  $st_id[]=$value->payment_st_id;
			  $pay_id[]=$value->paymentid;
			  $st_pay[]=$value->pay;
			  $st_pay_date[]=$value->pay_date;
		   }
       	$stresult=$this->Student_model->view_all_runing_student_by_batch($batchid);
        if(count($result)>0 || count($stresult)>0):
            ?>
                <table id="students_table" class="table students_table mt-x" style="width: 100%">
                    <thead>
                        <tr class="data_row">
                            <td>#</td>
                            <td>Student ID</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Taka</td>
                            <td>Date</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
					$i=0;
						foreach ($stresult as $key=>$student_res):
                    ?>
                        <tr class="data_row">
                            <td><?= ++$key; ?></td>
                            <td><?= $student_res->student_id; ?></td>
                            <td><a href="<?= base_url(); ?>student/view-single-student/<?= $student_res->studentid;?>" class="text-info"><?= $student_res->student_name; ?></a></td>
                            <td><?= $student_res->student_mobile; ?></td>
                            <td>
							<?php
								foreach ($st_id as $st_key => $value):
									if($student_res->studentid==$value):
										echo $st_pay[$st_key];
									endif;
								endforeach;
							?>
							</td>
                            <td>
							<?php
								foreach ($st_id as $st_key => $value):
									if($student_res->studentid==$value):
										echo formatdate($st_pay_date[$st_key]);
									endif;
								endforeach;
							?>
							</td>
                            <td>
							<?php
								foreach ($st_id as $st_key => $value):
									if($student_res->studentid==$value):
										?>
										<a onclick='delete_payment(<?= @$pay_id[$st_key];?>,<?= $batchid; ?>,<?= $pay_month; ?>)' href="javascript:void(0)" class="text-danger">Delete</a>
										<?php
									endif;
								endforeach;
							?>
							</td>
                        </tr>
                    <?php
					$i++;
                        endforeach;
                    ?>
                    </tbody>
                </table>
            <?php
        else:
			?>
			<h6 class="text-center text-danger">No data available</h6>
            <?php
        endif;
	}
	/*
	|===============
	|	view total payment by ajax search
	|===============
	*/
	public function view_total_student_payment()
	{
		$pay_month=$this->input->post('pay_month');
		$result=$this->Payment_model->view_total_payment($pay_month);
		if($result):
			if($result[0]->total_payment>0):
            ?>
			<div class="text-center">
			 <h3 class="p-5 bg-primary d-inline-block text-white "><?= $result[0]->total_payment; ?> Tk</h3>
			</div>
            <?php
			else:
				?>
					<h6 class="text-center text-danger">00 Tk </h6>
				<?php
				endif;
        else:
			?>
			<h6 class="text-center text-danger">00 Tk </h6>
            <?php
        endif;
	}
	/*
	|==================
	|	delete payment data by id
	|==================
	*/
	public function delete_payment_data()
	{
		$payment_id=$this->input->post('payment_id');
		if ($this->Payment_model->delete_payment_data($payment_id)) {
			return True;
		}
	}
}

/* End of file Payment.php */
/* Location: ./application/modules/Payment/controllers/Payment.php */