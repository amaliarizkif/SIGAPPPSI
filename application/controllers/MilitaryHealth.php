<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MilitaryHealth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_emergency');
	}

	public function MilitaryHealth($value='')
	{
		
		// $data['ec'] = $this->M_emergency->getemergencycall();
		$this->load->view('V_header');
		$this->load->view('V_militaryhealth_progress');
		$this->load->view('V_footer');
	}

	public function UpdateMonitoring($value='')
	{
		# code...
	}

}
?>