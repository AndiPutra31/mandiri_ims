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
				'aset_id' => $kode_aset,
				'aset_qty' => $qty,
				'created_date' => date("Y-m-d H:i:s"),
				'created_by' => 1,
			);
		$flag = 1;
		$this->db->insert($table, $param);
		if ($this->db->trans_status() === TRUE)
		{
				$this->db->query("UPDATE m_aset SET ".$update.", last_update_date = now(), last_update_by = 1 WHERE kode_aset = ".$kode_aset);
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
				}
				else
				{
					$this->db->trans_commit();
				}	
		}
		else
		{
		        $this->db->trans_rollback();
		}
		return 1;
	}

}

?>