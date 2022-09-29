<?php 


class m_log extends CI_Model
{
	
	public function lihat_pdf($period_awal,$period_akhir)
	{
		if ($period_awal != '' && $period_akhir != '') {
			$tampil = "WHERE tbl_detailasset.TglRepair BETWEEN '$period_awal' AND '$period_akhir' ";
		}else{
			$tampil = "";
		}
		$query = $this->db->query("SELECT
										tbl_detailasset.ID_DetailAsset, 
										tbl_detailasset.TglRepair, 
										tbl_detailasset.ID_Asset, 
										tbl_detailasset.PelaksanaRepair, 
										tbl_detailasset.ID_User_Input, 
										tbl_detailasset.NamaRepair, 
										m_asset.NamaAsset, 
										m_lokasi.NamaLokasi, 
										m_user.NamaUser
									FROM
										tbl_detailasset
										INNER JOIN
										m_asset
										ON 
											tbl_detailasset.ID_Asset = m_asset.ID_Asset
										INNER JOIN
										m_lokasi
										ON 
											m_asset.LokasiAsset = m_lokasi.ID_Lokasi
										INNER JOIN
										m_user
										ON 
											tbl_detailasset.PelaksanaRepair = m_user.ID_User
									$tampil
									ORDER BY
										tbl_detailasset.TglRepair ASC
									");
		return $query;
	}
}
 ?>