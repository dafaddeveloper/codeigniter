<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard');
		$this->load->view('templates/footer');
	}
}
