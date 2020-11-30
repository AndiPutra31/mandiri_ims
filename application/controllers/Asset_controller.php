<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class asset_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		session_start();
		$this->load->model('m_aset');
	}
	
	public function listAset() {
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

	public function test()
	{
		$type = 'detail';
        $params = array(
                            'type'  => $type,
                            'month' => 12,
                            'year' => 2020
                        );
		extract($params);
		//get week index
		$firstDate = mktime(0, 0, 0, $month, 1, $year);
		$lastDate = mktime(0, 0, 0, $month, date('t', $firstDate), $year);
		// //get first and last Day of month
		// $firstDate = date("Y-m-d", strtotime("'".$year."-".$month."-01'"));
		// $lastDate = date("Y-m-t", strtotime("'".$year."-".$month."-01"));
		
		//get day
		$firstDay = date("D",$firstDate);
		$lastDay = date("D",$lastDate);

		//get week
		$start_week = intval(date('W', $firstDate));
		$end_week = intval(date('W', $lastDate));

		echo $lastDay."<br><br>";

		if(strtolower($lastDay) <> 'sun')
		{
			$end_week -= 1;
		}

		$join ='';
		// echo 'start : '.$start_week." end : ".$end_week."<br>";
		$select  = 'SELECT m_aset.nama_aset';
		$index = 1;
		for ($i=$start_week; $i <=$end_week ; $i++) { 
			if($type =='rekap')
			{
				$select .= ',coalesce(masuk'.$i.'.qty,0) - coalesce(keluar'.$i.'.qty,0) as qty'.$index;
				$join .= "LEFT JOIN (select aset_id ,sum(aset_qty) as qty 
											 from t_aset_masuk 
											 where WEEK(created_date,1) <= ".$i."
											 group by aset_id ) masuk".$i." on masuk".$i.".aset_id = m_aset.kode_aset
						LEFT JOIN (select aset_id ,sum(aset_qty) as qty
											 from t_aset_keluar 
											 where WEEK(created_date,1) <= ".$i."
											 group by aset_id ) keluar".$i." on keluar".$i.".aset_id = m_aset.kode_aset 
											 ";
			}
			elseif ($type =='detail') 
			{
				$select .= ',coalesce(masuk'.$i.'.qty,0) as masuk'.$index.', coalesce(keluar'.$i.'.qty,0) as keluar'.$index;
				$whereGroup = "group by aset_id , WEEK(created_date,1)";	
				$join .= 'LEFT JOIN (select aset_id ,sum(aset_qty) as qty , WEEK(created_date,1) as minggu
									 from t_aset_masuk 
									 group by aset_id , WEEK(created_date,1)
								    ) masuk'.$i.' on masuk'.$i.'.aset_id = m_aset.kode_aset and masuk'.$i.'.minggu = '.$i.'
						LEFT JOIN (select aset_id ,sum(aset_qty) as qty , WEEK(created_date,1) as minggu
									 from t_aset_keluar 
									 group by aset_id , WEEK(created_date,1)
								  ) keluar'.$i.' on keluar'.$i.'.aset_id = m_aset.kode_aset 
									 and masuk'.$i.'.minggu = keluar'.$i.'.minggu
						 ';
			}
			$index++; 
		}
		$indexMax = $index;
		$query = $select."
		FROM m_aset ".$join." order by m_aset.aset_id";
		echo $query;
		// $result = $this->db->query($query);
		// $res = array();
		// foreach ($result->result_array() as $row)
		// {
		// 	$array = array();
		// 	$array['nama_aset'] = $row['nama_aset'];
		// 	for ($i=1; $i <$indexMax ; $i++) { 
		// 		$array['minggu'.$i] = $row['qty'.$i];
		// 	}
		// 	array_push($res, $array);
		// }

		// var_dump($res);
	}

	public function test2()
	{

		$params = array(
						'bulan' => 11,
						'tahun'	=> 2020,
						'jenis_aset' => 1,
						'aset_id'	=> ''
		);
		$result = $this->m_aset->getPemakaian($params);

		var_dump($result);
	}
}
