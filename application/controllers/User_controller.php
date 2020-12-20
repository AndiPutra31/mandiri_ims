<?php
header('Access-Control-Allow-Origin:*');
defined('BASEPATH') OR exit('No direct script access allowed');
class User_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_user');
	}

	public function login() {
		
		// exit();
		$data = array(
			'username' => $_POST['username'],
			'passwd' => $_POST['passwd']
		);
		$result = $this->m_user->login_act($data);
	}

	public function logout() {
		unset($_SESSION['SESSION_USERID']);
		unset($_SESSION['SESSION_USERROLE']);
		unset($_SESSION['SESSION_USERNAME']);
		
		session_destroy();
		// var_dump($_SESSION);
		header("location: ".base_url()."dist/index");

	}
	
	public function index() {
		$data = array(
			'title' => "Master User"
		);
		$this->load->view('dist/users', $data);
	}

	public function save_trans()
	{
		$data = array(
			"user_id"      => $this->input->post('user_id'), 
			"username"      => $this->input->post('username'), 
	        "passwd"        => $this->input->post('passwd'),
	        "pegawai_nama"  => $this->input->post('pegawai_nama'),
	        "nip"           => $this->input->post('nip'),
	        "status"        => $this->input->post('status'),
	        "role"          => $this->input->post('role'),
	        "type"          => $this->input->post('type')
		);
		$result = $this->m_user->save_trans($data);
		// var_dump($result);
		echo json_encode($result);
	}

	public function getData()
	{
		$fetch_data = $this->m_user->get_data();
		$data = array();
		foreach ($fetch_data as $row) 
		{
			$array = array();
			$array['user_id'] = $row->user_id;
			$array['user_name'] = $row->user_name;
			$array['nip'] = $row->nip;
			$array['pegawai_nama'] = $row->pegawai_nama ;
			$array['user_pass'] = $row->user_pass;
			$array['role'] = $row->role;
			$array['status'] = $row->status;
			// $array[] = $row->user_id;
			// $array[] = $row->user_name;
			// $array[] = $row->nip;
			// $array[] = $row->pegawai_nama ;
			// $array[] = $row->user_pass;
			// $array[] = $row->role;
			// $array[] = $row->status;
			// if($row->status == 1)
			// {
			// 	$array[] = '<div class="badge badge-success">Aktif</div>';
			// }
			// else
			// {
			//     $array[] = '<div class="badge badge-info">Non Aktif</div>';

			// }
			// $array[] = '<button class="btn btn-primary" id="detailBtn" onclick="update()">Detail</button> <script type="text/javascript"> </script>';
			$data[] = $array;
		}
		//total records
		$totNum = $this->m_user->get_all_data();

		//total records of filtered data
		$filNum = $this->m_user->filterData();


		$result = array(
			'draw' => intval($_POST["draw"]),
			// 'draw' => intval('1'),
			'recordsTotal' => $totNum,
			'recordsFiltered' =>$filNum,
			'data' => $data
		);

		echo json_encode($result);

	}

	public function reset()
	{
		$result = $this->m_user->reset();
		var_dump($result);
		if ($result == "ok") {
			$this->logout();
		}
		echo json_encode($result);
	}
		
	
}
