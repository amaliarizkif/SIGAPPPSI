<?php

class M_master extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getfirstaid()
	{
		$query	= "SELECT * FROM `first_aid_guide`";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function addfirstaid($data)
	{
		$this->db->insert('first_aid_guide',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function getsurvivalguide()
	{
		$query	= "SELECT * FROM `survival_guide_military`";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function addsurvivalguide($data)
	{
		$this->db->insert('survival_guide_military',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

}
?>