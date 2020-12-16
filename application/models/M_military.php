<?php

class M_military extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function addedmilitary($data)
	{
		$this->db->insert('military_health',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function updatemilitary($data,$id)
	{
		$this->db->where('ID_MH', $id);
		return $this->db->update('military_health', $data);
	}

	public function getmilitaryhealth($iduser)
	{
		$query	= "SELECT 
		`military_health`.*,
		`profile`.`Jabatan`,
		`profile`.`NRP/NBI` AS 'nrp',
		CASE
		WHEN ROUND(`Lari` / 10 * 100) > 100 
		THEN 100 
		ELSE ROUND(`Lari` / 10 * 100) 
		END AS persenlari,
		CASE
		WHEN ROUND(`Sit_up` / 34 * 100) > 100 
		THEN 100 
		ELSE ROUND(`Sit_up` / 34 * 100) 
		END AS persensitup,
		CASE
		WHEN ROUND(`Push_up` / 24 * 100) > 100 
		THEN 100 
		ELSE ROUND(`Push_up` / 24 * 100) 
		END AS persenpushup,
		CASE
		WHEN ROUND(`Pull_up` / 25 * 100) > 100 
		THEN 100 
		ELSE ROUND(`Pull_up` / 25 * 100) 
		END AS persenpullup,
		CASE
		WHEN ROUND(`Squat` / 25 * 100) > 100 
		THEN 100 
		ELSE ROUND(`Squat` / 25 * 100) 
		END AS persensquat,
		CASE
		WHEN ROUND(`Vertical_jump` / 45 * 100) > 100 
		THEN 100 
		ELSE ROUND(`Vertical_jump` / 45 * 100) 
		END AS persenverjump,
		CASE
		WHEN ROUND(`Step` / 107 * 100) > 100 
		THEN 100 
		ELSE ROUND(`Step` / 107 * 100) 
		END AS persenstep,
		CASE
		WHEN ROUND(`Sit_Reach` / 5 * 100) > 100 
		THEN 100 
		ELSE ROUND(`Sit_Reach` / 5 * 100) 
		END AS persensitreach 
		FROM
		`military_health` 
		LEFT JOIN `profile` 
		ON `profile`.`ID_User` = `military_health`.`ID_User` 
		WHERE `military_health`.`ID_User` = '".$iduser."' 
		AND `Start_Date` = 
		(SELECT 
		MAX(`Start_Date`) 
		FROM
		`military_health` WHERE `military_health`.`ID_User` = '".$iduser."')
		";
		$emp = $this->db->query($query);
		return $emp->row();
	}

	function getprofile($id_user)
	{
		$query = "SELECT `NRP/NBI` AS nrp, profile.* FROM `profile` WHERE `ID_User` = " . $id_user;
		$emp = $this->db->query($query);
		return $emp->row();
	}

	public function getmilitaryhealthall($value='')
	{
		$query	= "SELECT 
  * 
		FROM
		`military_health` 
		LEFT JOIN `profile` 
		ON `profile`.`ID_User` = `military_health`.`ID_User` 
		ORDER BY `Start_Date` ASC ";
		$emp = $this->db->query($query);
		return $emp->result_array();

	}

	public function getmilitaryhealthuser($id_user)
	{
		$query	= "SELECT * FROM `military_health`
		LEFT JOIN `profile` ON `profile`.`ID_User` = `military_health`.`ID_User`
		WHERE `military_health`.`ID_User` = '". $id_user."'
		ORDER BY Start_Date DESC" ;
		$emp = $this->db->query($query);
		return $emp->result_array();

	}

	public function getmilitaryhealthbawahan($id_atasan)
	{
		$query	= "SELECT 
 		 * 
		FROM
		`military_health` 
		LEFT JOIN `profile` 
		ON `profile`.`ID_User` = `military_health`.`ID_User` 
		WHERE `profile`.`ID_Atasan` =  '". $id_atasan ."'
		ORDER BY Start_Date DESC" ;
		$emp = $this->db->query($query);
		return $emp->result_array();

	}

	public function getmilitaryhealthuserdetail($id)
	{
		$query	= "SELECT 
		`military_health`.*,
		CASE
		WHEN `Lari` >= 20 
		THEN 'Excellent' 
		WHEN `Lari` >= 15 
		THEN 'Good' 
		ELSE 'Average' 
		END AS remark_lari,
		CASE
		WHEN `Sit_up` >= 45 
		THEN 'Excellent' 
		WHEN `Sit_up` >= 39 
		THEN 'Good' 
		ELSE 'Average' 
		END AS remark_situp,
		CASE
		WHEN `Push_up` >= 47 
		THEN 'Excellent' 
		WHEN `Push_up` >= 39 
		THEN 'Good' 
		ELSE 'Average' 
		END AS remark_pushup,
		CASE
		WHEN `Pull_up` >= 35 
		THEN 'Excellent' 
		WHEN `Pull_up` >= 30 
		THEN 'Good' 
		ELSE 'Average' 
		END AS remark_pullup,
		CASE
		WHEN `Squat` >= 33 
		THEN 'Excellent' 
		WHEN `Squat` >= 31 
		THEN 'Good' 
		ELSE 'Average' 
		END AS remark_squat,
		CASE
		WHEN `Vertical_jump` >= 75 
		THEN 'Excellent' 
		WHEN `Vertical_jump` >= 65 
		THEN 'Good' 
		ELSE 'Average' 
		END AS remark_verjump,
		CASE
		WHEN `Step` <= 80 
		THEN 'Excellent' 
		WHEN `Step` <= 89 
		THEN 'Good' 
		ELSE 'Average' 
		END AS remark_step,
		CASE
		WHEN `Sit_Reach` >= 22 
		THEN 'Excellent' 
		WHEN `Sit_Reach` >= 11 
		THEN 'Good' 
		ELSE 'Average' 
		END AS remark_sitreach,
		`profile`.* 
		FROM `military_health`
		LEFT JOIN `profile` ON `profile`.`ID_User` = `military_health`.`ID_User`
		WHERE `military_health`.`ID_MH` = " . $id;
		$emp = $this->db->query($query);
		return $emp->row();

	}

	public function getcountry()
	{

		$query	= "select * from `country`";
		$emp = $this->db->query($query);
		return $emp->result_array();

	}

	public function getcountrydetail($ID_Country)
	{

		$query	= "SELECT 
		* 
		FROM
		`country` c 
		LEFT JOIN `manpower` m 
		ON m.`ID_Country` = c.`ID_Country` 
		LEFT JOIN `airpower` a 
		ON a.`ID_Airpower` = c.`ID_Country` 
		LEFT JOIN `landforces` l 
		ON l.`ID_Country` = c.`ID_Country` 
		LEFT JOIN `navalforces` n 
		ON n.`ID_Country` = c.`ID_Country` 
		LEFT JOIN `geography` g 
		ON g.`ID_Country` = c.`ID_Country` 
		WHERE c.`ID_Country` =  " . $ID_Country;
		$emp = $this->db->query($query);
		return $emp;

	}

	public function EvaluasiList($value='')
	{
		$query	= "SELECT 
		MONTHNAME(`Start_Date`) AS bulan,
		MONTH(`Start_Date`) AS bulan_angka,
		COUNT(`Start_Date`) AS JMl_MH,
		`military_health`.*,
		`profile`.*,
		ROUND(
		SUM(
		ROUND(
		(
		ROUND((`Lari` / 15) * 100) + ROUND((`Sit_up` / 39) * 100) + ROUND((`Push_up` / 39) * 100) + ROUND((`Pull_up` / 30) * 100) + ROUND((`Squat` / 31) * 100) + ROUND((`Vertical_jump` / 65) * 100) + ROUND((`Step` / 89) * 100) + ROUND((`Sit_Reach` / 11) * 100)
		) / 7
		)
		) / 4, 2
		) AS hasil_evaluasi
		FROM
		`military_health` 
		LEFT JOIN `profile` 
		ON `profile`.`ID_User` = `military_health`.`ID_User` 
		WHERE `Status` = 'Approved' 
		GROUP BY `military_health`.`ID_User`,
		MONTH(`Start_Date`) 
		HAVING COUNT(`Start_Date`) >= 4 " ;
		$emp = $this->db->query($query);
		return $emp->result_array();

	}

	public function EvaluasiListbawahan($id_user)
	{
		$query	= "SELECT 
		MONTHNAME(`Start_Date`) AS bulan,
		MONTH(`Start_Date`) AS bulan_angka,
		COUNT(`Start_Date`) AS JMl_MH,
		`military_health`.*,
		`profile`.*,
		ROUND(
		SUM(
		ROUND(
		(
		ROUND((`Lari` / 15) * 100) + ROUND((`Sit_up` / 39) * 100) + ROUND((`Push_up` / 39) * 100) + ROUND((`Pull_up` / 30) * 100) + ROUND((`Squat` / 31) * 100) + ROUND((`Vertical_jump` / 65) * 100) + ROUND((`Step` / 89) * 100) + ROUND((`Sit_Reach` / 11) * 100)
		) / 7
		)
		) / 4, 2
		) AS hasil_evaluasi
		FROM
		`military_health` 
		LEFT JOIN `profile` 
		ON `profile`.`ID_User` = `military_health`.`ID_User` 
		WHERE `Status` = 'Approved' AND `ID_Atasan` = '".$id_user."'
		GROUP BY `military_health`.`ID_User`,
		MONTH(`Start_Date`) 
		HAVING COUNT(`Start_Date`) >= 4 " ;
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function EvaluasiList_User($id_user)
	{
		$query	= "SELECT 
		MONTHNAME(`Start_Date`) AS bulan,
		MONTH(`Start_Date`) AS bulan_angka,
		COUNT(`Start_Date`) AS JMl_MH,
		`military_health`.* 
		FROM
		`military_health` 
		WHERE `Status` = 'Approved' 
		AND `ID_User` = '".$id_user."'
		GROUP BY `ID_User`,
		MONTH(`Start_Date`) 
		HAVING COUNT(`Start_Date`) >= 4 " ;
		$emp = $this->db->query($query);
		return $emp->result_array();

	}

	public function Hasilevaluasi($id_user,$bulan)
	{
		$query	= "SELECT 
		MONTHNAME(`Start_Date`) AS bulan,
		MONTH(`Start_Date`) AS bulan_angka,
		`military_health`.*,
		`profile`.*,
		ROUND((`Lari` / 15) * 100) AS persen_lari,
		ROUND((`Sit_up` / 39) * 100) AS persen_situp,
		ROUND((`Push_up` / 39) * 100) AS persen_pushup,
		ROUND((`Pull_up` / 30) * 100) AS persen_pullup,
		ROUND((`Squat` / 31) * 100) AS persen_squat,
		ROUND((`Vertical_jump` / 65) * 100) AS persen_verjump,
		ROUND((`Step` / 89) * 100) AS persen_step,
		ROUND((`Sit_Reach` / 11) * 100) AS persen_sitreach,
		ROUND(
		(
		ROUND((`Lari` / 15) * 100) + ROUND((`Sit_up` / 39) * 100) + ROUND((`Push_up` / 39) * 100) + ROUND((`Pull_up` / 30) * 100) + 
		ROUND((`Squat` / 31) * 100) + ROUND((`Vertical_jump` / 65) * 100) + ROUND((`Step` / 89) * 100) + ROUND((`Sit_Reach` / 11) * 100)
		) / 7
		) AS totalpersen_week   
		FROM
		`military_health` 
		LEFT JOIN `profile` ON `profile`.`ID_User` = `military_health`.`ID_User`
		WHERE `Status` = 'Approved' 
		AND `military_health`.`ID_User` = '".$id_user."'
		AND MONTH(`Start_Date`) = '".$bulan."'
		" ;
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	//Dashboard 

	public function gettop10country()
	{

		$query	= "select * from `country` limit 10";
		$emp = $this->db->query($query);
		return $emp->result_array();

	}

	public function getmhapproved($value='')
	{
		$query	= "SELECT COUNT(*) AS jml_approved FROM `military_health` WHERE `Status` = 'Approved'";
		$emp = $this->db->query($query);
		return $emp->row();
	}

	public function getercomplete($value='')
	{
		$query	= "SELECT COUNT(*) AS jml_complete FROM `emergency_calls` WHERE `Status` = 'Completed'";
		$emp = $this->db->query($query);
		return $emp->row();
	}

	public function getdcnew($value='')
	{
		$query	= "SELECT COUNT(*) AS jml_new FROM `doctor_consultation` WHERE `Status` = 'New'";
		$emp = $this->db->query($query);
		return $emp->row();
	}

	public function getmhwa($value='')
	{
		$query	= "SELECT COUNT(*) AS jml_wa FROM `military_health` WHERE `Status` = 'Waiting Approval'";
		$emp = $this->db->query($query);
		return $emp->row();
	}

	public function getmhreport($value='')
	{
		$query	= "SELECT 
		COUNT(*) AS jml_status,
		`Status`
		FROM
		`military_health` 
		GROUP BY `Status`";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function geterreport($value='')
	{
		$query	= "SELECT 
		COUNT(*) AS jml_status,
		`Status`
		FROM
		`emergency_calls` 
		GROUP BY `Status`";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	public function get_allmodulreport($value='')
	{
		$query	= "SELECT 
		'Emergency Report' AS modul,
		COUNT(*) AS jml_data 
		FROM
		`emergency_calls` 
		UNION
		SELECT 
		'Military Health' AS modul,
		COUNT(*) AS jml_data 
		FROM
		`military_health` 
		UNION
		SELECT 
		'Doctor Consultation' AS modul,
		COUNT(*) AS jml_data 
		FROM
		`doctor_consultation` ";
		$emp = $this->db->query($query);
		return $emp->result_array();
	}

	

}