<?php

class M_emergency extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getemergencycall()
	{
		$query	= "SELECT 
		e.*,
		p.`Nama` AS creator,
		pr.`Nama` AS solver 
		FROM
		`emergency_calls` e 
		LEFT JOIN `profile` p 
		ON p.`ID_User` = e.`ID_User` 
		LEFT JOIN `Dokter` pr 
		ON pr.`ID_Dokter` = e.`Solved_By` 
		ORDER BY `Date` DESC  ";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function getemergencycallbystatus($status)
	{
		$query	= "SELECT 
		e.*,
		p.`Nama` AS creator,
		pr.`Nama` AS solver 
		FROM
		`emergency_calls` e 
		LEFT JOIN `profile` p 
		ON p.`ID_User` = e.`ID_User` 
		LEFT JOIN `Dokter` pr 
		ON pr.`ID_Dokter` = e.`Solved_By` 
		WHERE `Status` = '".$status."' 
		ORDER BY `Date` DESC  ";
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
		d.`Nama` AS solver 
		FROM
		`emergency_calls` e 
		LEFT JOIN `profile` p 
		ON p.`ID_User` = e.`ID_User` 
		LEFT JOIN `dokter` d
		ON d.`ID_Dokter` = e.`Solved_By` 
		WHERE e.`ID_ECL` = '".$id."'";
		$emp = $this->db->query($query);
		return $emp->row();
	}

	public function getdoctorconcultation()
	{
		$query	= "select 
		dc.*,
		p.`Nama` as pasien,
		d.`Nama` as dokter 
		from
		`doctor_consultation` dc
		left join `profile` p on p.`ID_User` = dc.`ID_User`
		left join `dokter` d on d.`ID_Dokter` = dc.`ID_Dokter`
		ORDER by Date desc";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function getdoctorconcultationdetail($ID_DC)
	{
		$query	= "select 
		dc.*,
		p.`Nama` as pasien,
		d.`Nama` as dokter 
		from
		`doctor_consultation` dc
		left join `profile` p on p.`ID_User` = dc.`ID_User`
		left join `dokter` d on d.`ID_Dokter` = dc.`ID_Dokter`
		where ID_DC = ".$ID_DC;
		$emp = $this->db->query($query);
		return $emp->row();
	}

	public function getdoctorconcultation_doctor($ID_Dokter)
	{
		$query	= "select 
		dc.*,
		p.`Nama` as pasien,
		d.`Nama` as dokter 
		from
		`doctor_consultation` dc
		left join `profile` p on p.`ID_User` = dc.`ID_User`
		left join `dokter` d on d.`ID_Dokter` = dc.`ID_Dokter`
		where dc.`ID_Dokter` = '". $ID_Dokter."'
		order by Date desc" ;
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function getdoctor($value='')
	{
		$query	= "SELECT * FROM `dokter`";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function addeddoctorconsul($data)
	{
		$this->db->insert('doctor_consultation',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function editeddoctorconsul($data, $ID_DC)
	{
		
		$this->db->where('ID_DC', $ID_DC);
		return $this->db->update('doctor_consultation', $data);
	}

	public function getemergencycontacts($value='')
	{
		$query	= "SELECT * FROM `emergency_contacts`;";
		$emp = $this->db->query($query);
		return $emp->result_array();
		# code...
	}

}
?>