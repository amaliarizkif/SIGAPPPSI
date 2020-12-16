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
			$result = $this->M_login->checklogin($data);

			if(!empty($result)) {

				if ($result[0]['Role'] == 'Dokter') {
					$login = $this->M_login->logindokter($data);
					$this->session->set_userdata(array(
						'ID_Dokter' => $login[0]['ID_Dokter'],
						'Nama' 		=> $login[0]['Nama'],
						'Email' 	=> $login[0]['Email'],
						'Role'		=> $result[0]['Role'],
						'is_login' 	=> TRUE,
						'logged'	=> TRUE
					));
				}else{
					$login = $this->M_login->login($data);
					$this->session->set_userdata(array(
						'ID_User' 	=> $login[0]['ID_User'],
						'ID_Atasan' => $login[0]['ID_Atasan'],
						'Nama' 		=> $login[0]['Nama'],
						'Email' 	=> $login[0]['Email'],
						'Role'		=> $result[0]['Role'],
						'is_login' 	=> TRUE,
						'logged'	=> TRUE
					));
				}

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
