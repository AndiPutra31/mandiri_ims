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
						// 'jenis_aset' 	=> $jenis_aset,
						'jenis_aset' 	=> 1,
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
						// 'jenis_aset' 		=> $jenis_aset,
						'jenis_aset' 		=> 1,
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
			jenis_aset_name as jenis_aset");
		$this->db->from('m_aset');
		$this->db->join('m_jenis_aset', 'm_aset.jenis_aset = m_jenis_aset.jenis_aset_id', 'inner');
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
		$this->db->select('qty_aset , aset_id');
		$this->db->from('m_aset');
		$this->db->where('kode_aset', $this->input->post('kode_aset'));
		$get = $this->db->get();
		$result = $get->row();
		// echo $result->qty_aset;
		if(is_null($result))
		{
			$qty = 0;
			$aset_id = null;
		}
		else
		{
			$qty = $result->qty_aset;
			$aset_id = $result->aset_id;

		}
		// echo '<br>';

		return array('status' => 'success' , 'data' => array('aset_id' => $aset_id, 'qty' => $qty));

	}

	public function getStock($params)
	{
		extract($params);
		//get week index
		//get first and last Day of month
		$year = intval(substr($periode, 0,4));
		$month = intval(substr($periode, 5,2));
		$firstDate = mktime(0, 0, 0, $month, 1, $year);
		$lastDate = mktime(0, 0, 0, $month, date('t', $firstDate), $year);
		// //get first and last Day of month
		// $firstDate = date("Y-m-d", strtotime("'".$year."-".$month."-01'"));
		// $lastDate = date("Y-m-t", strtotime("'".$year."-".$month."-01"));
		
		//get day
		$firstDay = date("D",$firstDate);
		$lastDay = date("D",$lastDate);

		//get week
		$start_week = intval(date('W', $firstDate));
		$end_week = intval(date('W', $lastDate));


		if(strtolower($lastDay) <> 'sun')
		{
			$end_week -= 1;
		}

		$join ='';
		// echo 'start : '.$start_week." end : ".$end_week."<br>";
		$select  = 'SELECT m_aset.nama_aset';
		$index = 1;
		for ($i=$start_week; $i <=$end_week ; $i++) { 
			if($type =='rekap')
			{
				$select .= ',coalesce(masuk'.$i.'.qty,0) - coalesce(keluar'.$i.'.qty,0) as qty'.$index;
				$join .= "LEFT JOIN (select aset_id ,sum(aset_qty) as qty 
											 from t_aset_masuk 
											 where WEEK(created_date,1) <= ".$i."
											 group by aset_id ) masuk".$i." on masuk".$i.".aset_id = m_aset.aset_id
						LEFT JOIN (select aset_id ,sum(aset_qty) as qty
											 from t_aset_keluar 
											 where WEEK(created_date,1) <= ".$i."
											 group by aset_id ) keluar".$i." on keluar".$i.".aset_id = m_aset.aset_id 
											 ";
			}
			elseif ($type =='detail') 
			{
				$select .= ',coalesce(masuk'.$i.'.qty,0) as masuk'.$index.', coalesce(keluar'.$i.'.qty,0) as keluar'.$index;
				$whereGroup = "group by aset_id , WEEK(created_date,1)";	
				$join .= 'LEFT JOIN (select aset_id ,sum(aset_qty) as qty , WEEK(created_date,1) as minggu
									 from t_aset_masuk 
									 group by aset_id , WEEK(created_date,1)
								    ) masuk'.$i.' on masuk'.$i.'.aset_id = m_aset.aset_id and masuk'.$i.'.minggu = '.$i.'
						LEFT JOIN (select aset_id ,sum(aset_qty) as qty , WEEK(created_date,1) as minggu
									 from t_aset_keluar 
									 group by aset_id , WEEK(created_date,1)
								  ) keluar'.$i.' on keluar'.$i.'.aset_id = m_aset.aset_id 
									 and masuk'.$i.'.minggu = keluar'.$i.'.minggu
						 ';
			}
			$index++; 
		}
		$indexMax = $index;
		$query = $select."
		FROM m_aset ".$join." order by m_aset.aset_id";
		$result = $this->db->query($query);
		$res = array();
		foreach ($result->result_array() as $row)
		{
			$array = array();
			$array['nama_aset'] = $row['nama_aset'];
			for ($i=1; $i <$indexMax ; $i++) { 
				if($type =='rekap')
				{
					$array['minggu'.$i] = $row['qty'.$i];
				}
				elseif ($type =='detail') 
				{
					$array['masuk'.$i] = $row['masuk'.$i];
					$array['keluar'.$i] = $row['keluar'.$i];
				}
			}
			array_push($res, $array);
		}

		return array('indexMax' => $indexMax-1 , 'data' => $res);
	}

	public function getPemakaian($params)
	{
		extract($params);
		
		$tahun = intval(substr($periode, 0,4));
		$bulan = intval(substr($periode, 5,2));
		$where = '';
		// if($jenis_aset<>'')
		// {
		// 	$where .= "AND jenis_aset = ".$jenis_aset;
		// }
		if($aset_id)
		{
			$where .= "AND m_aset.aset_id = ".$aset_id;
		}
		
		$query = "SELECT m_aset.nama_aset , 
							m_jenis_aset.jenis_aset_name as jenis_aset
								, trans.created_date ,trans.type, trans.aset_qty , trans.pegawai_nama
					FROM m_aset
					INNER JOIN m_jenis_aset on m_jenis_aset.jenis_aset_id = m_aset.jenis_aset
					INNER JOIN (
							SELECT aset_id , aset_qty , tam.created_date, mu.pegawai_nama , 'Stok Masuk' as type
							FROM t_aset_masuk tam
							INNER JOIN m_user mu on tam.created_by = mu.user_id
							UNION
							SELECT aset_id , aset_qty , tak.created_date, mu.pegawai_nama , 'Stok Keluar' as type
							FROM t_aset_keluar tak
							INNER JOIN m_user mu on tak.created_by = mu.user_id
							) trans on trans.aset_id = m_aset.aset_id
					WHERE YEAR(trans.created_date) = ".$tahun." AND MONTH(trans.created_date) = ".$bulan." ".$where."
					order by m_aset.jenis_aset,m_aset.aset_id , trans.created_date";

		// return $query;

		$result = $this->db->query($query);

		$nama_aset = '';
		$jenis_aset = '';
		$resultData = array();
		foreach ($result->result() as $row)
		{
			array_push($resultData, array(
								'jenis_aset' 	=> $row->jenis_aset,
								'nama_aset' 	=> $row->nama_aset,
								'tgl_trans' 	=> date("Y-m-d",strtotime($row->created_date)),
								'type' 			=> $row->type,
								'jumlah' 		=> $row->aset_qty,
								'pegawai_nama' 	=> $row->pegawai_nama
							  ));
		}
		return $resultData;

	}

	public function getList()
	{
		$this->db->select("aset_id as id, nama_aset as text ");
		$this->db->from('m_aset');
		$this->db->where('status_aset',1);
		$get = $this->db->get();
		$result = $get->result();
		// var_dump($result);
		$array = array();
		foreach ($result as $row) {
			// $arr['id'] = $row->id;
			// $arr['text'] = $row->text;
			array_push($array, array(
				'id' => $row->id,
				'text' => $row->text
			));
		}
		return $array;
		// return array('results' => $array , 'pagination' => array('more' => false));
	}
}

?>