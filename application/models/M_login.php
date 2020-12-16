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

	public function logindokter($data)
	{
		$email = $data['email'];
		$password = $data['password'];
		$query = $this->db->query("SELECT 
 				 * 
			FROM
			`dokter` p 
			WHERE p.`Email` = BINARY '".$email."' 
			AND p.`Password` = BINARY '".$password."' ");
		$hasil = $query->result_array();
		return $hasil;
	}

	public function checklogin($data)
	{
		$email = $data['email'];
		$password = $data['password'];
		$query = $this->db->query("SELECT 
  			* 
			FROM
			(SELECT 
			`Email`,
			`Password`,
			`Role` 
			FROM
			`profile` 
			UNION
			SELECT 
			`Email`,
			`Password`,
			'Dokter' AS Role 
			FROM
			`dokter`) lgn 
			WHERE `Email` = BINARY '".$email."'
			AND `Password` = BINARY '".$password."' ;

			");
		$hasil = $query->result_array();
		return $hasil;
	}
}
?>