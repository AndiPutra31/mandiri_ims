<?php


class M_aset extends CI_Model{

	public function save_trans($data)
	{
		extract($data);
		if($type == 'insert')
		{
			$query = "SELECT 1
				  from m_aset 
				  where kode_aset ='".$kode_aset."'";
			$this->db->query($query);
			$result = $query->result_array();
			$nbrows = $result->num_rows();
			$status = FALSE;
			if($nbrows)
			{
				$this->db->trans_begin();
				$param = array(
						'kode_aset' => $kode_aset,
						'nama_aset' => $nama_aset,
						'jenis_aset' => $jenis_aset,
						'status_aset' => $status_aset,
						'qty_aset' => 0,
						'created_date' => $_SESSION[SESSION_USERID],
						'created_by' => date("Y-m-d H:i:s") 				
					);
				$flag = 1;
				$this->db->insert('m_aset', $param);
				$status = $this->db->trans_status();
				if ($status === TRUE)
				{
					$this->db->trans_commit();
				}
				else
				{
					$this->db->trans_rollback();
				}
			}
		}
		elseif($type == 'update')
		{
			$this->db->trans_begin();
			$param = array(
						'kode_aset' => $kode_aset,
						'nama_aset' => $nama_aset,
						'jenis_aset' => $jenis_aset,
						'status_aset' => $status_aset,
						'qty_aset' => $qty_aset,
						'last_update_date' => $_SESSION[SESSION_USERID],
						'last_update_by' => date("Y-m-d H:i:s") 					
					);
			$this->db->set($param);
			$this->db->where('aset_id', $aset_id);
			$this->db->update('m_aset');
			$status = $this->db->trans_status();
			if ($status === TRUE)
			{
				$this->db->trans_commit();
			}
			else
			{
				$this->db->trans_rollback();
			}

		}
		
		
		return $status;
	}

	public function get_data($aset_id)
	{
		$query = "SELECT aset_id,kode_aset, nama_aset , jenis_aset,status_aset,qty_aset 
		from m_aset";
		if($aset_id <> '' && $aset_id > 0)
		{
			$query .= " where aset_id =".$aset_id;
		}
		$this->db->query($query);
		$result = $query->result_array();

		return $result;
	}

}

?>