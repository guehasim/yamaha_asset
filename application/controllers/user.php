<?php 


class user extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_assets');
	}

	public function index()
	{
		if (isset($_GET['us'])) {
			$id = $_GET['us'];
			$data['asset'] 	= $this->m_assets->get_data($id);
			$data['detail'] = $this->m_assets->lihat_detail($id);
			$this->load->view('user/index2',$data);
		}
	}
}
 ?>