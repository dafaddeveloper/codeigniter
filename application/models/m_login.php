<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {
	public function get_data ()
	{
		return $this->db->get('user')->result_array();
	}

	public function get_user($user)
	{
		if($user){
			return $this->db->select("username,password,status from user where username='".$user."'")->get()->row_array();
		}
	}
}