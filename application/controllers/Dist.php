<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dist extends CI_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_aset');
		$this->load->model('m_aset_trans');
	}

	public function index() {
		if(!empty($_SESSION))
		{
			if($_SESSION['SESSION_USERID'])
			{
				if($_SESSION['SESSION_USERROLE'] ==1)
				{
					$this->index_0();
				}
				else
				{
					$data = array(
						'title' => "Asset Inventory In",
						'type' => "in"
					);
					$this->load->view('dist/form_in', $data);
				}
			}
		}
		else
		{
			$data = array(
				'title' => "Login",
			);
			$this->load->view('dist/auth-login', $data);

		}
	}

	public function jumlah_tipe_aset(){
		$result = $this->m_aset->get_all_data();
		// echo json_encode($result);
		return $result;
	}

	public function total_aset(){
		$result = $this->m_aset->total_qty();
		$total = $result[0];
		// var_dump($total);
		$total_qty = $total->qty_aset;
		return $total_qty;
	}

	public function min_aset($batas){
		$result = $this->m_aset->min_qty($batas);
		return $result;
	}

	public function max_aset(){
		$result = $this->m_aset->max_qty();
		// echo json_encode($result);
		return $result;
	}

	public function last_in(){
		$result = $this->m_aset_trans->terakhir_masuk();
		// echo json_encode($result);
		// var_dump($result);
		return $result;
	}

	public function last_out(){
		$result = $this->m_aset_trans->terakhir_keluar();
		// echo json_encode($result);
		return $result;
	}

	public function index_0() {
		$data = array(
			'title' 	=> "General Dashboard",
			'dataIn' 	=> $this->last_in(),
			'dataOut' 	=> $this->last_out(),
			'dataStok' 	=> $this->min_aset(5),
			'totalQty' 	=> $this->total_aset(),
			'totalAset' => $this->jumlah_tipe_aset(),
			'minAset' 	=> $this->min_aset(1),
			'maxAset' 	=> $this->max_aset()
		);
		$this->load->view('dist/index-0', $data);
	}
}
