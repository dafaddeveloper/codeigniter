<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
	}
	public function index(){
		if($this->session->userdata('USER')){
		redirect('c_service');	
		}else{
		$data['title']="Login Form - Sistem Informasi";
		$this->load->view('login',$data);
		}
	}
	public function cek_login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$username=$this->input->post('username');
		$pass=$this->input->post('password');
		if ($this->form_validation->run() == FALSE){
			//redirect('login');
			$this->index();
		}else{
		$user=$this->m_login->get_user($username);
		//echo password_hash('admin', PASSWORD_DEFAULT);
		if($user){
			if($user['status']== 0 ){
				if (password_verify($pass, $user['password'])) {
					$data=[
					'USER' 	=> $user['username']
					];
					$this->session->set_userdata($data);
					redirect('c_service');
				}else{
					$this->session->set_flashdata('errors', 'Password salah');
					redirect('login');
				}
			}else{
				$this->session->set_flashdata('errors', 'Username tidak aktif');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('errors', 'Username tidak ditemukan');
			redirect('login');
		}
		}
	}
	
	public function logout(){  
		$this->session->unset_userdata('USER');
		redirect('login'); 
	}



}