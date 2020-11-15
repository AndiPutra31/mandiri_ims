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

		return $flag;

	}

	public function save_trans($data)
	{
		extract($data);
		if($type == 'insert')
		{
			$query = "SELECT 1
				  from m_user 
				  where user_name ='".$user_name."' and lower(pegawai_nama) = '".$pegawai_nama."' and nip = ".$nip." and status = 1 ";
			$this->db->query($query);
			$result = $query->result_array();
			$nbrows = $result->num_rows();
			$status = FALSE;
			if($nbrows)
			{
				$this->db->trans_begin();
				$param = array(
						'user_name' => $user_name,
						'user_pass' => md5($user_pass),
						'pegawai_nama' => $pegawai_nama,
						'nip' => $nip,
						'role' => $role,
						'created_date' => $_SESSION[SESSION_USERID],
						'created_by' => date("Y-m-d H:i:s") 				
					);
				$flag = 1;
				$this->db->insert('m_user', $param);
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
						'user_name' => $user_name,
						'user_pass' => md5($user_pass),
						'pegawai_nama' => $pegawai_nama,
						'nip' => $nip,
						'role' => $role,
						'status' => $status,
						'last_update_date' => $_SESSION[SESSION_USERID],
						'last_update_by' => date("Y-m-d H:i:s") 				
					);
			$this->db->set($param);
			$this->db->where('user_id', $user_id);
			$this->db->update('m_user');
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

	public function get_data($user_id)
	{
		
		$query = "SELECT user_name,passwd, pegawai_nama , nip,role,status from m_user";
		if($user_id <> '' && $user_id > 0)
		{
			$query .= " where user_id =".$user_id;
		}
		$this->db->query($query);
		$result = $query->result_array();

		return $result;
	}

}

?>