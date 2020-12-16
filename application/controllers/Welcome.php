<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_military');

		if ($this->session->userdata['logged'] == FALSE)
		{
			redirect('Login');
		}
	}

	public function index()
	{
		$data['mh'] = $this->M_military->gettop10country();
		$data['mha'] = $this->M_military->getmhapproved();
		$data['erc'] = $this->M_military->getercomplete();
		$data['dcn'] = $this->M_military->getdcnew();
		$data['mhwa'] = $this->M_military->getmhwa();
		$data['rptmh'] = $this->M_military->getmhreport();
		$data['rpter'] = $this->M_military->geterreport();
		$data['all'] = $this->M_military->get_allmodulreport();


		// print_r($data['rptmh']);

		if ($this->session->userdata['Role'] == 'Admin') {
			$this->load->view('V_header');
			$this->load->view('V_dashboard', $data);
			$this->load->view('V_footer');
		}else{
			$this->load->view('V_header');
			$this->load->view('V_home');
			$this->load->view('V_footer');
		}

		
	}

}
