<?php 

/**
 * 
 */
class Lokasi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_lokasi');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_IdUser');
		if ($user=="") {
			redirect('login');
		}else{
			$data['lokasi'] = $this->m_lokasi->lihat_data();
			$this->load->view('template/header');
			$this->load->view('lokasi/index',$data);
			$this->load->view('template/footer');
		}	
	}

	public function simpan()
	{
		$lokasi = $this->input->post('lokasi');

		$this->db->where('NamaLokasi', $lokasi);
		$query = $this->db->get('m_lokasi');

		if ($query->num_rows() > 0) {
			$this->session->set_flashdata('msg',
						'<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Lokasi Sudah Ada !!
						</div>');
			redirect('Lokasi');
		}else{
			if (isset($_POST)) {
			$this->m_lokasi->simpan_data();
			$this->session->set_flashdata('msg',
						'<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Berhasil Menyimpan
						</div>');
			redirect('Lokasi');
			}
		}		
	}

	public function update()
	{
		$id 	= $this->input->post('id');
		$lokasi 	= $this->input->post('lokasi');

		$data = array(
			'NamaLokasi'  		=> $lokasi
			);

		$where = array(
			'ID_Lokasi' 		=> $id
			);

		$this->m_lokasi->update_data($where,$data,'m_lokasi');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('Lokasi');
	}

	public function delete()
	{
		$id = $this->input->post('id');
        $this->m_lokasi->hapus_data($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('Lokasi');
	}
}
 ?>