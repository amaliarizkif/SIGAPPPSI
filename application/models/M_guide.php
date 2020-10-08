<?php

class M_guide extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getfirstaidguide()
	{
		$query	= "SELECT * FROM `first_aid_guide`";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function getfirstaidguidedetail($id)
	{
		$query	= "SELECT * FROM `first_aid_guide` WHERE `ID_FAG` = " . $id;
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function getsurvivalguide()
	{
		$query	= "SELECT * FROM `survival_guide_military`";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function getsurvivalguidedetail($id)
	{
		$query	= "SELECT * FROM `survival_guide_military` WHERE `ID_SGM` = " . $id;
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

}
?>