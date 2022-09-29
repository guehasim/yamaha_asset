<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class log extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_log');
	}

	public function index()
	{
		$period_awal 	= '';
		$period_akhir 	= '';
		$data['log'] 	= $this->m_log->lihat_pdf($period_awal,$period_akhir);
		$this->load->view('template/header');
		$this->load->view('log/index',$data);
		$this->load->view('template/footer');
	}

	public function laporan()
	{		
		$user = $this->session->userdata('ses_IdUser');
		if ($user == "") {
			redirect('login');
		}else{
			
			$period_awal  		= date('Y-m-d',strtotime($this->input->post('period_awal')));
			$period_akhir 		= date('Y-m-d',strtotime($this->input->post('period_akhir')));

			$submit = $this->input->post('submitdata');			

			if ($submit == 'Reset') {

				redirect('log');

			}else if($submit == 'Print'){

				$data['period_awal'] = date('d-m-Y',strtotime($this->input->post('period_awal')));
				$data['period_akhir'] = date('d-m-Y',strtotime($this->input->post('period_akhir')));
				$data['cetak'] = $this->m_log->lihat_pdf($period_awal,$period_akhir);
				$this->load->view('log/cetak_asset',$data);

			}else if($submit == 'Excel'){

				$data['period_awal'] = date('d-m-Y',strtotime($this->input->post('period_awal')));
				$data['period_akhir'] = date('d-m-Y',strtotime($this->input->post('period_akhir')));

				$semua_pengguna = $this->m_log->lihat_pdf($period_awal,$period_akhir);

				$spreadsheet = new Spreadsheet;

		          $spreadsheet->setActiveSheetIndex(0)
		                      ->setCellValue('A1', 'NO')
		                      ->setCellValue('B1', 'TANGGAL')
		                      ->setCellValue('C1', 'REPAIR')
		                      ->setCellValue('D1', 'ASSET')
		                      ->setCellValue('E1', 'LOKASI')
		                      ->setCellValue('F1', 'PENANGGUNG JAWAB');

		          $kolom = 2;
		          $nomor = 1;
		          foreach($semua_pengguna->result() as $pengguna) {

		               $spreadsheet->setActiveSheetIndex(0)
		                           ->setCellValue('A' . $kolom, $nomor)
		                           ->setCellValue('B' . $kolom, date('d M y',strtotime($pengguna->TglRepair)))
		                           ->setCellValue('C' . $kolom, $pengguna->NamaRepair)
		                           ->setCellValue('D' . $kolom, $pengguna->NamaAsset)
		                           ->setCellValue('E' . $kolom, $pengguna->NamaLokasi)
		                           ->setCellValue('F' . $kolom, $pengguna->NamaUser);

		               $kolom++;
		               $nomor++;

		          }

		          $writer = new Xlsx($spreadsheet);

		          header('Content-Type: application/vnd.ms-excel');
			  header('Content-Disposition: attachment;filename="Laporan Asset.xls"');
			  header('Cache-Control: max-age=0');

			  $writer->save('php://output');
			}else if($submit == 'Search'){
				$data['period_awal'] = date('d-m-Y',strtotime($this->input->post('period_awal')));
				$data['period_akhir'] = date('d-m-Y',strtotime($this->input->post('period_akhir')));
				

				$data['log'] = $this->m_log->lihat_pdf($period_awal,$period_akhir);
				$this->load->view('template/header');
				$this->load->view('log/index',$data);
				$this->load->view('template/footer');
			}
			else{
				redirect('log');
			}

		}
	}
}
 ?>