<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Military extends CI_Controller {

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

	public function MilitaryStrength($value='')
	{
		$data['ms'] = $this->M_military->getcountry();
		$this->load->view('V_header');
		$this->load->view('V_militarystrength',$data);
		$this->load->view('V_footer');
	}

	public function MilitaryStrengthCountry($id_country)
	{
		$data['ms'] = $this->M_military->getcountrydetail($id_country)->result_array();
		$this->load->view('V_header');
		$this->load->view('V_militarystrengthdetail',$data);
		$this->load->view('V_footer');
	}

	public function CompareCountry($value='')
	{
		$country1 = $this->input->post('country1');
		$country2 = $this->input->post('country2');
		$data['c1'] = $this->M_military->getcountrydetail($country1)->row();
		$data['c2'] = $this->M_military->getcountrydetail($country2)->row();
		$this->load->view('V_header');
		$this->load->view('V_militarystrength_compare',$data);
		$this->load->view('V_footer');
	}

	public function ExportTop2020($value='')
	{
		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/TMS/SGP/XI/2020',0,1);
		$pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
        // mencetak string 
		// $pdf->header();
		$pdf->Cell(190,7,'2020 Military Strength Ranking',0,1,'C');
		

		// $pdf->SetFont('Arial','B',12);
        // $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat



		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(20,6,'Rank',1,0);
		$pdf->Cell(60,6,'Country',1,0);
		$pdf->Cell(50,6,'Power Index',1,1);
		$pdf->SetFont('Arial','',10);
		$data['ms'] = $this->M_military->getcountry();
		// // for ($i=0; $i < 200; $i++) { 
		// // // $image1 = base_url()."/assets/". $c->image ;
		// 	// $pdf->Cell(40,10,'abdabsdbjb', 1, 0);
		// 	// $pdf->Cell(80,10,'abdabsdbjb',1,0);
		// 	// $pdf->Cell(40,10,'abdabsdbjb',1,1);
		// // 	$pdf->Cell(25,10,'abdabsdbjb',1,1); 
		// // }
		// // $pdf->Footer();
		foreach ($data['ms'] as $c){
			$pdf->Cell(20,6,$c['ID_Country'],1,0);
			$pdf->Cell(60,6,$c['Country'],1,0);
			$pdf->Cell(50,6,$c['pwrindex'],1,1);
		}

		$pdf->Output();
	}

	public function ExportCompare($country1, $country2)
	{
		$c1 = $this->M_military->getcountrydetail($country1)->row();
		$c2 = $this->M_military->getcountrydetail($country2)->row();

		$pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
		$pdf->AddPage();
        // setting jenis font yang akan digunakan

		$pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,'No. Surat	: 001/CMS/SGP/XI/2020',0,1);
		$pdf->Cell(110,6,'No. Cetak	: 1',0,1);
		$pdf->Cell(40,6,'Lampiran	: -',0,1);

		$pdf->SetFont('Arial','B',16);
		$pdf->ln();
		$pdf->Cell(190,7,'Comparison Results ( '.$c1->Country .' vs '.$c2->Country.' )',0,1,'C');
		$pdf->ln();

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(95,7,$c1->Country,0,0,'C');
		$pdf->Cell(95,7,$c2->Country,0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->pwrindex,0,0,'C');
		$pdf->Cell(95,7,$c2->pwrindex,0,1,'C');
		$pdf->Cell(95,7,'Ranked ' . $c1->ID_Country.' of 138',0,0,'C');
		$pdf->Cell(95,7,'Ranked ' . $c2->ID_Country.' of 138',0,1,'C');

		$pdf->Line(10, 102, 210-10, 102);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(190,10,'Manpower',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Population',0,0,'C');
		$pdf->Cell(95,7,'Population',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Population,0,0,'C');
		$pdf->Cell(95,7,$c2->Population,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Total Military Personnel',0,0,'C');
		$pdf->Cell(95,7,'Total Military Personnel',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Total_Military_Personnel,0,0,'C');
		$pdf->Cell(95,7,$c2->Total_Military_Personnel,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Available Manpower',0,0,'C');
		$pdf->Cell(95,7,'Available Manpower',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Available_Manpower,0,0,'C');
		$pdf->Cell(95,7,$c2->Available_Manpower,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Active Military',0,0,'C');
		$pdf->Cell(95,7,'Active Military',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Active_Military,0,0,'C');
		$pdf->Cell(95,7,$c2->Active_Military,0,1,'C');

		$pdf->Line(10, 168, 210-10, 168);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(190,10,'Airpower',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Total Strenght',0,0,'C');
		$pdf->Cell(95,7,'Total Strenght',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Total_Strength,0,0,'C');
		$pdf->Cell(95,7,$c2->Total_Strength,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Fighters',0,0,'C');
		$pdf->Cell(95,7,'Fighters',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Fighters,0,0,'C');
		$pdf->Cell(95,7,$c2->Fighters,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Transports',0,0,'C');
		$pdf->Cell(95,7,'Transports',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Transports,0,0,'C');
		$pdf->Cell(95,7,$c2->Transports,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Helicopters',0,0,'C');
		$pdf->Cell(95,7,'Helicopters',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Helicopters,0,0,'C');
		$pdf->Cell(95,7,$c2->Helicopters,0,1,'C');

		$pdf->Line(10, 234, 210-10, 234);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(190,10,'Land Forces',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Tanks',0,0,'C');
		$pdf->Cell(95,7,'Tanks',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Tanks,0,0,'C');
		$pdf->Cell(95,7,$c2->Tanks,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Armored Vehicle',0,0,'C');
		$pdf->Cell(95,7,'Armored Vehicle',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Armored_Vehicle,0,0,'C');
		$pdf->Cell(95,7,$c2->Armored_Vehicle,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Self-Propelled Artillery',0,0,'C');
		$pdf->Cell(95,7,'Self-Propelled Artillery',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Sp_Artillery,0,0,'C');
		$pdf->Cell(95,7,$c2->Sp_Artillery,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Towed Artillery',0,0,'C');
		$pdf->Cell(95,7,'Towed Artillery',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Towed_Artilerry,0,0,'C');
		$pdf->Cell(95,7,$c2->Towed_Artilerry,0,1,'C');

		$pdf->Line(10, 38, 210-10, 38);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(190,10,'Naval Forces',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Total Assets',0,0,'C');
		$pdf->Cell(95,7,'Total Assets',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Total_Assets,0,0,'C');
		$pdf->Cell(95,7,$c2->Total_Assets,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Submarines',0,0,'C');
		$pdf->Cell(95,7,'Submarines',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Submarines,0,0,'C');
		$pdf->Cell(95,7,$c2->Submarines,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Corvettes',0,0,'C');
		$pdf->Cell(95,7,'Corvettes',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Corvettes,0,0,'C');
		$pdf->Cell(95,7,$c2->Corvettes,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Patrol',0,0,'C');
		$pdf->Cell(95,7,'Patrol',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Patrol,0,0,'C');
		$pdf->Cell(95,7,$c2->Patrol,0,1,'C');

		$pdf->Line(10, 104, 210-10, 105);

		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(190,10,'Geography',0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Square Land Area',0,0,'C');
		$pdf->Cell(95,7,'Square Land Area',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Square_Land_Area,0,0,'C');
		$pdf->Cell(95,7,$c2->Square_Land_Area,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Coastline Coverage',0,0,'C');
		$pdf->Cell(95,7,'Coastline Coverage',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Coastline_Coverage,0,0,'C');
		$pdf->Cell(95,7,$c2->Coastline_Coverage,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Shared Borders',0,0,'C');
		$pdf->Cell(95,7,'Shared Borders',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Shared_Borders,0,0,'C');
		$pdf->Cell(95,7,$c2->Shared_Borders,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(95,7,'Usable Waterways',0,0,'C');
		$pdf->Cell(95,7,'Usable Waterways',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(95,7,$c1->Usable_Waterways,0,0,'C');
		$pdf->Cell(95,7,$c2->Usable_Waterways,0,1,'C');

		$pdf->ln();
		

		$pdf->Output();
	}

	

}
?>