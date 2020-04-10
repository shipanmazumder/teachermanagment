<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public $user_id=null;
	function __construct()
	{
		parent::__construct();
		/*
		|=============
		|	module load
		|=============
		*/
		$this->load->module('install');
		/*
		|=============
		|	model load
		|=============
		*/
		$this->load->model('Users_model');
		
		if($this->session->userdata('ta_logged_in')!=false)
		{
			$this->user_id=$this->session->userdata('ta_current_id');
		}
		
		

	}
	public function getId()
	{
		return $this->user_id;
	}
	/*
	|====================
	|	default load
	|====================
	*/
	public function index()
	{
		/*
		|===========
		|	check login && redirect
		|===========
		*/
		// $this->_member_area();
		if($this->default_login())
		{
			redirect('dashboard','refresh');
		}
		$this->load->view('login_page');
	}
	/*
	|==================
	|	new user page load
	|==================
	*/
	public function add_user()
	{
		/*=============redirect ==============*/
		$this->_member_area();
		$this->_user_area();
		
		$data['main_content']='add_user_page';
		$this->load->view('page', $data);
	}
	/*
	|==================
	|	validate  and data entry
	|==================
	*/
	public function add_user_data_check()
	{
		/*=============redirect ==============*/
		$this->_member_area();
		$this->_user_area();

		$config = array(
		        array(
		                'field' => 'full_name',
		                'label' => 'Name',
		                'rules' => 'required|trim|xss_clean',
		                'errors' => array(
		                        'required' 		=> 'You must provide  %s.',
		                ),
		        ),
		        array(
		                'field' => 'u_name',
		                'label' => 'Username',
		                'rules' => 'required|trim|xss_clean|alpha_numeric|min_length[3]|is_unique[users.user_name]',
		                'errors' => array(
		                        'required' => 'You must provide a %s.','alpha_numeric' => "Don't use speacial character %s.",
		                ),
		        ),
		        array(
		                'field' => 'password',
		                'label' => 'Password',
		                'rules' => 'required|trim|min_length[3]'
		        ),
		        array(
		                'field' => 'user_email',
		                'label' => 'Email',
		                'rules' => 'required|valid_email'
				),
		        array(
		                'field' => 'role',
		                'label' => 'Role',
		                'rules' => 'required'
				),
		        array(
		                'field' => 'address',
		                'label' => 'Address',
		                'rules' => 'required'
		        )
			);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) {
			$data['main_content']='add_user_page';
			$this->load->view('page',$data);
		} 
		else {
			$result=$this->Users_model->add_user_data();
			if($result)
			{
				redirect('users/all-user');
			}
			else {
				$data["errorlogin"]=$this->Users_model->someerror;
				$data['main_content']='add_user_page';
				$this->load->view('page',$data);
			}
		}
	}
	/*
	|=====================
	|	edit user page load
	|=====================
	*/
	public function edit_user($id='')
	{
		/*=============redirect ==============*/
		$this->_member_area();
		$this->_user_area();

		if($this->Users_model->edit_user($id))
		{
			$data['user_info']=$this->Users_model->edit_user($id);
			$data['main_content']='edit_user_page';
			$this->load->view('page',$data);
		}
		else
		{
			redirect('errors/Not-Found');
		}
	}
	/*
	|=====================
	|	validate  and data update/edit
	|=====================
	*/
	public function edit_user_data_check($id='')
	{
		/*=============redirect ==============*/
		$this->_member_area();
		$this->_user_area();

		$config = array(
		        array(
		                'field' => 'full_name',
		                'label' => 'Name',
		                'rules' => 'required|trim|xss_clean',
		                'errors' => array(
		                        'required' 		=> 'You must provide  %s.',
		                ),
		        ),
		        array(
		                'field' => 'u_name',
		                'label' => 'Username',
		                'rules' => 'required|trim|xss_clean|alpha_numeric|min_length[3]',
		                'errors' => array(
		                        'required' => 'You must provide a %s.','alpha_numeric' => "Don't use speacial character %s.",
		                ),
		        ),
		        array(
		                'field' => 'user_email',
		                'label' => 'Email',
		                'rules' => 'valid_email'
				),
		        array(
		                'field' => 'password',
		                'label' => 'Password'
				),
		        array(
		                'field' => 'address',
		                'label' => 'Address',
		                'rules' => 'required'
		        )
			);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() == FALSE) 
		{
			if($this->Users_model->edit_user($id))
			{
				$data['user_info']=$this->Users_model->edit_user($id);
				$data['main_content']='edit_user_page';
				$this->load->view('page',$data);
			}
			else
			{
				redirect('errors/Not-Found');
			}
		} 
		else 
		{
			$result=$this->Users_model->edit_user_data_update($id);
			if($result)
			{
				redirect('users/all-user');
			}
			else {
				if(isset($this->Users_model->someerror))
				{
					$data["errorlogin"]=$this->Users_model->someerror;
				}
				if($this->Users_model->edit_user($id))
				{
					$data['user_info']=$this->Users_model->edit_user($id);
					
				}
				$data['main_content']='edit_user_page';
				$this->load->view('page',$data);
			}
		}
	}
	/*
	|=====================
	|	edit user page load
	|=====================
	*/
	public function edit_user_pass($id='')
	{
		/*=============redirect ==============*/
		$this->_member_area();

		if($this->Users_model->edit_user($id))
		{
			$data['user_info']=$this->Users_model->edit_user($id);
			$data['main_content']='edit_user';
			$this->load->view('page',$data);
		}
		else
		{
			redirect('errors/Not-Found');
		}
	}
	/*
	|=====================
	|	validate  and data update/edit
	|=====================
	*/
	public function edit_user_pass_check($id='')
	{
		/*=============redirect ==============*/
		$this->_member_area();
		$this->form_validation->set_rules('u_name', 'User Name', 'trim|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'trim');

		if ($this->form_validation->run() == FALSE) 
		{
			if($this->Users_model->edit_user($id))
			{
				$data['user_info']=$this->Users_model->edit_user($id);
				$data['main_content']='edit_user';
				$this->load->view('page',$data);
			}
			else
			{
				redirect('errors/Not-Found');
			}
		} 
		else 
		{
			$result=$this->Users_model->edit_user_pass_update($id);
			if($result)
			{
				$data['user_info']=$this->Users_model->edit_user($id);
				$data["success"]="Password Changed";
				$data['main_content']='edit_user';
				$this->load->view('page',$data);
			}
			else {
				if(isset($this->Users_model->someerror))
				{
					$data["errorlogin"]=$this->Users_model->someerror;
				}
				if($this->Users_model->edit_user($id))
				{
					$data['user_info']=$this->Users_model->edit_user($id);
					
				}
				$data['main_content']='edit_user';
				$this->load->view('page',$data);
			}
		}
	}
	/*
	|=================
	|	view all user
	|=================
	*/
	public function all_users()
	{
		/*=============redirect ==============*/
		$this->_member_area();
		$this->_user_area();

		$data['main_content']='all_users_page';
		$data['alluserlist']=$this->Users_model->all_users_list();
		$this->load->view('page',$data);
	}
	/*
	|============
	|	login in data check
	|============
	*/
	public function login_data_check()
	{
		$this->form_validation->set_rules('uname', 'Username', 'trim|min_length[3]');
		$this->form_validation->set_rules('pass', 'Password', 'trim|min_length[3]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login_page');
		} else {
			$result=$this->Users_model->login_data_check();
			if($result)
			{
				redirect('dashboard?=Successfully_Logged_In');
			}
			else {
				$data["errorlogin"]="Username or Password Invalid";
				$this->load->view('login_page',$data);
			}
		}
	}

	public function default_login()
	{
		if($this->session->userdata('ta_logged_in')!=false)
		{
			$ta_current_id=$this->session->userdata('ta_current_id');
			$attr=array(
				'user_id'	=>$ta_current_id,
				'status'	=>'active'
			);
			$result=$this->db->get_where('users',$attr);
			if($result->num_rows()==1)
			{
				return TRUE;
			}
			else
			{
				$this->session->sess_destroy();
				return FALSE;
			}
		}
		else{
			return false;
		}
	}
	/*
	|============
	|	logout 
	|============
	*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users/security-check?Security-Logout=Successfully');
	}
	/*
	|============
	|	permission create
	|============
	*/
	public function _is_logged_in()
	{
		if($this->session->userdata('ta_logged_in')){
			return true;
		}else{
			return false;
		}
	}
	public function _is_admin()
	{
		if($this->session->userdata('current_role')==="admin")
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function _is_user()
	{
		if($this->session->userdata('current_role')==="user")
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/*
	|=============
	|	general public
	|=============
	*/
	public function _member_area()
	{
		if(!$this->default_login())
		{
			redirect('users/security-check?=Login_in_first','refresh');
		}
	}
	/*
	|=============
	|	 superadmin
	|=============
	*/
	public function _admin_area($value='')
	{
		if(!$this->_is_admin())
		{
			redirect('dashboard?=not-permit','refresh');
		}
	}
	/*
	|=============
	|	 admin
	|=============
	*/
	public function _user_area($value='')
	{
		if($this->_is_user())
		{
			redirect('dashboard?=not-permit','refresh');
		}
	}

}

/* End of file Login.php */
/* Location: ./application/modules/Login/controllers/Login.php */