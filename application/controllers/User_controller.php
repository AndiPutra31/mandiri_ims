<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_user');
	}

	public function login() {
		$data = array(
			'username' => $_POST['username'],
			'passwd' => $_POST['passwd']
		);
		$result = $this->m_user->login_act($data);
		$this->load->view('dist/form_in', $data);
	}

	public function logout() {
		unset($_SESSION[SESSION_USERID]);
		unset($_SESSION[SESSION_USERROLE]);
		
		session_destroy();
		header("location: ../");

	}

}
