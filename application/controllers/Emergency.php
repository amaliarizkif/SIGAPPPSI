<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emergency extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_emergency');
		$this->load->library('pdf');

		if ($this->session->userdata['logged'] == FALSE)
		{
			redirect('Login');
		}


	}

	public function EmergencyCall($value='')
	{
		// $iduser =  $this->session->userdata['ID_User'];
		$data['ec'] = $this->M_emergency->getemergencycall();
		$this->load->view('V_header');
		$this->load->view('V_emergency',$data);
		$this->load->view('V_footer');
	}

	public function EmergencyCallUser($value='')
	{
		$this->load->view('V_header');
		$this->load->view('V_emergency_add');
		$this->load->view('V_footer');
	}

	public function added_emergencycall($value='')
	{
		
		$config['upload_path'] = realpath(APPPATH . '../assets/files/emergencycall');
		$config['allowed_types'] 	= 'png|jpg|jpeg|gif';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 10265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('File')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('Emergency/EmergencyCall');
		} else {
			$uploaddata = $this->upload->data();
		}

		$data = array(
			'ID_User' 		=> $this->session->userdata['ID_User'],
			'Summary' 	=> $this->input->post('Summary'),
			'Latitude' 	=> $this->input->post('Latitude'),
			'Longitude' 	=> $this->input->post('Longtitude'),
			'Evidence'		=> $uploaddata['file_name'],
			'Status' 	=> 'Submitted',
			'Solved_By' => '6',
			'Date' 	=> date('Y-m-d')
		);

		// print_r($data);

		$result = $this->M_emergency->addemergencycall($data);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Emergency/EmergencyCall');
	}

	public function EmergencyCallAccept($value='')
	{
		$id = $this->uri->segment(3);
		$data = array(
			'Status' 	=> 'In Progress',
		);

		$result = $this->M_emergency->editemergencycall($data,$id);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Emergency/EmergencyCall');
	}

	public function EmergencyCallSolve($value='')
	{
		$this->load->view('V_header');
		$this->load->view('V_emergency_solved');
		$this->load->view('V_footer');
	}

	public function added_emergencycallsolved()
	{
		$id = $this->uri->segment(3);

		$config['upload_path'] = realpath(APPPATH . '../assets/files/emergencycall');
		$config['allowed_types'] 	= 'png|jpg|jpeg|gif';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 10265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('File')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('Emergency/EmergencyCall');
		} else {
			$uploaddata = $this->upload->data();
		}

		$data = array(
			'Solved_Summary' 	=> $this->input->post('Summary'),
			'Solved_Evidence'		=> $uploaddata['file_name'],
			'Status' 	=> 'Completed',
		);

		// print_r($data);

		$result = $this->M_emergency->editemergencycall($data,$id);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Emergency/EmergencyCall');
	}

	public function EmergencyDetail($value='')
	{
		$id = $this->uri->segment(3);
		$data['ec'] = $this->M_emergency->getemergencycalldetail($id);
		$this->load->view('V_header');
		$this->load->view('V_emergency_detail',$data);
		$this->load->view('V_footer');
	}

	public function DoctorConsultation($value='')
	{
		
		$this->load->view('V_header');
		if ($this->session->userdata['Role'] == 'Dokter') {
			$data['dc'] = $this->M_emergency->getdoctorconcultation_doctor($this->session->userdata['ID_Dokter']);
			$this->load->view('V_doctor_consultation_doctor',$data);
		}else{
			$data['dc'] = $this->M_emergency->getdoctorconcultation();
			$this->load->view('V_doctor_consultation',$data);
		}
		
		$this->load->view('V_footer');
	}

	public function AddDC($value='')
	{
		$data['d'] = $this->M_emergency->getdoctor();
		$this->load->view('V_header');
		$this->load->view('V_doctor_consultation_add',$data);
		$this->load->view('V_footer');
	}

	public function detaildocconsul($id)
	{
		$data = $this->M_emergency->getdoctorconcultationdetail($id);
		echo json_encode($data);
	}

	public function edit_doctorconsul($ID_DC)
	{
		$data['dc'] = $this->M_emergency->getdoctorconcultationdetail($ID_DC);
		$this->load->view('V_header');
		$this->load->view('V_doctor_consultation_edit',$data);
		$this->load->view('V_footer');
	}

	public function added_doctorconsul($value='')
	{
		$config['upload_path'] = realpath(APPPATH . '../assets/files/doctorconsul');
		$config['allowed_types'] 	= 'png|jpg|jpeg|gif';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 10265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('Picture')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('Emergency/DoctorConsultation');
		} else {
			$uploaddata = $this->upload->data();
		}

		$data = array(
			'ID_User' 		=> $this->session->userdata['ID_User'],
			'Date' 	=> $this->input->post('Date'),
			'Time' => $this->input->post('Time'),
			'ID_Dokter' 	=> $this->input->post('ID_Doctor'),
			'Keluhan' 	=> $this->input->post('Keluhan'),
			'Picture'	=> $uploaddata['file_name'],
			'Status'	=> 'New'
		);

		// print_r($data);

		$result = $this->M_emergency->addeddoctorconsul($data);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Emergency/DoctorConsultation');
	}

	public function edited_doctorconsul($ID_DC)
	{
		$config['upload_path'] = realpath(APPPATH . '../assets/files/receipt');
		$config['allowed_types'] 	= 'png|jpg|jpeg|gif';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 10265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('Receipt')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('Emergency/DoctorConsultation');
		} else {
			$uploaddata = $this->upload->data();
		}

		$data = array(
			'Summary' 	=> $this->input->post('Summary'),
			'Receipt'	=> $uploaddata['file_name'],
			'Status'	=> 'Done'
		);

		// print_r($data);

		$result = $this->M_emergency->editeddoctorconsul($data, $ID_DC);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Emergency/DoctorConsultation');
	}

	public function delete_dc($value='')
	{
		$id = $this->uri->segment(3);
		$sql = "Delete from doctor_consultation WHERE ID_DC = '".$id."'";
		$this->db->query($sql);
		$this->session->set_flashdata("pesan", "Data Telah Terhapus");
		redirect('Emergency/DoctorConsultation');
	}

	function EmergencyContacts($value='')
	{
		$data['d'] = $this->M_emergency->getdoctor();
		$data['hos'] = $this->M_emergency->getemergencycontacts();
		$this->load->view('V_header');
		$this->load->view('V_emergency_contacts',$data);
		$this->load->view('V_footer');
	}

	public function ExportDC($value='')
	{
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/DC/SGP/XI/2020',0,1);
		$pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'Doctor Consultation',0,1,'C');
		

		// $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat



		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(25,6,'Tanggal',1,0);
		$pdf->Cell(40,6,'Nama',1,0);
		$pdf->Cell(75,6,'Keluhan',1,0);
		$pdf->Cell(50,6,'Dokter',1,1);
		$pdf->SetFont('Arial','',10);
		if ($this->session->userdata['Role'] == 'Dokter') {
			$data['dc'] = $this->M_emergency->getdoctorconcultation_doctor($this->session->userdata['ID_Dokter']);
		}else{
			$data['dc'] = $this->M_emergency->getdoctorconcultation();
		}
		// // for ($i=0; $i < 200; $i++) { 
		// // // $image1 = base_url()."/assets/". $c->image ;
		// 	// $pdf->Cell(40,10,'abdabsdbjb', 1, 0);
		// 	// $pdf->Cell(80,10,'abdabsdbjb',1,0);
		// 	// $pdf->Cell(40,10,'abdabsdbjb',1,1);
		// // 	$pdf->Cell(25,10,'abdabsdbjb',1,1); 
		// // }
		// // $pdf->Footer();
		foreach ($data['dc'] as $c){
			$pdf->Cell(25,6,date("d-M-Y", strtotime($c['Date'])),1,0);
			$pdf->Cell(40,6,$c['pasien'],1,0);
			$pdf->Cell(75,6,$c['Keluhan'],1,0);
			$pdf->Cell(50,6,$c['dokter'],1,1);
		}

		$pdf->Output();
	}

	public function EmergencyDetailEdit($value='')
	{
		$id = $this->uri->segment(3);
		$data['ec'] = $this->M_emergency->getemergencycalldetail($id);
		$this->load->view('V_header');
		$this->load->view('V_emergency_edit',$data);
		$this->load->view('V_footer');
	}

	public function edit_emergencycall($value='')
	{
		$id = $this->uri->segment(3);

		if ($this->input->post('File') != null) {
			$config['upload_path'] = realpath(APPPATH . '../assets/files/emergencycall');
			$config['allowed_types'] 	= 'png|jpg|jpeg|gif';
			$config['remove_spaces'] 	= TRUE;
			$config['max_size']             = 10265;
			$config['encrypt_name']			= TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('File')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata("hapus", $this->upload->display_errors());
				redirect('Emergency/EmergencyCall');
			} else {
				$uploaddata = $this->upload->data();
			}

			$data = array(

				'Summary' 	=> $this->input->post('Summary'),
				'Latitude' 	=> $this->input->post('Latitude'),
				'Longitude' 	=> $this->input->post('Longtitude'),
				'Evidence'		=> $uploaddata['file_name'],
			);

		}else{
			$data = array(
				'Summary' 	=> $this->input->post('Summary'),
				'Latitude' 	=> $this->input->post('Latitude'),
				'Longitude' 	=> $this->input->post('Longtitude'),
			);
		}

		$result = $this->M_emergency->editemergencycall($data,$id);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Emergency/EmergencyCall');
	}

	public function ExportSubmitted($value='')
	{
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/ERS/SGP/XI/2020',0,1);
		$pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'Emergency Reports Submitted',0,1,'C');
		

		// $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat



		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(25,6,'Tanggal',1,0);
		$pdf->Cell(40,6,'Reporter',1,0);
		$pdf->Cell(75,6,'Summary',1,0);
		// $pdf->Cell(50,6,'Solved By',1,1);
		$pdf->SetFont('Arial','',10);

		// if ($this->session->userdata['Role'] != 'Admin') {
		// 	$data['dc'] = $this->M_emergency->getdoctorconcultation_doctor($this->session->userdata['ID_Dokter']);
		// }else{
			$data['dc'] = $this->M_emergency->getemergencycallbystatus('Submitted');
		// }
	
		foreach ($data['dc'] as $c){
			$pdf->Cell(25,6,date("d-M-Y", strtotime($c['Date'])),1,0);
			$pdf->Cell(40,6,$c['creator'],1,0);
			$pdf->Cell(75,6,$c['Summary'],1,1);
			// $pdf->Cell(50,6,$c['solver'],1,1);
		}

		$pdf->Output();

	}

	public function ExportProgress($value='')
	{
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/ERP/SGP/XI/2020',0,1);
		$pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'Emergency Reports In Progress',0,1,'C');
		

		// $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat



		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(25,6,'Tanggal',1,0);
		$pdf->Cell(40,6,'Reporter',1,0);
		$pdf->Cell(75,6,'Summary',1,0);
		$pdf->Cell(50,6,'Solved By',1,1);
		$pdf->SetFont('Arial','',10);

		// if ($this->session->userdata['Role'] != 'Admin') {
		// 	$data['dc'] = $this->M_emergency->getdoctorconcultation_doctor($this->session->userdata['ID_Dokter']);
		// }else{
			$data['dc'] = $this->M_emergency->getemergencycallbystatus('In Progress');
		// }
	
		foreach ($data['dc'] as $c){
			$pdf->Cell(25,6,date("d-M-Y", strtotime($c['Date'])),1,0);
			$pdf->Cell(40,6,$c['creator'],1,0);
			$pdf->Cell(75,6,$c['Summary'],1,0);
			$pdf->Cell(50,6,$c['solver'],1,1);
		}

		$pdf->Output();
	}

	public function ExportComplete($value='')
	{
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/ERC/SGP/XI/2020',0,1);
		$pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'Emergency Reports Completed',0,1,'C');
		

		// $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat



		$pdf->Cell(10,7,'',0,1);
		// $pdf->SetFont('Arial','B',10);
		// $pdf->Cell(25,6,'Tanggal',1,0);
		// $pdf->Cell(40,6,'Reporter',1,0);
		// $pdf->Cell(75,6,'Summary',1,0);
		// $pdf->Cell(50,6,'Solved By',1,1);
		// $pdf->SetFont('Arial','',10);

		// if ($this->session->userdata['Role'] != 'Admin') {
		// 	$data['dc'] = $this->M_emergency->getdoctorconcultation_doctor($this->session->userdata['ID_Dokter']);
		// }else{
			$data['dc'] = $this->M_emergency->getemergencycallbystatus('Completed');
		// }
	
		foreach ($data['dc'] as $c){
			// $pdf->Cell(25,6,date("d-M-Y", strtotime($c['Date'])),1,0);
			// $pdf->Cell(40,6,$c['creator'],1,0);
			// $pdf->Cell(75,6,$c['Summary'],1,0);
			// $pdf->Cell(50,6,$c['solver'],1,1);
			$pdf->SetFont('Arial','B',10);
			$pdf->Write(10, 'Tanggal : ');
			$pdf->SetFont('Arial','',10);
			$pdf->Write(10, date("d-M-Y", strtotime($c['Date'])));
			$pdf->Ln(6);
			$pdf->SetFont('Arial','B',10);
			$pdf->Write(10, 'Reporter : ');
			$pdf->SetFont('Arial','',10);
			$pdf->Write(10, $c['creator']);
			$pdf->Ln(6);
			$pdf->SetFont('Arial','B',10);
			$pdf->Write(10, 'Solved By : ');
			$pdf->SetFont('Arial','',10);
			$pdf->Write(10, $c['solver']);
			$pdf->Ln(6);
			$pdf->SetFont('Arial','B',10);
			$pdf->Write(10, 'Summary : ');
			$pdf->SetFont('Arial','',10);
			$pdf->Ln(8);
			$pdf->MultiCell(180, 6, $c['Summary']);
			$pdf->Ln(10); 
		}

		$pdf->Output();
	}

	

}
?>