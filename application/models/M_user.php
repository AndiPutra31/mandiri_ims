<?php


class M_user extends CI_Model{


	public function login_act($data)
	{
		extract($data);
		$flag = 0;
		$sql = "SELECT user_id , role FROM m_user WHERE user_name = ".$username." AND user_pass = ".md5($passwd);
		$result = $this->db->query($sql);
		$nbrows = $result->num_rows();
		if($nbrows)
		{
			$row = $result->row();
			$_SESSION[SESSION_USERID] = $row->user_id;
			$_SESSION[SESSION_USERROLE] = $row->role;
			$flag = 1;
		}

		return $flag;

	}

	public function save_trans($data)
	{
		extract($data);

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
		return $status;
	}

	public function list_user()
	{
		$query = "SELECT user_name, pegawai_nama , nip,role,status from m_user";
		$this->db->query($query);
		$result = $query->result_array();

		return $result;
	}

}

?>