<?php 

/**
 * 
 */
class m_chart extends CI_Model
{
	
	public function get_data_open(){
		$bulan = date('m');
		$query = $this->db->query("SELECT
										tbl_detailasset.TglRepair, 
										COUNT(tbl_detailasset.ID_DetailAsset) AS total
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
									WHERE
										MONTH(tbl_detailasset.TglRepair) = '$bulan'
									GROUP BY
										tbl_detailasset.TglRepair
									ORDER BY
										tbl_detailasset.TglRepair ASC");
		return $query->result();
	}

}
 ?>