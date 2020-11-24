<?php


class M_aset extends CI_Model{

	public function save_trans($data)
	{
		extract($data);
		if(strtolower($type) == 'insert')
		{
			
			$query = $this->db->query("SELECT 1
				  from m_aset 
				  where kode_aset ='".$aset_kode."'");
			$result = $query->result_array();

			if(count($result) < 1)
			{
				$this->db->trans_begin();
				$param = array(
						'kode_aset' 	=> $aset_kode,
						'nama_aset' 	=> $aset_name,
						'jenis_aset' 	=> $jenis_aset,
						'status_aset' 	=> $status,
						'qty_aset' 		=> 0,
						'created_date' 	=> $_SESSION['SESSION_USERID'],
						'created_by' 	=> date("Y-m-d H:i:s") 				
					);
				$flag = 1;
				$this->db->insert('m_aset', $param);
				$status_trans = $this->db->trans_status();
				if ($status_trans === TRUE)
				{
					$status_trans = 'success';
					$message = 'Data Berhasil dibuat';
					$this->db->trans_commit();
				}
				else
				{
					$status_trans = 'error';
					$message = 'Data Gagal dibuat';
					$this->db->trans_rollback();
				}
			}
			else
			{
				$message = 'Data sudah ada di database';
				$status_trans = 'warning';
			}
		}
		elseif($type == 'update')
		{
			$this->db->trans_begin();
			$param = array(
						'kode_aset' 		=> $aset_kode,
						'nama_aset' 		=> $aset_name,
						'jenis_aset' 		=> $jenis_aset,
						'status_aset' 		=> $status,
						'last_update_date' 	=> $_SESSION['SESSION_USERID'],
						'last_update_by' 	=> date("Y-m-d H:i:s") 				
					);
			$this->db->set($param);
			$this->db->where('aset_id', $aset_id);
			$this->db->update('m_aset');
			$status = $this->db->trans_status();
			if ($status === TRUE)
			{
				$this->db->trans_commit();
				$status_trans = 'success';
				$message = 'Data Berhasil diubah';
			}
			else
			{
				$status_trans = 'error';
				$message = 'Data Gagal diubah';

				$this->db->trans_rollback();
			}

		}
		$result = array(
			'status' => $status_trans,
			'message' => $message
		);
		// var_dump($result);
		return $result;
	}

	public function create_query()
	{

		$this->db->select("aset_id, kode_aset, nama_aset , status_aset as status , qty_aset, jenis_aset as jenis_aset_id , 
			CASE 
			WHEN jenis_aset = 1 THEN
				'Slip Setoran'
			WHEN jenis_aset = 2 THEN
				'Slip Pembayaran/<i>multipayment</i>'
			WHEN jenis_aset = 3 THEN
				'Slip Penarikan'
			WHEN jenis_aset = 4 THEN
				'Slip Pembayaran Kartu Kredit'
			WHEN jenis_aset = 5 THEN
				'Formulir <i> walk in customer</i>'
			END as jenis_aset");
		$this->db->from('m_aset');
		if(isset($_POST['search']['value']))
		{
			$this->db->like('lower(kode_aset)',strtolower($_POST['search']['value']));
			$this->db->or_like('lower(nama_aset)',strtolower($_POST['search']['value']));

			if(isset($_POST["order"]))
			{
				$this->db->order_by(
					$_POST["order"]['0']["column"],
					$_POST["order"]['0']["dir"]);
			}
			else
			{
				$this->db->order_by("aset_id","ASC");
			}
		}
	}

	public function get_data()
	{
		$this->create_query();
		if($_POST["length"] <> -1)
		{
			$this->db->limit($_POST["length"],$_POST["start"]);
			// $this->db->limit(10,0);

		}
		$result = $this->db->get();
		return $result->result();
	}

	//function to get numbers of filtered records
	public function filterData()
	{
		$this->create_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('m_aset');
		return $this->db->count_all_results();
	}

	public function get_quantity()
	{
		$this->db->select('qty_aset');
		$this->db->from('m_aset');
		$this->db->where('kode_aset', $this->input->post('kode_aset'));
		$get = $this->db->get();
		$result = $get->row();
		// echo $result->qty_aset;
		if(is_null($result))
		{
			$qty = 0;
		}
		else
		{
			$qty = $result->qty_aset;
		}
		// echo '<br>';

		return array('status' => 'success' , 'qty' => $qty);

	}

}

?>