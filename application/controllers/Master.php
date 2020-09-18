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

	public function added_firstaid()
	{
		$config['upload_path'] = realpath(APPPATH . '../assets/files/firstaid');
		$config['allowed_types'] 	= 'pdf|docx';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 10265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('File')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('Master/FirstAid');
		} else {
			$uploaddata = $this->upload->data();
		}

		$data = array(
			'Title' 		=> $this->input->post('Title'),
			'Description' 	=> $this->input->post('Description'),
			'File_Name'		=> $uploaddata['file_name'],
			'Created_Date' 	=> date('Y-m-d')
		);

		$result = $this->M_master->addfirstaid($data);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Master/FirstAid');

	}

	public function delete_firstaid($value='')
	{
		$id = $this->uri->segment(3);
		$sql = "Delete from first_aid_guide WHERE ID_FAG = '".$id."'";
		$this->db->query($sql);
		$this->session->set_flashdata("pesan", "Data Telah Terhapus");
		redirect('Master/FirstAid');
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

	public function added_survivalguide()
	{
		$config['upload_path'] = realpath(APPPATH . '../assets/files/survivalguide');
		$config['allowed_types'] 	= 'pdf|docx';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 10265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('File')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('Master/SurvivalGuide');
		} else {
			$uploaddata = $this->upload->data();
		}

		$data = array(
			'Title' 		=> $this->input->post('Title'),
			'Description' 	=> $this->input->post('Description'),
			'File_Name'		=> $uploaddata['file_name'],
			'Created_Date' 	=> date('Y-m-d')
		);

		$result = $this->M_master->addsurvivalguide($data);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Master/SurvivalGuide');

	}

	public function delete_survivalguide($value='')
	{
		$id = $this->uri->segment(3);
		$sql = "Delete from survival_guide_military WHERE ID_SGM = '".$id."'";
		$this->db->query($sql);
		$this->session->set_flashdata("pesan", "Data Telah Terhapus");
		redirect('Master/SurvivalGuide');
	}


	public function User()
	{
		$this->load->view('V_header');
		$this->load->view('V_home');
		$this->load->view('V_footer');
	}

}
