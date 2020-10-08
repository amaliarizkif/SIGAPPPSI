<?php

class M_emergency extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getemergencycall($iduser)
	{
		$query	= "SELECT 
		e.*,
		p.`Nama` AS creator,
		pr.`Nama` AS solver 
		FROM
		`emergency_calls` e 
		LEFT JOIN `profile` p 
		ON p.`ID_User` = e.`ID_User` 
		LEFT JOIN `profile` pr 
		ON pr.`ID_User` = e.`Solved_By` 
		WHERE e.`ID_User` = '".$iduser."'";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function addemergencycall($data)
	{
		$this->db->insert('emergency_calls',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function editemergencycall($data, $id)
	{

		$this->db->where('ID_ECL', $id);
		return $this->db->update('emergency_calls', $data);
	}

	public function getemergencycalldetail($id)
	{
		$query	= "SELECT 
		e.*,
		p.`Nama` AS creator,
		pr.`Nama` AS solver 
		FROM
		`emergency_calls` e 
		LEFT JOIN `profile` p 
		ON p.`ID_User` = e.`ID_User` 
		LEFT JOIN `profile` pr 
		ON pr.`ID_User` = e.`Solved_By` 
		WHERE e.`ID_ECL` = '".$id."'";
		$emp = $this->db->query($query);
		return $emp->row();
	}

}
?>