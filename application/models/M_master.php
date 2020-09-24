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

	public function getfirstaiddetail($id)
	{
		$query	= "SELECT * FROM `first_aid_guide` where ID_FAG = '".$id."'";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function editfirstaid($data, $id)
	{

		$this->db->where('ID_FAG', $id);
		return $this->db->update('first_aid_guide', $data);
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

	public function getsurvivalguidedetail($id)
	{
		$query	= "SELECT * FROM `survival_guide_military` where ID_SGM = '".$id."'";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function editsurvivalguide($data, $id)
	{

		$this->db->where('ID_SGM', $id);
		return $this->db->update('survival_guide_military', $data);
	}

	public function getprofile()
	{
		$query	= "SELECT * FROM `profile`";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function addprofile($data)
	{
		$this->db->insert('profile',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function editprofile($data, $id)
	{

		$this->db->where('ID_User', $id);
		return $this->db->update('profile', $data);
	}



}
?>