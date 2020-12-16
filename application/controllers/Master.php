<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_master');
		$this->load->library('pdf');
		
		if ($this->session->userdata['logged'] == FALSE)
		{
			redirect('Login');
		}
		
	}
	

	public function FirstAid()
	{
		$data['fa'] = $this->M_master->getfirstaid();
		$this->load->view('V_header');
		$this->load->view('V_master_firstaid',$data);
		$this->load->view('V_footer');

		// print_r($data);
	}

	public function add_firstaid($value='')
	{
		$this->load->view('V_header');
		$this->load->view('V_master_firstaid_add');
		$this->load->view('V_footer');
	}

	public function added_firstaid()
	{
		$config['upload_path'] = realpath(APPPATH . '../assets/files/firstaid');
		$config['allowed_types'] 	= 'pdf|docx';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 10265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('File')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('Master/FirstAid');
		} else {
			$uploaddata = $this->upload->data();
		}

		$data = array(
			'Title' 		=> $this->input->post('Title'),
			'Description' 	=> $this->input->post('Description'),
			'File_Name'		=> $uploaddata['file_name'],
			'Created_Date' 	=> date('Y-m-d')
		);

		$result = $this->M_master->addfirstaid($data);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Master/FirstAid');

	}

	public function delete_firstaid($value='')
	{
		$id = $this->uri->segment(3);
		$sql = "Delete from first_aid_guide WHERE ID_FAG = '".$id."'";
		$this->db->query($sql);
		$this->session->set_flashdata("pesan", "Data Telah Terhapus");
		redirect('Master/FirstAid');
	}

	public function edit_firstaid($value='')
	{
		$id = $this->uri->segment(3);
		$data['fa'] = $this->M_master->getfirstaiddetail($id);
		$this->load->view('V_header');
		$this->load->view('V_master_firstaid_edit',$data);
		$this->load->view('V_footer');
	}

	public function edited_firstaid()
	{
		$id = $this->uri->segment(3);

		$config['upload_path'] = realpath(APPPATH . '../assets/files/firstaid');
		$config['allowed_types'] 	= 'pdf|docx';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 10265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('File')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('Master/FirstAid');
		} else {
			$uploaddata = $this->upload->data();
		}

		$data = array(
			'Title' 		=> $this->input->post('Title'),
			'Description' 	=> $this->input->post('Description'),
			'File_Name'		=> $uploaddata['file_name'],
			'Created_Date' 	=> date('Y-m-d')
		);

		$result = $this->M_master->editfirstaid($data, $id);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Master/FirstAid');

	}

	public function SurvivalGuide()
	{
		$data['sg'] = $this->M_master->getsurvivalguide();
		$this->load->view('V_header');
		$this->load->view('V_master_survivalguide',$data);
		$this->load->view('V_footer');
	}

	public function add_survivalguide($value='')
	{
		$this->load->view('V_header');
		$this->load->view('V_master_survivalguide_add');
		$this->load->view('V_footer');
	}

	public function added_survivalguide()
	{
		$config['upload_path'] = realpath(APPPATH . '../assets/files/survivalguide');
		$config['allowed_types'] 	= 'pdf|docx';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 10265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('File')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('Master/SurvivalGuide');
		} else {
			$uploaddata = $this->upload->data();
		}

		$data = array(
			'Title' 		=> $this->input->post('Title'),
			'Description' 	=> $this->input->post('Description'),
			'File_Name'		=> $uploaddata['file_name'],
			'Created_Date' 	=> date('Y-m-d')
		);

		$result = $this->M_master->addsurvivalguide($data);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Master/SurvivalGuide');

	}

	public function delete_survivalguide($value='')
	{
		$id = $this->uri->segment(3);
		$sql = "Delete from survival_guide_military WHERE ID_SGM = '".$id."'";
		$this->db->query($sql);
		$this->session->set_flashdata("pesan", "Data Telah Terhapus");
		redirect('Master/SurvivalGuide');
	}


	public function edit_survivalguide($value='')
	{
		$id = $this->uri->segment(3);
		$data['sg'] = $this->M_master->getsurvivalguidedetail($id);
		$this->load->view('V_header');
		$this->load->view('V_master_survivalguide_edit', $data);
		$this->load->view('V_footer');
	}

	public function edited_survivalguide()
	{
		$id = $this->uri->segment(3);

		$config['upload_path'] = realpath(APPPATH . '../assets/files/survivalguide');
		$config['allowed_types'] 	= 'pdf|docx';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 10265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('File')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('Master/SurvivalGuide');
		} else {
			$uploaddata = $this->upload->data();
		}

		$data = array(
			'Title' 		=> $this->input->post('Title'),
			'Description' 	=> $this->input->post('Description'),
			'File_Name'		=> $uploaddata['file_name'],
			'Created_Date' 	=> date('Y-m-d')
		);

		$result = $this->M_master->editsurvivalguide($data, $id);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Master/SurvivalGuide');

	}


	public function Profile()
	{
		$data['pf'] = $this->M_master->getprofile();
		$this->load->view('V_header');
		$this->load->view('V_master_profile',$data);
		$this->load->view('V_footer');
	}

	public function add_profile($value='')
	{
		$this->load->view('V_header');
		$this->load->view('V_master_profile_add');
		$this->load->view('V_footer');
	}

	public function added_profile($value='')
	{
		$data = array(
			'Nama' 		=> $this->input->post('Nama'),
			'Tempat_Lahir' 	=> $this->input->post('Tempat_Lahir'),
			'Tanggal_Lahir'		=> $this->input->post('Tanggal_Lahir'),
			'Pangkat/Korps'		=> $this->input->post('Pangkat'),
			'NRP/NBI'		=> $this->input->post('NRP'),
			'Jabatan'		=> $this->input->post('Jabatan'),
			// 'Kesatuan'		=> $this->input->post('Kesatuan'),
			'Gol_Darah'		=> $this->input->post('Gol_darah'),
			'Email'		=> $this->input->post('Email'),
			'Password'		=> $this->input->post('Password'),
			'Role'		=> 'User',
		);

		// print_r($data);

		$result = $this->M_master->addprofile($data);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Master/Profile');
	}

	public function edit_profile($value='')
	{
		$id = $this->uri->segment(3);
		$data['pf'] = $this->M_master->getprofiledetail($id);
		$this->load->view('V_header');
		$this->load->view('V_master_profile_edit',$data);
		$this->load->view('V_footer');
	}

	public function edited_profile($value='')
	{
		$id = $this->uri->segment(3);
		$data = array(
			'Nama' 		=> $this->input->post('Nama'),
			'Tempat_Lahir' 	=> $this->input->post('Tempat_Lahir'),
			'Tanggal_Lahir'		=> $this->input->post('Tanggal_Lahir'),
			'Pangkat/Korps'		=> $this->input->post('Pangkat'),
			'NRP/NBI'		=> $this->input->post('NRP'),
			'Jabatan'		=> $this->input->post('Jabatan'),
			// 'Kesatuan'		=> $this->input->post('Kesatuan'),
			'Gol_Darah'		=> $this->input->post('Gol_darah'),
			'Email'		=> $this->input->post('Email'),
			'Password'		=> $this->input->post('Password'),
		);

		// print_r($data);

		$result = $this->M_master->editprofile($data,$id);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('Master/Profile');
	}


	public function delete_user($value='')
	{
		$id = $this->uri->segment(3);
		$sql = "Delete from profile WHERE ID_User = '".$id."'";
		$this->db->query($sql);
		$this->session->set_flashdata("pesan", "Data Telah Terhapus");
		redirect('Master/Profile');
	}

	public function detail_profile($value='')
	{
		$id = $this->uri->segment(3);
		$data['pf'] = $this->M_master->getprofiledetail($id);
		$this->load->view('V_header');
		$this->load->view('V_master_profile_detail',$data);
		$this->load->view('V_footer');
	}

	public function ExportFirstAid($value='')
	{
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/FAG/SGP/XI/2020',0,1);
		$pdf->Cell(80,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'First Aid Guide',0,1,'C');
		

		$pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		// $pdf->Cell(40,6,'Title',1,0);
		// $pdf->Cell(110,6,'Description',1,0);
		// $pdf->Cell(40,6,'Created Date',1,1);
		$pdf->SetFont('Arial','',10);
		$data['fa'] = $this->M_master->getfirstaid();
		// for ($i=0; $i < 200; $i++) { 
		// // $image1 = base_url()."/assets/". $c->image ;
			// $pdf->Cell(40,10,'abdabsdbjb', 1, 0);
			// $pdf->Cell(80,10,'abdabsdbjb',1,0);
			// $pdf->Cell(40,10,'abdabsdbjb',1,1);
		// 	$pdf->Cell(25,10,'abdabsdbjb',1,1); 
		// }
	// $pdf->Footer();
		foreach ($data['fa'] as $c){
			$pdf->SetFont('Arial','B',10);
			$pdf->Write(10, 'Title : ');
			$pdf->SetFont('Arial','',10);
			$pdf->Write(10, $c['Title']);
			$pdf->Ln(6);
			$pdf->SetFont('Arial','B',10);
			$pdf->Write(10, 'Created Date : ');
			$pdf->SetFont('Arial','',10);
			$pdf->Write(10, $c['Created_Date']);
			$pdf->Ln(6);
			$pdf->SetFont('Arial','B',10);
			$pdf->Write(10, 'Description : ');
			$pdf->SetFont('Arial','',10);
			$pdf->Ln(8);
			$pdf->MultiCell(180, 6, $c['Description']);
			$pdf->Ln(10);
		}
		$pdf->Output();
	}

	public function ExportSurvivalGuide($value='')
	{
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/SGM/SGP/XI/2020',0,1);
		$pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'Survival Guide Military',0,1,'C');
		

		$pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		// $pdf->SetFont('Arial','B',10);
		// $pdf->Cell(40,6,'Title',1,0);
		// $pdf->Cell(110,6,'Description',1,0);
		// $pdf->Cell(40,6,'Created Date',1,1);
		$pdf->SetFont('Arial','',10);
		$data['sg'] = $this->M_master->getsurvivalguide();
		// for ($i=0; $i < 200; $i++) { 
		// // $image1 = base_url()."/assets/". $c->image ;
			// $pdf->Cell(40,10,'abdabsdbjb', 1, 0);
			// $pdf->Cell(80,10,'abdabsdbjb',1,0);
			// $pdf->Cell(40,10,'abdabsdbjb',1,1);
		// 	$pdf->Cell(25,10,'abdabsdbjb',1,1); 
		// }
		// $pdf->Footer();
		foreach ($data['sg'] as $c){
			$pdf->SetFont('Arial','B',10);
			$pdf->Write(10, 'Title : ');
			$pdf->SetFont('Arial','',10);
			$pdf->Write(10, $c['Title']);
			$pdf->Ln(6);
			$pdf->SetFont('Arial','B',10);
			$pdf->Write(10, 'Created Date : ');
			$pdf->SetFont('Arial','',10);
			$pdf->Write(10, $c['Created_Date']);
			$pdf->Ln(6);
			$pdf->SetFont('Arial','B',10);
			$pdf->Write(10, 'Description : ');
			$pdf->SetFont('Arial','',10);
			$pdf->Ln(8);
			$pdf->MultiCell(180, 6, $c['Description']);
			$pdf->Ln(10); 
		}
		$pdf->Output();
	}

	public function ExportProfile($value='')
	{
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/USR/SGP/XI/2020',0,1);
		$pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'Profile',0,1,'C');
		

		// $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat



		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(50,6,'Name',1,0);
		$pdf->Cell(40,6,'TTL',1,0);
		$pdf->Cell(40,6,'NRP/NBI',1,0);
		$pdf->Cell(50,6,'Email',1,1);
		$pdf->SetFont('Arial','',10);
		$data['pf'] = $this->M_master->getprofile();
		// // for ($i=0; $i < 200; $i++) { 
		// // // $image1 = base_url()."/assets/". $c->image ;
		// 	// $pdf->Cell(40,10,'abdabsdbjb', 1, 0);
		// 	// $pdf->Cell(80,10,'abdabsdbjb',1,0);
		// 	// $pdf->Cell(40,10,'abdabsdbjb',1,1);
		// // 	$pdf->Cell(25,10,'abdabsdbjb',1,1); 
		// // }
		// // $pdf->Footer();
		foreach ($data['pf'] as $c){
			$pdf->Cell(50,6,$c['Nama'],1,0);
			$pdf->Cell(40,6,$c['Tempat_Lahir'].','. $c['Tanggal_Lahir'],1,0);
			$pdf->Cell(40,6,$c['NRP/NBI'],1,0);
			$pdf->Cell(50,6,$c['Email'],1,1);
		}

		$pdf->Output();
	}

}
