<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guide extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_guide');
	}

	public function FirstAid($value='')
	{
		
		$data['fa'] = $this->M_guide->getfirstaidguide();
		$this->load->view('V_header');
		$this->load->view('V_firstaid',$data);
		$this->load->view('V_footer');
		// print_r($data);
	}

	public function FirstAidDetail()
	{
		$id = $this->uri->segment(3);
		$data['fa'] = $this->M_guide->getfirstaidguidedetail($id);
		$this->load->view('V_header');
		$this->load->view('V_firstaid_detail',$data);
		$this->load->view('V_footer');
		// print_r($data);
	}

	public function Survival($value='')
	{
		
		$data['fa'] = $this->M_guide->getsurvivalguide();
		$this->load->view('V_header');
		$this->load->view('V_survival',$data);
		$this->load->view('V_footer');
		// print_r($data);
	}

	public function SurvivalDetail()
	{
		$id = $this->uri->segment(3);
		$data['fa'] = $this->M_guide->getsurvivalguidedetail($id);
		$this->load->view('V_header');
		$this->load->view('V_survival_detail',$data);
		$this->load->view('V_footer');
	}

	public function DownloadfileFAG($id)
	{

		$id = $this->uri->segment(3);
		$data['fa'] = $this->M_guide->getfirstaidguidedetail($id);
		$file = base_url().'assets/files/firstaid/'. $data['fa'][0]['File_Name'];
		header('Content-Type: application/pdf'); 

		// It will be called downloaded.pdf 
		header('Content-Disposition: attachment; filename="FirstAid.pdf"'); 

		$imagpdf = readfile($file);  

		exit(); 

	}

		public function DownloadfileSGM($id)
	{

		$id = $this->uri->segment(3);
		$data['fa'] = $this->M_guide->getsurvivalguidedetail($id);
		$file = base_url().'assets/files/survivalguide/'. $data['fa'][0]['File_Name'];
		header('Content-Type: application/pdf'); 

		// It will be called downloaded.pdf 
		header('Content-Disposition: attachment; filename="SurvivalGuide.pdf"'); 

		$imagpdf = readfile($file);  

		exit(); 

	}
}