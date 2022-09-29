<?php 

/**
 * 
 */
class home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_lokasi');
	}

	public function index()
	{
		$data['lokasi'] = $this->m_lokasi->lihat_data();
		$this->load->view('home/form_input_umum',$data);
	}

	public function pilih_asset()
	{
		$tiketID = $_GET['id'];

		$this->db->where('ID_Lokasi', $tiketID);
		$query = $this->db->get('m_lokasi');

		echo "<select class='form-control' name='id_asset' required>";

		if ($query->num_rows() > 0) {
			$asset   = $this->db->get_where('m_asset',array('LokasiAsset'=>$tiketID));
			
	        foreach ($asset->result() as $k)
	        {
	        	echo "
						<option value='$k->ID_Asset'>$k->NamaAsset</option>
						";
	        }
	        
		}else{
				echo "<option></option>";
		}
		echo "</select>";        
	}
}
 ?>