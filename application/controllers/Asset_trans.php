<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_trans extends CI_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_aset_trans');
	}

	public function input() {
		$data = array(
			'title' => "Aset Masuk",
			'type' => "in"
		);
		$this->load->view('dist/form_in', $data);
	}

	public function output() {
		$data = array(
			'title' => "Aset Keluar",
			'type' => "out"
		);
		$this->load->view('dist/form_in', $data);
	}

	public function save_trans()
	{
		$data = array(
				'trans_type' 	=> $_POST['type'],
				'aset_id' 	=> $_POST['aset_id'],
				'qty' 			=> $_POST['qty']
			);
		$result = $this->m_aset_trans->save_trans($data);
		echo json_encode($result);
	}

	public function trans_list() {
		$result=$this->m_aset_trans->trans_list();
		echo $result;
	}

}
