<?php 


class m_assets extends CI_Model
{

	//=================================Assets
	
	public function lihat_data()
	{
		$query = $this->db->query("SELECT
										m_asset.ID_Asset, 
										m_asset.KodeAsset, 
										m_asset.NamaAsset, 
										m_asset.LokasiAsset, 
										m_asset.ImageAsset, 
										m_asset.QrAsset, 
										m_lokasi.NamaLokasi
									FROM
										m_asset
										INNER JOIN
										m_lokasi
										ON 
											m_asset.LokasiAsset = m_lokasi.ID_Lokasi
									ORDER BY
										m_asset.ID_Asset DESC");
		return $query;
	}

	public function simpan_data()
	{
		$data = array(
			'ID_Asset'		=> null,
			'KodeAsset'		=> $this->input->post('kode'),
			'NamaAsset' 	=> $this->input->post('nama'),
			'LokasiAsset' 	=> $this->input->post('lokasi'),
			'ImageAsset' 	=> $gambar
			);

		$this->db->insert('m_asset',$data);
	}

	public function get_data($id)
	{
		$query = $this->db->query("SELECT
										m_asset.ID_Asset, 
										m_asset.KodeAsset, 
										m_asset.NamaAsset, 
										m_asset.LokasiAsset, 
										m_asset.ImageAsset, 
										m_asset.QrAsset, 
										m_lokasi.NamaLokasi
									FROM
										m_asset
										INNER JOIN
										m_lokasi
										ON 
											m_asset.LokasiAsset = m_lokasi.ID_Lokasi
									WHERE
										m_asset.ID_Asset = $id ");
		return $query;
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($id)
    {
        $this->db->where('ID_Asset',$id);
        $this->db->delete('m_asset');
    }

    //================================= Detail Asset

    public function lihat_detail($id)
	{
		$query = $this->db->query("SELECT
										tbl_detailasset.ID_DetailAsset,
										tbl_detailasset.TglRepair, 
										tbl_detailasset.ID_Asset, 
										tbl_detailasset.PelaksanaRepair, 
										tbl_detailasset.ID_User_Input, 
										tbl_detailasset.NamaRepair, 
										m_user.NamaUser
									FROM
										tbl_detailasset
										INNER JOIN
										m_user
										ON 
											tbl_detailasset.PelaksanaRepair = m_user.ID_User
									WHERE
										tbl_detailasset.ID_Asset = $id
									ORDER BY
										tbl_detailasset.ID_DetailAsset DESC ");
		return $query;
	}

	public function simpan_detail()
	{

		$data = array(
			'ID_DetailAsset'		=> null,
			'TglRepair' 			=> date('Y-m-d',strtotime($this->input->post('Tgl'))),
			'ID_Asset'				=> $this->input->post('id_asset'),
			'PelaksanaRepair'		=> $this->input->post('karyawan'),
			'ID_User_Input' 		=> $this->input->post('id_user_input'),
			'NamaRepair' 			=> $this->input->post('namarepair')
			);

		$this->db->insert('tbl_detailasset',$data);
	}

	public function get_data_detail($id)
	{
		$query = $this->db->query("SELECT
										tbl_detailasset.ID_DetailAsset,
										tbl_detailasset.TglRepair, 
										tbl_detailasset.ID_Asset, 
										tbl_detailasset.PelaksanaRepair, 
										tbl_detailasset.ID_User_Input, 
										tbl_detailasset.NamaRepair,
										m_user.ID_User,
										m_user.NikUser, 
										m_user.NamaUser,
										m_user.DeptUser
									FROM
										tbl_detailasset
										INNER JOIN
										m_user
										ON 
											tbl_detailasset.PelaksanaRepair = m_user.ID_User
									WHERE
										tbl_detailasset.ID_DetailAsset = $id ");
		return $query;
	}

	public function hapus_detail($id)
    {
        $this->db->where('ID_DetailAsset',$id);
        $this->db->delete('tbl_detailasset');
    }
}
 ?>