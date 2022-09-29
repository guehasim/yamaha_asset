<?php 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 
class Asset extends CI_Controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('m_assets');
		$this->load->model('m_lokasi');
	}

	//================================kategori

	public function index()
	{
		$user = $this->session->userdata('ses_IdUser');
		if ($user=="") {
			redirect('login');
		}else{
		$data['assets'] = $this->m_assets->lihat_data();
		$this->load->view('template/header');
		$this->load->view('assets/index',$data);
		$this->load->view('template/footer');
		}
	}

	public function newAsset()
	{
		$data['baru'] 	= '1';
		$data['lokasi'] = $this->m_lokasi->lihat_data();
		$this->load->view('template/header');
		$this->load->view('assets/form',$data);
		$this->load->view('template/footer');
	}

	

	public function simpan()
	{
		$kode = $this->input->post('kode');
		$this->db->where('KodeAsset',$kode);
		$query = $this->db->get('m_asset');

		if ($query->num_rows() > 0) {
			$this->session->set_flashdata('msg',
								'<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				                                kode Sudah Ada di Database !!
								</div>');
			redirect('Asset');
		}else{
			$data = array(
				'ID_Asset'		=> null,
				'KodeAsset'		=> $this->input->post('kode'),
				'NamaAsset'		=> $this->input->post('nama'),
				'LokasiAsset'	=> $this->input->post('lokasi'),
				'ImageAsset' 	=> null,
				'QrAsset' 		=> null
				);

			$this->db->insert('m_asset',$data);

			//-----------------------------------------QR CODE

			$insert_id = $this->db->insert_id();

			$nama = base_url() .'user?us='.$insert_id;

			$this->load->library('ciqrcode');

			$config['cacheable']	= true; //boolean, the default is true
			$config['cachedir']		= './assets/upload/'; //string, the default is application/cache/
			$config['errorlog']		= './assets/upload/'; //string, the default is application/logs/
			$config['imagedir']		= './assets/upload/files_qr/'; //direktori penyimpanan qr code
			$config['quality']		= true; //boolean, the default is true
			$config['size']			= '1024'; //interger, the default is 1024
			$config['black']		= array(224,255,255); // array, default is array(255,255,255)
			$config['white']		= array(70,130,180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name=$insert_id.'.png'; //buat name dari qr code sesuai dengan nim

			$params['data'] = $nama; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

			//-----------------------------------------------------image

			$form = $this->input->post('jenis_form');

			$config['upload_path'] = 'assets/upload/images/'; //path folder
	        $config['allowed_types'] = 'jpg|jpeg|png'; //type yang dapat diakses bisa anda sesuaikan
	        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

	    	$this->upload->initialize($config);
	        if(!empty($_FILES['image']['name'])){
	 
	            if ($this->upload->do_upload('image')){

	                $gbr = $this->upload->data();
	                //Compress Image
	                $config['image_library']='gd2';
	                $config['source_image']='assets/upload/images/'.$gbr['file_name'];
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= FALSE;
	                $config['quality']= '50%';
	                $config['width']= 700;
	                $config['height']= 700;
	                $config['new_image']= 'assets/upload/images/'.$gbr['file_name'];
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();

	                $gambar=$gbr['file_name'];
	                // echo "Image berhasil diupload";

	                $data = array(
	                	'ImageAsset'=> $gambar,
						'QrAsset'	=> $image_name
						);

					$where = array(
						'ID_Asset' 		=> $insert_id
						);

					$this->m_assets->update_data($where,$data,'m_asset');

					$this->session->set_flashdata('msg',
									'<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					                                Berhasil Menyimpan
									</div>');
					redirect('Asset');	                

	            }else{
	            	$this->session->set_flashdata('msg',
							'<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                                Gagal Dalam upload File!!
							</div>');
	            	redirect('Asset');
	            }
	                      
	        }else{
	            $this->session->set_flashdata('msg',
							'<div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                                Gagal Dalam upload File, Ekstensi Tidak Sesuai dengan ketentuan !!
							</div>');
	            redirect('Asset');
	        }
		}
		
	}

	public function get()
	{
		$user = $this->session->userdata('ses_IdUser');
		if ($user == "") {
			redirect('login');
		}else{
			if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['lokasi'] 	= $this->m_lokasi->lihat_data();
	            $data['asset'] 		= $this->m_assets->get_data($id);
	            $data['baru'] 		= '';         
				$this->load->view('template/header');
				$this->load->view('assets/form',$data);
				$this->load->view('template/footer');
	        }else{
	        	echo "no";
	        }
		}
	}

	public function update()
	{
		$id 		= $this->input->post('id');
		$kode 		= $this->input->post('kode');
		$nama 		= $this->input->post('nama');
		$lokasi 	= $this->input->post('lokasi');

		$config['upload_path'] = 'assets/upload/images/'; //path folder
        $config['allowed_types'] = 'jpg|jpeg|png'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

    	$this->upload->initialize($config);
        if(!empty($_FILES['image']['name'])){
 
            if ($this->upload->do_upload('image')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['size']= 2000;
                $this->load->library('image_lib', $config);

                $gambar=$gbr['file_name'];
                // echo "Image berhasil diupload";

                $data = array(
				'KodeAsset'		=> $kode,
				'NamaAsset'		=> $nama,
				'LokasiAsset' 	=> $lokasi,
				'ImageAsset' 	=> $gambar
				);

				$where = array(
					'ID_Asset' 		=> $id
					);

				$this->m_assets->update_data($where,$data,'m_asset');

				$this->session->set_flashdata('msg',
					'<div class="alert alert-info alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Mengubah
					</div>');
				redirect('Asset');


            }else{
            	$this->session->set_flashdata('msg',
						'<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Gagal Dalam upload File!!
						</div>');
            	redirect('Asset');
            }
                      
        }else{
            $data = array(
				'KodeAsset'		=> $kode,
				'NamaAsset'		=> $nama,
				'LokasiAsset' 	=> $lokasi
				);

			$where = array(
				'ID_Asset' 		=> $id
				);

			$this->m_assets->update_data($where,$data,'m_asset');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-info alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Berhasil Mengubah
					</div>');
			redirect('Asset');
        }
	}

	public function hapus()
	{
		$id = $this->input->post('id');
        $this->m_assets->hapus_data($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('Asset');
	}

	public function cetak()
	{
		if (isset($_GET['us'])) {
			$id=$_GET['us'];
			$data['asset'] 	= $this->m_assets->get_data($id); 
			$this->load->view('assets/cetak_barcode',$data);
		}
	}

	//=========================detail Asset

	public function detail_asset()
	{
		$user = $this->session->userdata('ses_IdUser');
		if ($user=="") {
			redirect('login');
		}else{
			if (isset($_GET['us'])) {
				$id = $_GET['us'];
				$data['idnya'] 		= $id;
				$data['asset'] 	= $this->m_assets->get_data($id);
				$data['detail'] 	= $this->m_assets->lihat_detail($id);
				$this->load->view('template/header');
				$this->load->view('assets/detail_assets',$data);
				$this->load->view('template/footer');
			}else{
				echo "no";
			}		
		}
	}

	public function newDetail()
	{
		$user = $this->session->userdata('ses_IdUser');
		if ($user=="") {
			redirect('login');
		}else{
			if (isset($_GET['us'])) {
				$data['asset'] = $_GET['us'];
				$data['baru'] 	= '1';
				$this->load->view('template/header');
				$this->load->view('assets/form_detail',$data);
				$this->load->view('template/footer');
			}
		}		
	}

	public function simpanDetail()
	{
		$id = $this->input->post('nik');

		$form = $this->input->post('jenis_form');

		$this->db->where('NikUser',$id);
		$query = $this->db->get('m_user');

		if ($query->num_rows() > 0) {
			if (isset($_POST)) {
			$this->m_assets->simpan_detail();
			$this->session->set_flashdata('msg',
						'<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Berhasil Menyimpan
						</div>');

			if ($form == 1) {
        		redirect('home');
        	}else{
        		redirect('./Asset/detail_asset?us='.$_POST[id_asset].'');
        	}
		}
		}else{
			$this->session->set_flashdata('msg',
						'<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Nik Tidak Sesuai !!
						</div>');
			redirect('./Asset/detail_asset?us='.$_POST[id_asset].'');

			if ($form == 1) {
        		redirect('home');
        	}else{
        		redirect('./Asset/detail_asset?us='.$_POST[id_asset].'');
        	}
		}		
	}

	public function getDetail()
	{
		$user = $this->session->userdata('ses_IdUser');
		if ($user == "") {
			redirect('login');
		}else{
			if (isset($_GET['us']) ) {
				$id 				= $_GET['us']; 
	            $data['baru'] 		= ''; 
	            $data['detail'] 	= $this->m_assets->get_data_detail($id);        
				$this->load->view('template/header');
				$this->load->view('assets/form_detail',$data);
				$this->load->view('template/footer');
	        }else{
	        	echo "no";
	        }
		}
	}

	public function updatedetail()
	{
		$id 		= $this->input->post('id');
		$kategori 	= $this->input->post('kategori');
		$detail 	= $this->input->post('detail');

		$data = array(
			'ID_Kategori'			=> $kategori,
			'NamaDetailKategori' 	=> $detail
			);

		$where = array(
			'ID_DetailKategori' 	=> $id
			);

		$this->m_kategori->update_data($where,$data,'detail_kategori');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('./kategori/detail_kategori?us='.$_POST[kategori].'');
	}

	public function hapusDetail()
	{
		$id = $this->input->post('id');
        $this->m_assets->hapus_detail($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('./Asset/detail_asset?us='.$_POST[id_asset].'');
	}


}
 ?>