<?php
header('Access-Control-Allow-Origin : *');
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
	
	public function v_create_user() {
		$type = $_POST['type'];
		if($type == 'update')
		{
			$data = $this->m_user->get_data($_POST['user_id']);
		}
		else
		{
			$data = array();
		}
		$this->load->view('dist/create_user',$data);
	}
	
	public function test()
	{
		$this->m_user->test();
	}
	public function save_trans()
	{
		$data = array(
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
			$array[] = $row->user_id;
			$array[] = $row->user_name;
			$array[] = $row->nip;
			$array[] = $row->pegawai_nama ;
			$array[] = $row->user_pass;
			$array[] = $row->role;
			$array[] = $row->status;
			if($row->status == 1)
			{
				$array[] = '<div class="badge badge-success">Aktif</div>';
			}
			else
			{
			    $array[] = '<div class="badge badge-info">Non Aktif</div>';

			}
			$array[] = '<button class="btn btn-primary" id="detailBtn">Detail</button>';
			$data[] = $array;
		}
		//total records
		$totNum = $this->m_user->get_all_data();

		//total records of filtered data
		$filNum = $this->m_user->filterData();


		$result = array(
			// 'draw' => intval($_POST["draw"]),
			'draw' => intval('1'),
			'recordsTotal' => $totNum,
			'recodsFiltered' =>$filNum,
			'data' => $data
		);

		echo json_encode($result);

	}
		
	
}
