<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class asset_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_aset');
	}
	
	public function index() {
		$data = array(
			'title' => "Master Asset"
		);
		$this->load->view('dist/asset', $data);
	}

	public function save_trans()
	{
		$data = array(
			'aset_id'		=> $this->input->post('aset_id'), 
			'aset_kode'	=> $this->input->post('aset_kode'), 
			'aset_name'	=> $this->input->post('aset_name'), 
			'jenis_aset'	=> $this->input->post('jenis_aset'), 
			'status'		=> $this->input->post('status'), 
			'type'			=> $this->input->post('type'), 

		);
		$result = $this->m_aset->save_trans($data);
		// var_dump($result);
		echo json_encode($result);
	}

	public function getData()
	{
		$fetch_data = $this->m_aset->get_data();
		$data = array();
		foreach ($fetch_data as $row) 
		{
			$array = array();
			$array['aset_id'] = $row->aset_id;
			$array['aset_kode'] = $row->kode_aset;
			$array['aset_name'] = $row->nama_aset;
			$array['jenis_aset_id'] = $row->jenis_aset_id;			
			$array['jenis_aset'] = $row->jenis_aset ;
			$array['status'] = $row->status;
			$array['qty'] = $row->qty_aset;
			$data[] = $array;
		}
		//total records
		$totNum = $this->m_aset->get_all_data();

		//total records of filtered data
		$filNum = $this->m_aset->filterData();


		$result = array(
			'draw' => intval($_POST["draw"]),
			// 'draw' => intval('1'),
			'recordsTotal' => $totNum,
			'recordsFiltered' =>$filNum,
			'data' => $data
		);

		echo json_encode($result);

	}

	public function search()
	{
		$result = $this->m_aset->get_quantity();

		echo json_encode($result);
	}

}
