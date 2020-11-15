<?php
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
		var_dump($result);
		exit();
		// $this->load->view(base_url(), $data);
	}

	public function logout() {
		unset($_SESSION['SESSION_USERID']);
		unset($_SESSION['SESSION_USERROLE']);
		unset($_SESSION['SESSION_USERNAME']);
		
		session_destroy();
		header("location: ../");

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
	
	public function save_trans()
	{
		$data = array(
			'nama_pegawai' => $_POST['nama_pegawai'],
			'nip' => $_POST['nip'],
			'username' => $_POST['username'],
			'passwd' => $_POST['passwd'],
			'type' => $_POST['type']
		);
		$result = $this->m_user->save_trans($data);
	}
		
	
}
