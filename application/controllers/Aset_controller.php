<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_aset');
	}
	
	public function v_create_aset() {
		$type = $_POST['type'];
		if($type == 'update')
		{
			$data = $this->m_aset->get_data($_POST['aset_id']);
		}
		else
		{
			$data = array();
		}
		$this->load->view('dist/create_aset',$data);
	}
	
	public function save_trans()
	{
		$data = array(
			'kode_aset' => $_POST['kode_aset'],
			'nama_aset' => $_POST['nama_aset'],
			'jenis_aset' => $_POST['jenis_aset'],
			'status_aset' => $_POST['status_aset'],
			'created_date' => $_POST['created_date'],
			'created_by' => $_POST['created_by'],
			'qty_aset' => $_POST['qty_aset'],
		);
		$result = $this->m_aset->save_trans($data);
	}
		
	
}
