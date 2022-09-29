<?php 


class m_lokasi extends CI_Model
{
	
	public function lihat_data()
	{
		$query = $this->db->query("SELECT * FROM m_lokasi ORDER BY ID_Lokasi DESC");
		return $query;
	}

	public function simpan_data()
	{
		$data = array(
			'ID_Lokasi'		=> null,
			'NamaLokasi'	=> $this->input->post('lokasi')
			);

		$this->db->insert('m_lokasi',$data);
	}

	public function get_data($id)
	{
		$query = $this->db->query("SELECT * FROM m_lokasi WHERE ID_Lokasi = '$id' ");
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($id)
    {
        $this->db->where('ID_Lokasi',$id);
        $this->db->delete('m_lokasi');
    }
}
 ?>