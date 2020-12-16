	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class MilitaryHealth extends CI_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('M_military');
			$this->load->library('pdf');
			if ($this->session->userdata['logged'] == FALSE)
			{
				redirect('Login');
			}
		}

		public function MilitaryHealth($value='')
		{
			if ($this->session->userdata['Role'] == 'Admin') {
				$this->HistoryMilitaryHealth();
			}else{
				$iduser = $this->session->userdata['ID_User'];
				$data['mh'] = $this->M_military->getmilitaryhealth($iduser);
				$data['p'] = $this->M_military->getprofile($iduser);
				// print_r($data);

				if ($data['mh'] == '') {

					$insert = array(
						'ID_User' 		=> $this->session->userdata['ID_User'],
						'Start_Date' 	=> date('Y-m-d'),
						'Status' 		=> 'New',
					);

					$result = $this->M_military->addedmilitary($insert);

					$data['mh'] = $this->M_military->getmilitaryhealth($iduser);
					$this->load->view('V_header');
					$this->load->view('V_militaryhealth_progress',$data);
					$this->load->view('V_footer');


					
				}else{

					$date1 = str_replace('-', '/', $data['mh']->Start_Date);
					$tomorrow = date('d-m-Y',strtotime($date1 . "+7 days"));

					if (date('d-m-Y') >= $tomorrow && $data['mh']->End_Date == null) {
						$dataupdate = array(
							'End_Date' 	=> date('Y-m-d'),
							'Status'	=> 'Waiting Approval'
						);
						$result = $this->M_military->updatemilitary($dataupdate, $data['mh']->ID_MH);
						$this->load->view('V_header');
						$this->load->view('V_militaryhealth_progress',$data);
						$this->load->view('V_footer');

					}else {

						$this->load->view('V_header');
						$this->load->view('V_militaryhealth_progress',$data);
						$this->load->view('V_footer');

					}
				}
				
			}
		}

		public function HistoryMilitaryHealth($value='')
		{

			if ($this->session->userdata['Role'] == 'Admin') {
				$data['mh'] = $this->M_military->getmilitaryhealthall();
			}else{
				$iduser = $this->session->userdata['ID_User'];
				$data['mh'] = $this->M_military->getmilitaryhealthuser($iduser);
			}
			$this->load->view('V_header');
			$this->load->view('V_militaryhealth_history',$data);
			$this->load->view('V_footer');
			
			// print_r($data);
		}

		public function MilitaryEvaluation($value='')
		{
			if ($this->session->userdata['Role'] == 'Admin' ) {
				$data['mh'] = $this->M_military->EvaluasiList();
			}else{
				$iduser = $this->session->userdata['ID_User'];
				if ($this->session->userdata['ID_Atasan'] == null) {
					$data['mh'] = $this->M_military->EvaluasiListbawahan($iduser);
				}else{
					$data['mh'] = $this->M_military->EvaluasiList_User($iduser);
				}
				
				
			}
			$this->load->view('V_header');
			$this->load->view('V_militaryhealth_evaluasi',$data);
			$this->load->view('V_footer');
		}

		public function UpdateMonitoring($value='')
		{
			$id_mh = $this->uri->segment(3);

			if ($id_mh == null) {
				$iduser = $this->session->userdata['ID_User'];
				$data['mh'] = $this->M_military->getmilitaryhealth($iduser);
			}else{
				$data['mh'] = $this->M_military->getmilitaryhealthuserdetail($id_mh);
			}

			// print_r($id_mh);

			$this->load->view('V_header');

			if ($data['mh']->Start_Date != null) {
				$this->load->view('V_militaryhealth_edit',$data);
			}else{
				$this->load->view('V_militaryhealth_update');
			}
			
			$this->load->view('V_footer');
		}

		public function added_military($value='')
		{
			$data = array(
				'ID_User' 		=> $this->session->userdata['ID_User'],
				'Start_Date' 	=> date('Y-m-d'),
				'Sit_up' 		=> $this->input->post('Sit_up'),
				'Lari' 			=> $this->input->post('Lari'),
				'Pull_up'		=> $this->input->post('Pull_up'),
				'Push_up' 		=> $this->input->post('Push_up'),
			);

			// print_r($data);

			$result = $this->M_military->addedmilitary($data);
			$this->session->set_flashdata("pesan", "Data saved successfully ");
			redirect('MilitaryHealth/MilitaryHealth');
		}

		public function updated_military($value='')
		{
			$iduser = $this->session->userdata['ID_User'];
			$data['mh'] = $this->M_military->getmilitaryhealth($iduser);

			if ($this->input->post('Sit_up') >= 34 && 
				$this->input->post('Lari') >= 10 && 
				$this->input->post('Pull_up') >= 25 && 
				$this->input->post('Push_up') >= 24 &&
				$this->input->post('Squat') >= 25 && 
				$this->input->post('Ver_jump') >= 45 && 
				$this->input->post('Step') >= 107 && 
				$this->input->post('Sit_Reach') >= 5) {
				$dataupdate = array(

					'End_Date' 		=> date('Y-m-d'),
					'Sit_up' 		=> $this->input->post('Sit_up'),
					'Lari' 			=> $this->input->post('Lari'),
					'Pull_up'		=> $this->input->post('Pull_up'),
					'Push_up' 		=> $this->input->post('Push_up'),
					'Squat' 		=> $this->input->post('Squat'),
					'Vertical_jump' => $this->input->post('Ver_jump'),
					'Step'			=> $this->input->post('Step'),
					'Sit_Reach' 	=> $this->input->post('Sit_Reach'),
				);
		}else{

			$dataupdate = array(
				'Sit_up' 		=> $this->input->post('Sit_up'),
				'Lari' 			=> $this->input->post('Lari'),
				'Pull_up'		=> $this->input->post('Pull_up'),
				'Push_up' 		=> $this->input->post('Push_up'),
				'Squat' 		=> $this->input->post('Squat'),
				'Vertical_jump' => $this->input->post('Ver_jump'),
				'Step'			=> $this->input->post('Step'),
				'Sit_Reach' 	=> $this->input->post('Sit_Reach'),
			);

		}



			// print_r($dataupdate);

		$result = $this->M_military->updatemilitary($dataupdate, $data['mh']->ID_MH);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('MilitaryHealth/MilitaryHealth');
	}

	public function UploadMedicalCheckup($value='')
	{
		$iduser = $this->session->userdata['ID_User'];
		$data['mh'] = $this->M_military->getmilitaryhealth($iduser);

		$config['upload_path'] = realpath(APPPATH . '../assets/files/medicalcheckup');
		$config['allowed_types'] 	= 'pdf|jpg|png|jpeg';
		$config['remove_spaces'] 	= TRUE;
		$config['max_size']             = 20265;
		$config['encrypt_name']			= TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('medicalcheckup')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata("hapus", $this->upload->display_errors());
			redirect('MilitaryHealth/MilitaryHealth');
		} else {
			$uploaddata = $this->upload->data();
		}

		$dataupdate = array(
			'Report_Medical_Checkup' 		=> $uploaddata['file_name'],
		);

		$result = $this->M_military->updatemilitary($dataupdate, $data['mh']->ID_MH);
		$this->session->set_flashdata("pesan", "Data saved successfully ");
		redirect('MilitaryHealth/MilitaryHealth');
	}

	public function exportpdf($value='')
	{
		$pdf = new FPDF('P','mm','A4');
	        // membuat halaman baru
		$pdf->AddPage();
	        // setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',16);
	        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'Data Contact',0,1,'C');
		$pdf->SetFont('Arial','B',12);
	        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
	        // Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(40,6,'Image',1,0);
		$pdf->Cell(85,6,'Name',1,0);
		$pdf->Cell(40,6,'Address',1,0);
		$pdf->Cell(25,6,'Phone',1,1);
		$pdf->SetFont('Arial','',10);
	        // $mahasiswa = $this->db->get('mahasiswa')->result();
		for ($i=0; $i < 200; $i++) { 
			// $image1 = base_url()."/assets/". $c->image ;
			$pdf->Cell(40,10,'abdabsdbjb', 1, 0);
			$pdf->Cell(85,10,'abdabsdbjb',1,0);
			$pdf->Cell(40,10,'abdabsdbjb',1,0);
			$pdf->Cell(25,10,'abdabsdbjb',1,1); 
		}

		$pdf->Output();
	}

	public function SubmitMH($id_mh)
	{
		$dataupdate = array(
			'Status' 	=> 'Waiting Approval',
		);
		$result = $this->M_military->updatemilitary($dataupdate, $id_mh);
		redirect('MilitaryHealth/HistoryMilitaryHealth');
	}

	public function detailmh($id)
	{
		$data = $this->M_military->getmilitaryhealthuserdetail($id);
		echo json_encode($data);
	}

	public function ApprovalMilitaryHealth($value='')
	{
		if ($this->session->userdata['Role'] == 'Admin') {
			$data['mh'] = $this->M_military->getmilitaryhealthall();
		}else{
			$iduser = $this->session->userdata['ID_User'];
			$data['mh'] = $this->M_military->getmilitaryhealthbawahan($iduser);
		}
		$this->load->view('V_header');
		$this->load->view('V_militaryhealth_Approval',$data);
		$this->load->view('V_footer');
	}

	public function ApprovalMH($id_mh)
	{
		$dataupdate = array(
			'Status' 	=> 'Approved',
		);
		$result = $this->M_military->updatemilitary($dataupdate, $id_mh);
		redirect('MilitaryHealth/ApprovalMilitaryHealth');
	}

	public function DownloadMonitoring($id_mh)
	{

		$data['mh'] = $this->M_military->getmilitaryhealthuserdetail($id_mh);
		// $pdf = new FPDF('P','mm','A4');
  //       // membuat halaman baru
		// $pdf->AddPage();
  //       // setting jenis font yang akan digunakan

		// $pdf->SetFont('Arial','',10);

		// $pdf->Cell(40,6,'No. Surat	: 001/MH/SGP/XI/2020',0,1);
		// $pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		// $pdf->Cell(40,6,'Lampiran	: -',0,1);

		// $pdf->SetFont('Arial','B',16);
  //       // mencetak string 
		// // $pdf->header();
		// $pdf->Cell(190,7,'Military Health',0,1,'C');

		// $pdf->Output();
		$this->load->view('V_header');
		$this->load->view('V_militaryhealth_Approvaldwnl',$data);
		$this->load->view('V_footer');
	}

	public function DetailEvaluasi($id_user,$bulan)
	{
		$data['mh'] = $this->M_military->Hasilevaluasi($id_user, $bulan);
		$this->load->view('V_header');
		$this->load->view('V_militaryhealth_hasilevaluasi',$data);
		$this->load->view('V_footer');
	}

	public function ReportEvaluasi($id_user,$bulan)
	{
		$mh = $this->M_military->Hasilevaluasi($id_user, $bulan);
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/MHE/SGP/XI/2020',0,1);
		$pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'Hasil Evaluasi Periode ' . $mh[0]['bulan'], 0,1,'C');
		$pdf->ln(5);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(95,7,'Minggu I',0,0,'');
		$pdf->Cell(95,7,'Minggu II',0,1,'');
		$pdf->ln(5);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Samapta A',0,0,'');
		$pdf->Cell(95,7,'Samapta A',0,1,'');
		$pdf->SetFont('Arial','',12);

		$pdf->Cell(40,7,'Lari : ' . $mh[0]['Lari'],0,0,'');
		$pdf->Cell(55,7,$mh[0]['persen_lari'] .'%',0,0,'');
		$pdf->Cell(40,7,'Lari : ' . $mh[1]['Lari'],0,0,'');
		$pdf->Cell(55,7,$mh[1]['persen_lari'].'%',0,1,'');

		$pdf->ln(2);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Samapta B',0,0,'');
		$pdf->Cell(95,7,'Samapta B',0,1,'');
		$pdf->SetFont('Arial','',12);

		$pdf->Cell(40,7,'Sit Up : ' . $mh[0]['Sit_up'],0,0,'');
		$pdf->Cell(55,7,$mh[0]['persen_situp'] .'%',0,0,'');
		$pdf->Cell(40,7,'Sit Up : ' . $mh[1]['Sit_up'],0,0,'');
		$pdf->Cell(55,7,$mh[1]['persen_situp'].'%',0,1,'');

		$pdf->Cell(40,7,'Push Up : ' . $mh[0]['Push_up'],0,0,'');
		$pdf->Cell(55,7,$mh[0]['persen_pushup'] .'%',0,0,'');
		$pdf->Cell(40,7,'Push up : ' . $mh[1]['Push_up'],0,0,'');
		$pdf->Cell(55,7,$mh[1]['persen_pushup'].'%',0,1,'');

		$pdf->Cell(40,7,'Pull Up : ' . $mh[0]['Pull_up'],0,0,'');
		$pdf->Cell(55,7,$mh[0]['persen_pullup'] .'%',0,0,'');
		$pdf->Cell(40,7,'Pull Up : ' . $mh[1]['Pull_up'],0,0,'');
		$pdf->Cell(55,7,$mh[1]['persen_pullup'].'%',0,1,'');

		$pdf->Cell(40,7,'Squat : ' . $mh[0]['Squat'],0,0,'');
		$pdf->Cell(55,7,$mh[0]['persen_squat'] .'%',0,0,'');
		$pdf->Cell(40,7,'Squat : ' . $mh[1]['Squat'],0,0,'');
		$pdf->Cell(55,7,$mh[1]['persen_squat'].'%',0,1,'');

		$pdf->Cell(40,7,'Vertical Jump : ' . $mh[0]['Vertical_jump'],0,0,'');
		$pdf->Cell(55,7,$mh[0]['persen_verjump'] .'%',0,0,'');
		$pdf->Cell(40,7,'Vertical Jump : ' . $mh[1]['Vertical_jump'],0,0,'');
		$pdf->Cell(55,7,$mh[1]['persen_verjump'].'%',0,1,'');

		$pdf->Cell(40,7,'Step : ' . $mh[0]['Step'],0,0,'');
		$pdf->Cell(55,7,$mh[0]['persen_step'] .'%',0,0,'');
		$pdf->Cell(40,7,'Step : ' . $mh[1]['Step'],0,0,'');
		$pdf->Cell(55,7,$mh[1]['persen_step'].'%',0,1,'');

		$pdf->Cell(40,7,'Sit & Reach : ' . $mh[0]['Sit_Reach'],0,0,'');
		$pdf->Cell(55,7,$mh[0]['persen_sitreach'] .'%',0,0,'');
		$pdf->Cell(40,7,'Sit & Reach : ' . $mh[1]['Sit_Reach'],0,0,'');
		$pdf->Cell(55,7,$mh[1]['persen_sitreach'].'%',0,1,'');

		$pdf->ln(2);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(40,7,'Total : ',0,0,'');
		$pdf->Cell(55,7,$mh[0]['totalpersen_week'] .'%',0,0,'');
		$pdf->Cell(40,7,'Total : ',0,0,'');
		$pdf->Cell(55,7,$mh[1]['totalpersen_week'].'%',0,1,'');

		$pdf->ln(5);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(95,7,'Minggu III',0,0,'');
		$pdf->Cell(95,7,'Minggu IV',0,1,'');
		$pdf->ln(5);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Samapta A',0,0,'');
		$pdf->Cell(95,7,'Samapta A',0,1,'');
		$pdf->SetFont('Arial','',12);

		$pdf->Cell(40,7,'Lari : ' . $mh[2]['Lari'],0,0,'');
		$pdf->Cell(55,7,$mh[2]['persen_lari'] .'%',0,0,'');
		$pdf->Cell(40,7,'Lari : ' . $mh[3]['Lari'],0,0,'');
		$pdf->Cell(55,7,$mh[3]['persen_lari'].'%',0,1,'');

		$pdf->ln(2);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Samapta B',0,0,'');
		$pdf->Cell(95,7,'Samapta B',0,1,'');
		$pdf->SetFont('Arial','',12);

		$pdf->Cell(40,7,'Sit Up : ' . $mh[2]['Sit_up'],0,0,'');
		$pdf->Cell(55,7,$mh[2]['persen_situp'] .'%',0,0,'');
		$pdf->Cell(40,7,'Sit Up : ' . $mh[3]['Sit_up'],0,0,'');
		$pdf->Cell(55,7,$mh[3]['persen_situp'].'%',0,1,'');

		$pdf->Cell(40,7,'Push Up : ' . $mh[2]['Push_up'],0,0,'');
		$pdf->Cell(55,7,$mh[2]['persen_pushup'] .'%',0,0,'');
		$pdf->Cell(40,7,'Push up : ' . $mh[3]['Push_up'],0,0,'');
		$pdf->Cell(55,7,$mh[3]['persen_pushup'].'%',0,1,'');

		$pdf->Cell(40,7,'Pull Up : ' . $mh[2]['Pull_up'],0,0,'');
		$pdf->Cell(55,7,$mh[2]['persen_pullup'] .'%',0,0,'');
		$pdf->Cell(40,7,'Pull Up : ' . $mh[3]['Pull_up'],0,0,'');
		$pdf->Cell(55,7,$mh[3]['persen_pullup'].'%',0,1,'');

		$pdf->Cell(40,7,'Squat : ' . $mh[2]['Squat'],0,0,'');
		$pdf->Cell(55,7,$mh[2]['persen_squat'] .'%',0,0,'');
		$pdf->Cell(40,7,'Squat : ' . $mh[3]['Squat'],0,0,'');
		$pdf->Cell(55,7,$mh[3]['persen_squat'].'%',0,1,'');

		$pdf->Cell(40,7,'Vertical Jump : ' . $mh[2]['Vertical_jump'],0,0,'');
		$pdf->Cell(55,7,$mh[2]['persen_verjump'] .'%',0,0,'');
		$pdf->Cell(40,7,'Vertical Jump : ' . $mh[3]['Vertical_jump'],0,0,'');
		$pdf->Cell(55,7,$mh[3]['persen_verjump'].'%',0,1,'');

		$pdf->Cell(40,7,'Step : ' . $mh[2]['Step'],0,0,'');
		$pdf->Cell(55,7,$mh[2]['persen_step'] .'%',0,0,'');
		$pdf->Cell(40,7,'Step : ' . $mh[3]['Step'],0,0,'');
		$pdf->Cell(55,7,$mh[3]['persen_step'].'%',0,1,'');

		$pdf->Cell(40,7,'Sit & Reach : ' . $mh[2]['Sit_Reach'],0,0,'');
		$pdf->Cell(55,7,$mh[2]['persen_sitreach'] .'%',0,0,'');
		$pdf->Cell(40,7,'Sit & Reach : ' . $mh[3]['Sit_Reach'],0,0,'');
		$pdf->Cell(55,7,$mh[3]['persen_sitreach'].'%',0,1,'');

		$pdf->ln(2);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(40,7,'Total : ',0,0,'');
		$pdf->Cell(55,7,$mh[2]['totalpersen_week'] .'%',0,0,'');
		$pdf->Cell(40,7,'Total : ',0,0,'');
		$pdf->Cell(55,7,$mh[3]['totalpersen_week'].'%',0,1,'');

		$hasil = round( ($mh[0]['totalpersen_week'] + $mh[3]['totalpersen_week'] + $mh[2]['totalpersen_week'] + $mh[1]['totalpersen_week']) / 4 ,2);
		if ($hasil > 100) {
			$hasil = 100;
		}else{
			$hasil;
		}

		if ($hasil >= 90) {
			$remark = 'Excellent';
		}else if($hasil >80){ 
			$remark = 'Good';
		}else{
			$remark = 'Average';
		}

		$pdf->ln(5);
		$pdf->SetFont('Arial','B',16);
		$pdf->setFillColor(255,130,40);
		$pdf->Cell(190,7,'HASIL EVALUASI : ' . $hasil .'% (' . $remark . ')', 0,1,'C',TRUE);


		$pdf->Output();
	}

	public function ExportAll($value='')
	{
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/MHEA/SGP/XI/2020',0,1);
		$pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'Evaluasi Military Health',0,1,'C');
		

		// $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat



		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(50,6,'Periode',1,0);
		$pdf->Cell(40,6,'Nama',1,0);
		$pdf->Cell(40,6,'Hasil',1,0);
		$pdf->Cell(50,6,'Remark',1,1);
		$pdf->SetFont('Arial','',10);
		$data['mh'] = $this->M_military->EvaluasiList();
		foreach ($data['mh'] as $c){

			if ($c['hasil_evaluasi'] > 100) {
				$c['hasil_evaluasi'] = 100;
			}else{
				$c['hasil_evaluasi'];
			}

			if ($c['hasil_evaluasi'] >= 90) {
				$remark = 'Excellent';
			}else if($c['hasil_evaluasi'] >80){ 
				$remark = 'Good';
			}else{
				$remark = 'Average';
			}


			$pdf->Cell(50,6,$c['bulan'],1,0);
			$pdf->Cell(40,6,$c['Nama'],1,0);
			$pdf->Cell(40,6,$c['hasil_evaluasi'] .'%',1,0);
			$pdf->Cell(50,6,$remark,1,1);
		}

		$pdf->Output();
	}


}
?>