<?php


class M_aset_trans extends CI_Model{


	public function trans_list()
	{
		$sql = "SELECT * FROM t_aset_masuk";
		$result = $this->db->query($sql);
		$nbrows = $result->num_rows();
		$jsonresult = json_encode(array(
			'total'=>$nbrows,
			'results'=>$result->result()
		));
		return $jsonresult;
	}

	public function save_trans($data)
	{
		extract($data);
		if(strtolower($trans_type) == 'in')
		{
			$table = "t_aset_masuk";
			$update = "qty_aset=qty_aset +".$qty;
		}
		elseif(strtolower($trans_type) == 'out')
		{
			$table = "t_aset_keluar";
			$update = "qty_aset=qty_aset -".$qty;
		}

		$this->db->trans_begin();
		$param = array(
				'aset_id' => $aset_id,
				'aset_qty' => $qty,
				'created_date' => date("Y-m-d H:i:s"),
				'created_by' => $_SESSION['SESSION_USERID'],
			);
		$flag = 1;
		$this->db->insert($table, $param);
		if ($this->db->trans_status() === TRUE)
		{
				$this->db->query("UPDATE m_aset SET ".$update.", last_update_date = now(), last_update_by = ".$_SESSION['SESSION_USERID']." WHERE aset_id = ".$aset_id);
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
					$status_trans = 'error';
					$message = 'Transaksi Gagal';
				}
				else
				{
					$this->db->trans_commit();
					$status_trans = 'success';
					$message = 'Transaksi Berhasil';
				}	
		}
		else
		{
		        $this->db->trans_rollback();
		        $status_trans = 'error';
				$message = 'Transaksi Gagal';
		}
		$result = array(
			'status' => $status_trans,
			'message' => $message
		);
		// var_dump($result);
		return $result;
	}

	public function terakhir_masuk()
	{
		$sql = "SELECT m_aset.nama_aset , t_aset_masuk.created_date , aset_qty as qty
				FROM t_aset_masuk  
				INNER JOIN m_aset on m_aset.aset_id = t_aset_masuk.aset_id
				ORDER BY t_aset_masuk.created_date DESC limit 5";
		$result = $this->db->query($sql);
		// $nbrows = $result->num_rows();
		return $result->result();
	}

	public function terakhir_keluar()
	{
		$sql = "SELECT m_aset.nama_aset , t_aset_keluar.created_date , aset_qty as qty
				FROM t_aset_keluar  
				INNER JOIN m_aset on m_aset.aset_id = t_aset_keluar.aset_id
				ORDER BY t_aset_keluar.created_date DESC limit 5";
		$result = $this->db->query($sql);
		// $nbrows = $result->num_rows();
		// $jsonresult = json_encode(array(
		// 	'total'=>$nbrows,
		// 	'results'=>$result->result()
		// ));
		return $result->result();
	}

}

?>