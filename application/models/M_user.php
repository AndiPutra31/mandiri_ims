<?php


class M_user extends CI_Model{

	public function login_act($data)
	{
		extract($data);
		$flag = 0;
		$sql = "SELECT user_id , role , pegawai_nama FROM m_user WHERE user_name = '".$username."' AND user_pass = '".md5($passwd)."'";
		$result = $this->db->query($sql);
		$nbrows = $result->num_rows();
		if($nbrows)
		{
			$row = $result->row();
			$_SESSION['SESSION_USERID'] = $row->user_id;
			$_SESSION['SESSION_USERROLE'] = $row->role;
			$_SESSION['SESSION_USERNAME'] = $row->pegawai_nama;
			$flag = 1;
		}
		// var_dump($_SESSION);
		// exit();
			
		return $flag;

	}


	public function save_trans($data)
	{
		extract($data);
		if(strtolower($type) == 'insert')
		{
			
			$query = $this->db->query("SELECT 1
				  from m_user 
				  where user_name ='".$username."' and lower(pegawai_nama) = '".$pegawai_nama."' and nip = ".$nip." and status = 1 ");
			$result = $query->result_array();

			if(count($result) < 1)
			{
				$this->db->trans_begin();
				$param = array(
						'user_name' => $username,
						'user_pass' => md5($passwd),
						'pegawai_nama' => $pegawai_nama,
						'nip' => $nip,
						'role' => $role,
						'status' =>$status,
						'created_date' => $_SESSION['SESSION_USERID'],
						'created_by' => date("Y-m-d H:i:s") 				
					);
				$flag = 1;
				$this->db->insert('m_user', $param);
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
						'user_name' => $username,
						'pegawai_nama' => $pegawai_nama,
						'nip' => $nip,
						'role' => $role,
						'status' => $status,
						'last_update_date' => $_SESSION['SESSION_USERID'],
						'last_updated_by' => date("Y-m-d H:i:s") 				
					);
			if($passwd<>'')
			{
						$param['user_pass'] = md5($passwd);
			}
			$this->db->set($param);
			$this->db->where('user_id', $user_id);
			$this->db->update('m_user');
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

		$this->db->select("user_id,user_name,user_pass, pegawai_nama , nip,role,status ");
		$this->db->from('m_user');
		if(isset($_POST['search']['value']))
		{
			$this->db->like('lower(user_name)',strtolower($_POST['search']['value']));
			$this->db->or_like('lower(pegawai_nama)',strtolower($_POST['search']['value']));
			if(is_numeric($_POST['search']['value']))
			{
				$this->db->or_like('nip',intval($_POST['search']['value']));
			}

			if(isset($_POST["order"]))
			{
				$this->db->order_by(
					$_POST["order"]['0']["column"],
					$_POST["order"]['0']["dir"]);
			}
			else
			{
				$this->db->order_by("user_id","ASC");
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
		$this->db->from('m_user');
		return $this->db->count_all_results();
	}

	public function reset()
	{
		$this->db->empty_table('t_aset_keluar');
		$this->db->empty_table('t_aset_masuk');
		$this->db->empty_table('t_report');
		// $this->db->empty_table('m_jenis_aset');
		$this->db->empty_table('m_aset_hist');
		$this->db->empty_table('m_aset');
		$this->db->query("Delete from m_user WHERE user_name <> 'admin'");
		$result = "ok";
		return $result;
	}

}

?>