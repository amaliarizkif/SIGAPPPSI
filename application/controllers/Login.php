<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('V_login');
	}

	public function dologin($value='')
	{
		if(isset($_SESSION['ID_User'])) {
			return redirect('Welcome');
		}
		if($_POST) {
			$data['email']= $this->input->post('Email');
			$data['password']= $this->input->post('Password');
			$result = $this->M_login->login($data);

			print_r($result);

			if(!empty($result)) {
				
				$this->session->set_userdata(array(
					'ID_User' 	=> $result[0]['ID_User'],
					'Nama' 		=> $result[0]['Nama'],
					'is_login' 	=> TRUE,
					'logged'	=> TRUE
				));

				redirect('Welcome');
				
			} else {
				$this->session->set_flashdata('pesan', 'Email or password is incorrect.');
				redirect('Login');
			}
		}
	}

	public function logout($value='')
	{
		$this->session->sess_destroy();
		redirect('Login');
	}

}
