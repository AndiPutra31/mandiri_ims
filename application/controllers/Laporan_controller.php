<?php
    
    Class laporan_controller extends CI_Controller{
        
        function __construct() {
            parent::__construct();
            $this->load->library('pdf');
            setlocale(LC_ALL, 'IND');
            $this->load->model('m_aset');

        }
        
        public function laporanStok() {
            $data = array(
                'title' => "Laporan Stok"
            );
            $this->load->view('dist/v_laporan', $data);
        }

        public function laporanPenggunaan() {
            $aset = $this->m_aset->getList();
            $data = array(
                'title' => "Laporan Penggunaan",
                'aset'  => $aset
            );
            $this->load->view('dist/v_laporan_penggunaan', $data);
        }

        public function createLaporan()
        {
            $params = array(
                                'type'  => $this->input->post('type'),
                                'periode' => $this->input->post('periode')
                            );
            // $params = array(
            //                     'type'  => $type,
            //                     'month' => 12,
            //                     'year' => 2020
            //                 );
            //get data for the report
            extract($params);
            $dataReport = $this->m_aset->getStock($params);
            extract($dataReport);

            // var_dump($data);
            // $indexMax = 4;
            $no=0;
            $i=1;
            error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
            $maxPerPage = 4;
            if($type =='rekap')
            {
                $filename = 'reports/Laporan Rekap Stok '.strftime('%B %Y',strtotime($periode."-01")).".pdf";
                $pdf = new FPDF('P', 'mm','A4');
                $title = 'Daftar Stok Formulir '.strftime('%B %Y',strtotime($periode."-01"));
            }
            elseif ($type == 'detail') 
            {
                $filename = 'reports/Laporan Detail Stok '.strftime('%B %Y',strtotime($periode."-01")).".pdf";
                $pdf = new FPDF('L', 'mm','A4');
                // $title = 'Laporan Stok Aset Bank '.$tanggal;
                $title = 'Laporan Stok Aset Bank '.strftime('%B %Y',strtotime( $periode."-01"));
            }
            
            if($indexMax < $maxPerPage)
            {
                $maxPerPage = $indexMax;
            }

            //deletes old reports
            $this->deleteFiles();

            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            setlocale(LC_ALL, 'IND');
            $pdf->Cell(0,7,$title,0,1,'C');
            $pdf->Cell(10,7,'',0,1);
     
            $pdf->SetFont('Arial','B',10);
            if($type =='rekap')
            {
                $pdf->SetLeftMargin(25);
                $pdf->Cell(10,6,'No',1,0,'C');
                $pdf->Cell(60,6,'Jenis Form',1,0,'C');
                for ($i=1; $i <=$maxPerPage ; $i++) 
                { 
                    $pdf->Cell(20,6,'Minggu '.$i,1,0,'C');
                }     
            }
            elseif ($type == 'detail') 
            {
                $pdf->SetLeftMargin(15);
                $pdf->Cell(10,12,'No',1,0,'C');
                $pdf->Cell(60,12,'Jenis Form',1,0,'C');
                for ($i=1; $i <=$maxPerPage ; $i++) 
                { 
                    $pdf->Cell(50,6,'Minggu '.$i,1,0,'C');
                } 
                $pdf->Cell(0,6,'',0,0,'C');
                $pdf->Ln();
                $pdf->Cell(70,6,'',0,0);

                for ($i=1; $i <=$maxPerPage ; $i++) 
                { 
                    $pdf->Cell(25,6,'Stok Masuk ',1,0,'C');
                    $pdf->Cell(25,6,'Stok Keluar ',1,0,'C');

                } 
                
            }
            $pdf->Ln();
            $pdf->SetFont('Arial','',10);
            foreach ($data as $row){
                $no++;
                $result = $data[$no-1];
                $pdf->Cell(10,6,$no,1,0, 'C');
                $pdf->Cell(60,6,$result['nama_aset'],1,0);

                for ($i=1; $i <=$maxPerPage ; $i++) { 
                    if($type == 'rekap')
                    {
                        $pdf->Cell(20,6,$result['minggu'.$i],1,0,'C');
                    }
                    elseif ($type == 'detail') 
                    {
                        $pdf->Cell(25,6,$result['masuk'.$i],1,0,'C');
                        $pdf->Cell(25,6,$result['keluar'.$i],1,0,'C');
                    }

                }  
                $pdf->Ln();
            }
            $pdf->Output($filename,"F");

            echo json_encode(array('status' => 'success' , 'filename' => $filename));
        }

        // fungsi untuk membuat laporan pemakaian aset
        // parameter : jenis aset , bulan tahun , nama_aset 
        function createLaporanPemakaian()
        {
            $params = array(
                            'aset_id'  => $this->input->post('aset_id'),
                            'periode' => $this->input->post('periode')
                        );
            $result = $this->m_aset->getPemakaian($params);
            // var_dump($result);
            $no=0;
            error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
            
            //deletes old reports
            $this->deleteFiles();

            $filename = 'reports/Laporan Pemakaian Aset '.strftime('%B %Y',strtotime($periode."-01")).".pdf";
            $pdf = new FPDF('P', 'mm','A4');
            $title = 'Laporan Pemakaian Aset '.strftime('%B %Y',strtotime($periode."-01"));
            
            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            $image1 = base_url()."assets/img/mandiri_logo.png";
            $pdf->Cell( 0, 10, $pdf->Image($image1, $pdf->GetX()+160, $pdf->GetY()-5, 33.78), 0, 0, 'C', false );
            $pdf->Ln();
            $pdf->Cell(0,7,'LAPORAN PEMAKAIAN ASET BANK',0,1,'C');
            $pdf->Cell(0,7,strftime('%B %Y',strtotime($periode."-01")),0,1,'C');
            
            $pdf->Ln();
            
            $jenis_aset = '';
            $nama_aset = '';
            $flag= 0;
            foreach ($result as $row)
            {
                // if($jenis_aset<>$row["jenis_aset"])
                // {
                //     $pdf->Ln();
                //     $pdf->Cell(25,6,'Jenis Aset',0,0,'');
                //     $pdf->Cell(10,6,':',0,0,'');
                //     $pdf->Cell(60,6,$row['jenis_aset'],0,0,'');
                //     $jenis_aset = $row['jenis_aset'];
                //     $pdf->Ln();
                //     $flag = 0;
                // }
                if($nama_aset <> $row['nama_aset'])
                {
                    $flag ++;
                    $no = 0;
                    if($flag > 1)
                    {
                        $pdf->Ln();
                    }
                    
                    $pdf->SetFont('Arial','',12);
                    $pdf->Cell(25,6,'Nama Aset',0,0,'');
                    $pdf->Cell(10,6,':',0,0,'');
                    $pdf->SetFont('Arial','B',12);
                    $pdf->Cell(60,6,$row['nama_aset'],0,0,'');
                    $nama_aset = $row['nama_aset'];
                    $pdf->Ln();

                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(10,6,'No',1,0,'C');
                    $pdf->Cell(50,6,'Tgl. Transaksi',1,0,'C');
                    $pdf->Cell(50,6,'Keterangan',1,0,'C');
                    $pdf->Cell(30,6,'Jumlah',1,0,'C');
                    $pdf->Cell(40,6,'User',1,0,'C');
                    $pdf->Ln();

                }
                $no++;
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(10,6,$no,1,0,'C');
                $pdf->Cell(50,6,$row['tgl_trans'],1,0,'C');
                $pdf->Cell(50,6,$row['type'],1,0,'C');
                // $pdf->Cell(10,6,'',0,0,'L');
                $pdf->Cell(20,6,$row['jumlah'],'L,B',0,'R');
                $pdf->Cell(10, 6, '', 'B', 0, 'L');
                $pdf->Cell(40,6,$row['pegawai_nama'],1,0,'C');

                $pdf->Ln();

                //header pdf : nama aset
                // $pdf->SetFont('Arial','B',12);
                // $pdf->Cell(0,7,$nama_aset.strftime('%B %Y'),0,1,'C');

            }
            // $pdf->Cell(0,7,'Jenis Aset : '.$jenis_aset,0,1,'C');
            
            $pdf->Output($filename,"F");
            echo json_encode(array('status' => 'success' , 'filename' => $filename));
            
        }

        function deleteFiles()
        {
            $dir = 'reports';
            if (is_dir($dir)) 
            { 
                // echo 'ya';
             $objects = scandir($dir);
             foreach ($objects as $object) { 
               if ($object != "." && $object != "..") { 
                 // if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
                 //   rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                 // else
                    // echo $object.'<br>';
                   unlink($dir. DIRECTORY_SEPARATOR .$object); 
               } 
             }
             // rmdir($dir); 
           } 
           else
           {
            echo 'tidak';
           }
        }
    }
?>