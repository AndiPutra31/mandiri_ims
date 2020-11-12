<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_trans extends CI_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_aset_trans');
	}

	public function index() {
		$data = array(
			'title' => "Asset Inventory In",
			'type' => "in"
		);
		$this->load->view('dist/form_in', $data);
	}

	public function index2() {
		$data = array(
			'title' => "Asset Inventory Out",
			'type' => "out"
		);
		$this->load->view('dist/form_in', $data);
	}

	public function save_trans()
	{
		$data = array(
				'trans_type' 	=> $_POST['type'],
				'kode_aset' 	=> $_POST['kode_aset'],
				'qty' 			=> $_POST['qty']
			);
		$result = $this->m_aset_trans->save_trans($data);
		echo $result;
	}

	public function trans_list() {
		$result=$this->m_aset_trans->trans_list();
		echo $result;
	}

}
