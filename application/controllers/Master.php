<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function index()
	{
		$this->load->view('V_header');
		$this->load->view('V_home');
		$this->load->view('V_footer');
	}

}
