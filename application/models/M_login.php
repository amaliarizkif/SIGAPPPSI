<?php

class M_Login extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login($data)
	{
		$email = $data['email'];
		$password = $data['password'];
		$query = $this->db->query("SELECT 
 				 * 
			FROM
			`profile` p 
			WHERE p.`Email` = BINARY '".$email."' 
			AND p.`Password` = BINARY '".$password."' ");
		$hasil = $query->result_array();
		return $hasil;
	}
}
?>