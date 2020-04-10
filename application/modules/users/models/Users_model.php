<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
	/*
	|======================
	|	@var error catch
	|======================
	*/
	public $someerror='';
	/*
	|============
	|	login in data check
	|============
	*/
	public function login_data_check()
	{
		$username=$this->input->post("uname");
	 	$password=md5($this->input->post("pass"));
	 	$attr=array(
	 		'user_name'	=>$username,
	 		'password'	=>$password,
	 		'status'	=>'active'
	 	);
	 	$result=$this->db->get_where('users',$attr);
	 	if($result->num_rows()==1)
	 	{
			$attr=array(
			'ta_current_id'		=>$result->row()->user_id,
			'current_name'			=>$result->row()->name,
			'current_role'			=>$result->row()->role,
			'ta_logged_in'				=>TRUE,
			'current_username'		=>$username
			);
			
			$this->session->set_userdata( $attr );
			return TRUE;
	 	}
	 	else
	 	{
	 		return FALSE;
	 	}
	}
	/*
	|============
	|	add new user data
	|============
	*/
 	public function add_user_data()
	{
		$user_name=$this->input->post('u_name');
		 	$password=md5($this->input->post("password"));
		 	$object=array(
		 		'name'			=>$this->input->post('full_name'),
		 		'user_name'		=>$this->input->post('u_name'),
		 		'email'			=>$this->input->post('user_email'),
		 		'user_mobile'	=>$this->input->post('user_mobile'),
		 		'role'			=>$this->input->post('role'),
		 		'address'			=>$this->input->post('address'),
		 		'password'		=>$password
		 	);
		 	$insert=$this->db->insert('users', $object);
		 	if($insert)
		 	{
		 		return TRUE;
		 	}
		 	else {
		 		 $this->someerror='Data Not Insert';
		 		return FALSE;
		 	}
	}
	/*
	|=================
	|	view all user
	|=================
	*/
	public function all_users_list()
	{
	 	$query=$this->db->get_where('users',array('role'=>'user'));
	 	return $query->result();
	}
	/*
	|================
	|	 user data by id
	|================
	*/
	public function edit_user($id='')
	{
		$query=$this->db->get_where('users', array('user_id'=>$id));
		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	/*
	|=======================
	|	update user data by id
	|=======================
	*/
	public function edit_user_data_update($id='')
	{
		$username=$this->input->post('u_name');
		$password=$this->input->post('password');

			if($password!='')
			{
				$object=array(
					'name'=>$this->input->post('full_name'),
					'user_name'=>$username,
					'email'=>$this->input->post('user_email'),
					'user_mobile'=>$this->input->post('user_mobile'),
					'role'=>$this->input->post('role'),
					'address'=>$this->input->post('address'),
					'password'=>md5($this->input->post('password')),
					'status'=>$this->input->post('status')
				);
				$res=$this->db->get_where('users',array('user_name'=>$username));

				if($res->num_rows()>0)
				{
					if($res->row(0)->user_id!=$id && $res->row(0)->user_name==$username)
					{
						$this->someerror='Username Already Exits.';
						return FALSE;
					}
					else
					{
						$query=$this->db->update('users',$object,array('user_id' => $id));
						if($this->db->affected_rows())
						{
							return TRUE;
						}
						else
						{
							$this->someerror='Same Data OR Something Wrong';
							return FALSE;
						}
					}
				}
				else
				{
					$query=$this->db->update('users',$object,array('user_id' => $id));
					if($this->db->affected_rows())
					{
						return TRUE;
					}
					else
					{
						$this->someerror='Same Data OR Something Wrong';
						return FALSE;
					}
				}
			}
			else{
				$object=array(
					'name'=>$this->input->post('full_name'),
					'user_name'=>$username,
					'email'=>$this->input->post('user_email'),
					'user_mobile'=>$this->input->post('user_mobile'),
					'role'=>$this->input->post('role'),
					'address'=>$this->input->post('address'),
					'status'=>$this->input->post('status')
				);
				$res=$this->db->get_where('users',array('user_name'=>$username));

				if($res->num_rows()>0)
				{
					if($res->row(0)->user_id!=$id && $res->row(0)->user_name==$username)
					{
						$this->someerror='Username Already Exits.';
						return FALSE;
					}
					else
					{
						$query=$this->db->update('users',$object,array('user_id' => $id));
						if($this->db->affected_rows())
						{
							return TRUE;
						}
						else
						{
							$this->someerror='Same Data OR Something Wrong';
							return FALSE;
						}
					}
				}
				else
				{
					$query=$this->db->update('users',$object,array('user_id' => $id));
					if($this->db->affected_rows())
					{
						return TRUE;
					}
					else
					{
						$this->someerror='Same Data OR Something Wrong';
						return FALSE;
					}
				}
			} 
		
	}
	/*
	|=======================
	|	update user data by id
	|=======================
	*/
	public function edit_user_pass_update($id='')
	{
		$username=$this->input->post('u_name');
		$password=$this->input->post('password');
		if($password!=null)
		{
		 	$object=array(
		 		'user_name'=>$username,
		 		'password'=>md5($password)
		 	);


		 	$res=$this->db->get_where('users',array('user_name'=>$username));

		 	if($res->num_rows()>0)
		 	{
		 		if($res->row(0)->user_id!=$id && $res->row(0)->user_name==$username)
		 		{
		 			 $this->someerror='Username Already Exits.';
		 			return FALSE;
		 		}
		 		else
		 		{
		 			$query=$this->db->update('users',$object,array('user_id' => $id));
				 	if($this->db->affected_rows())
					{
						return TRUE;
					}
					else
					{
						$this->someerror='Same Data OR Something Wrong';
						return FALSE;
					}
		 		}
		 	}
		 	else
		 	{
		 		$query=$this->db->update('users',$object,array('user_id' => $id));
			 	if($this->db->affected_rows())
				{
					return TRUE;
				}
				else
				{
					$this->someerror='Same Data OR Something Wrong';
					return FALSE;
				}
		 	}
		}
		else
		{

		 	$object=array(
		 		'user_name'=>$username
		 	);


		 	$res=$this->db->get_where('users',array('user_name'=>$username));

		 	if($res->num_rows()>0)
		 	{
		 		if($res->row(0)->user_id!=$id && $res->row(0)->user_name==$username)
		 		{
		 			 $this->someerror='Username Already Exits.';
		 			return FALSE;
		 		}
		 		else
		 		{
		 			$query=$this->db->update('users',$object,array('user_id' => $id));
				 	if($this->db->affected_rows())
					{
						return TRUE;
					}
					else
					{
						$this->someerror='Same Data OR Something Wrong';
						return FALSE;
					}
		 		}
		 	}
		 	else
		 	{
		 		$query=$this->db->update('users',$object,array('user_id' => $id));
			 	if($this->db->affected_rows())
				{
					return TRUE;
				}
				else
				{
					$this->someerror='Same Data OR Something Wrong';
					return FALSE;
				}
		 	}
		}
		
	}

}

/* End of file Login_model.php */
/* Location: ./application/modules/Login/models/Login_model.php */