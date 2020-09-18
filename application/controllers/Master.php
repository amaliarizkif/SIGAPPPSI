<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
	}
	

	public function FirstAid()
	{
		$data['fa'] = $this->M_master->getfirstaid();
		$this->load->view('V_header');
		$this->load->view('V_master_firstaid',$data);
		$this->load->view('V_footer');
	}

	public function add_firstaid($value='')
	{
		$this->load->view('V_header');
		$this->load->view('V_master_firstaid_add');
		$this->load->view('V_footer');
	}

	public function SurvivalGuide()
	{
		$data['sg'] = $this->M_master->getsurvivalguide();
		$this->load->view('V_header');
		$this->load->view('V_master_survivalguide',$data);
		$this->load->view('V_footer');
	}

	public function add_survivalguide($value='')
	{
		$this->load->view('V_header');
		$this->load->view('V_master_survivalguide_add');
		$this->load->view('V_footer');
	}

	public function User()
	{
		$this->load->view('V_header');
		$this->load->view('V_home');
		$this->load->view('V_footer');
	}

}
