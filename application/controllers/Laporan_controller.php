<?php
    
    Class laporan_controller extends CI_Controller{
        
        function __construct() {
            parent::__construct();
            $this->load->library('pdf');
            setlocale(LC_ALL, 'IND');
            $this->load->model('m_aset');

        }
        
        function createLaporan(){

            // $params = array(
            //                     'type'  => $this->input->post('type'),
            //                     'bulan' => $this->input->post('bulan'),
            //                     'tahun' => $this->input->post('tahun')
            //                 );

            //get data for the report
            $type = 'detail';
            $dataReport = $this->m_aset->getStock($type);
            extract($dataReport);

            // var_dump($data);
            // $indexMax = 4;
            $no=0;
            $i=1;
            error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
            $filename = 'Laporan Stok '.strftime('%B %Y').".pdf";
            if($type =='rekap')
            {
                $pdf = new FPDF('P', 'mm','A4');
                $maxPerPage = 4;
            }
            elseif ($type == 'detail') 
            {
                $pdf = new FPDF('L', 'mm','A4');
                $maxPerPage = 5;
            }
            
            if($indexMax < $maxPerPage)
            {
                $maxPerPage = $indexMax;
            }

            $pdf->AddPage();
            $pdf->SetFont('Arial','B',16);
            setlocale(LC_ALL, 'IND');
            $pdf->Cell(0,7,'Daftar Stok Formulir '.strftime('%B %Y'),0,1,'C');
            $pdf->Cell(10,7,'',0,1);
     
            $pdf->SetFont('Arial','B',10);
            if($type =='rekap')
            {
                $pdf->Cell(10,6,'No',1,0,'C');
                $pdf->Cell(60,6,'Jenis Form',1,0,'C');
                for ($i=1; $i <=$maxPerPage ; $i++) 
                { 
                    $pdf->Cell(20,6,'Minggu '.$i,1,0,'C');
                }     
            }
            elseif ($type == 'detail') 
            {
                $pdf->Cell(10,12,'No',1,0,'C');
                $pdf->Cell(50,12,'Jenis Form',1,0,'C');
                for ($i=1; $i <=$maxPerPage ; $i++) 
                { 
                    $pdf->Cell(44,6,'Minggu '.$i,1,0,'C');
                } 
                $pdf->Cell(0,6,'',0,0,'C');
                $pdf->Ln();
                $pdf->Cell(60,6,'',0,0);

                for ($i=1; $i <=$maxPerPage ; $i++) 
                { 
                    $pdf->Cell(22,6,'Stok Masuk ',1,0,'C');
                    $pdf->Cell(22,6,'Stok Keluar ',1,0,'C');

                } 
                
            }
            $pdf->Ln();
            $pdf->SetFont('Arial','',10);
            foreach ($data as $row){
                $no++;
                $result = $data[$no-1];
                $pdf->Cell(10,6,$no,1,0, 'C');
                if($type == 'rekap')
                {
                    $pdf->Cell(60,6,$result['nama_aset'],1,0);
                }
                elseif ($type == 'detail') 
                {
                    $pdf->Cell(50,6,$result['nama_aset'],1,0);
                }

                for ($i=1; $i <=$maxPerPage ; $i++) { 
                    if($type == 'rekap')
                    {
                        $pdf->Cell(20,6,$result['minggu'.$i],1,0,'C');
                    }
                    elseif ($type == 'detail') 
                    {
                        $pdf->Cell(22,6,$result['masuk'.$i],1,0,'C');
                        $pdf->Cell(22,6,$result['keluar'.$i],1,0,'C');
                    }

                }  
                $pdf->Ln();
            }
            $pdf->Output($filename,"I");
        }
    }
?>