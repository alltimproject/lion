<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('pdf');
    $this->load->model('admin/m_reschedule');
    $this->load->model('acc/m_dashboard');
    $this->load->model('acc/m_laporan');
    $this->load->helper('tanggal');
    //Codeigniter : Write Less Do More
  }

  function refundSuccess()
  {
       $pdf = new FPDF('l','mm','A4');
       // membuat halaman baru
       $pdf->AddPage();
       // setting jenis font yang akan digunakan
       $pdf->SetFont('Arial','B',16);
       $pdf->Cell(190,7,'LAPORAN REFUND',0,1);
       $pdf->SetFont('Arial','B',7);
       $pdf->Cell(190,7,'TANGGAL '.date('Y-m-d'),0,1);
       $pdf->Image('images/bg03.png',230,10,50,20);


       foreach ($this->m_laporan->getRefundsuccess()->result() as $row){

           $pdf->Cell(10,7,'',0,1);
           $pdf->SetFont('Arial','B',10);
           $pdf->Cell(50,6,'NO. REFUND',1,0);
           $pdf->Cell(85,6,'PENGAJU REFUND',1,0);
           $pdf->Cell(60,6,'EMAIL',1,0);
           $pdf->Cell(45,6,'TANGGAL REFUND',1,0);
           $pdf->Cell(45,6,'TOTAL',1,1);

           $pdf->SetFont('Arial','',10);

           $pdf->Cell(50,36,$row->no_refund,1,0,'C');
           $pdf->Cell(85,36,$row->refund_name,1,0, 'C');
           $pdf->Cell(60,6,$row->refund_email,1,0);
           $pdf->Cell(45,6,$row->tgl_refund,1,0);
           $pdf->Cell(45,6,number_format($row->total_refund),1,1);
               $pdf->Cell(50,6,'',0,0);
               $pdf->Cell(85,6,'',0,0);
                     $pdf->SetFont('Arial','B',10);
                     $pdf->Cell(60,6,'Nama Bank',1,0);
                     $pdf->Cell(90,6,$row->nama_bank,1,1);
               $pdf->Cell(50,6,'',0,0);
               $pdf->Cell(85,6,'',0,0);
                     $pdf->Cell(60,6,'Cabang',1,0);
                     $pdf->Cell(90,6,$row->cabang,1,1);
               $pdf->Cell(50,6,'',0,0);
               $pdf->Cell(85,6,'',0,0);
                     $pdf->Cell(60,6,'No Rekening',1,0);
                     $pdf->Cell(90,6,$row->no_rekening,1,1);
               $pdf->Cell(50,6,'',0,0);
               $pdf->Cell(85,6,'',0,0);
                     $pdf->Cell(60,6,'Nama Rekening',1,0);
                     $pdf->Cell(90,6,$row->nama_rekening,1,1);
               $pdf->Cell(50,6,'',0,0);
               $pdf->Cell(85,6,'',0,0);
                     $pdf->Cell(60,6,'Dikonfirmasi oleh',1,0);
                     $pdf->Cell(90,6,$row->confirm_by,1,1);
       }


   $pdf->Output();
  }

  function lap_kode_refund($get_kode)
  {
    $selectRefund = $this->m_laporan->get_refund_kode($get_kode);
    $pdf = new FPDF('L','mm','A4');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'',0,1);
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(190,7,'TANGGAL PRINT '.date('Y-m-d'),0,1);
    $pdf->Image('images/bg03.png',230,10,50,30);

    foreach($selectRefund->result() as $key ){
      $pdf->ln(25);
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(50,7,'Email',1,0);
      $pdf->Cell(70,7,': '.$key->refund_email,1,1);
      $pdf->Cell(50,7,'Nama Lengkap',1,0);
      $pdf->Cell(70,7,': '.$key->refund_name,1,1);
      $pdf->Cell(50,7,'Alamat',1,0);
      $pdf->Cell(70,7,': '.$key->refund_alamat,1,1);
      $pdf->Cell(50,7,'Telepon',1,0);
      $pdf->Cell(70,7,': '.$key->refund_telepon,1,1);

      $pdf->Cell(10,7,'',0,1);
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(275,16,'NO. REFUND - '.$get_kode,1,1,'C');

      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(138,10,'Tanggal Refund',1,0,'C');
      $pdf->Cell(137,10,$key->tgl_refund,1,1,'C');
      //isi
      $pdf->Cell(138,10,'Total Refund',1,0,'C');
      $pdf->Cell(137,10,$key->total_refund,1,1,'C');

      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(275,16,'Pembayaran',1,1,'C');

      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(65,10,'Nama Bank',1,0,'C');
      $pdf->Cell(70,10,'Cabang',1,0,'C');
        $pdf->Cell(70,10,'No. Rekening',1,0,'C');
          $pdf->Cell(70,10,'Nama Rekening',1,1,'C');
      //isi
      $pdf->Cell(65,10,$key->nama_bank,1,0,'C');
      $pdf->Cell(70,10,$key->cabang,1,0,'C');
        $pdf->Cell(70,10,$key->no_rekening,1,0,'C');
          $pdf->Cell(70,10,$key->nama_rekening,1,1,'C');

    }
    $pdf->Output();
  }

  function pertanggal()
  {
    $from =  $_GET['from'];
    $to   =  $_GET['to'];

    $pdf = new FPDF('L','mm','A4');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'',0,1);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(190,7,'LAPORAN TANGGAL '.tanggal_indo(date('Y-m-d', strtotime($from)) ).' - '.tanggal_indo(date('Y-m-d', strtotime($to)) ),0,1);
    $pdf->Image('images/bg03.png',230,10,50,30);

    $pdf->ln(15);
        foreach($this->m_dashboard->pertanggal_laporan($from,$to)->result() as $row){
       $pdf->Cell(10,7,'',0,1);
       $pdf->SetFont('Arial','B',10);
       $pdf->Cell(50,6,'NO. REFUND',1,0);
       $pdf->Cell(85,6,'PENGAJU REFUND',1,0);
       $pdf->Cell(60,6,'EMAIL',1,0);
       $pdf->Cell(45,6,'TANGGAL REFUND',1,0);
       $pdf->Cell(45,6,'TOTAL',1,1);

       $pdf->SetFont('Arial','',10);

       $pdf->Cell(50,36,$row->no_refund,1,0,'C');
       $pdf->Cell(85,36,$row->refund_name,1,0, 'C');
       $pdf->Cell(60,6,$row->refund_email,1,0);
       $pdf->Cell(45,6,$row->tgl_refund,1,0);
       $pdf->Cell(45,6,number_format($row->total_refund),1,1);
           $pdf->Cell(50,6,'',0,0);
           $pdf->Cell(85,6,'',0,0);
                 $pdf->SetFont('Arial','B',10);
                 $pdf->Cell(60,6,'Nama Bank',1,0);
                 $pdf->Cell(90,6,$row->nama_bank,1,1);
           $pdf->Cell(50,6,'',0,0);
           $pdf->Cell(85,6,'',0,0);
                 $pdf->Cell(60,6,'Cabang',1,0);
                 $pdf->Cell(90,6,$row->cabang,1,1);
           $pdf->Cell(50,6,'',0,0);
           $pdf->Cell(85,6,'',0,0);
                 $pdf->Cell(60,6,'No Rekening',1,0);
                 $pdf->Cell(90,6,$row->no_rekening,1,1);
           $pdf->Cell(50,6,'',0,0);
           $pdf->Cell(85,6,'',0,0);
                 $pdf->Cell(60,6,'Nama Rekening',1,0);
                 $pdf->Cell(90,6,$row->nama_rekening,1,1);
           $pdf->Cell(50,6,'',0,0);
           $pdf->Cell(85,6,'',0,0);
                 $pdf->Cell(60,6,'Dikonfirmasi oleh',1,0);
                 $pdf->Cell(90,6,$row->confirm_by,1,1);

        }
    $pdf->Output();
  }

  function lapReschedule()
  {
    $pdf = new FPDF('l','mm','A4');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'LAPORAN RESCHEDULE',0,1);
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(190,7,'TANGGAL '.date('Y-m-d'),0,1);
    $pdf->Image('images/bg03.png',230,10,50,20);

    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50,6,'NO. RESCHEDULE',1,0);
    $pdf->Cell(85,6,'PENGAJU REFUND',1,0);
    $pdf->Cell(60,6,'EMAIL',1,0);
    $pdf->Cell(45,6,'TANGGAL RESCHEDULE',1,0);
    $pdf->Cell(45,6,'TOTAL',1,1);

    foreach($this->m_reschedule->get_reschedule()->result() as $key){
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(50,6,$key->no_reschedule,1,0);
      $pdf->Cell(85,6,$key->reschedul_name,1,0);
      $pdf->Cell(60,6,$key->reschedul_email,1,0);
      $pdf->Cell(45,6,$key->tgl_reschedul,1,0);
      $pdf->Cell(45,6,$key->total_reschedul,1,1);
    }




    $pdf->Output();
  }

  function lap_kode_reschedul($kode)
  {
    $selectData = $this->m_reschedule->get_reschedule_kode($kode);
    $pdf = new FPDF('l','mm','A4');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'NO. RESCHEDULE : '.$kode,0,1);
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(190,7,'TANGGAL '.date('Y-m-d'),0,1);
    $pdf->Image('images/bg03.png',230,10,50,20);


    foreach($this->m_reschedule->get_reschedule_kode($kode)->result() as $key ){

      $pdf->ln(25);
      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(50,7,'Email',1,0);
      $pdf->Cell(70,7,': '.$key->reschedul_email,1,1);
      $pdf->Cell(50,7,'Nama Lengkap',1,0);
      $pdf->Cell(70,7,': '.$key->reschedul_name,1,1);
      $pdf->Cell(50,7,'Alamat',1,0);
      $pdf->Cell(70,7,': '.$key->reschedul_alamat,1,1);
      $pdf->Cell(50,7,'Telepon',1,0);
      $pdf->Cell(70,7,': '.$key->reschedul_telepon,1,1);

      $pdf->Cell(10,7,'',0,1);
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(275,16,'NO. RESCHEDULE - '.$key->no_reschedule,1,1,'C');

      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(138,10,'Tanggal Refund',1,0,'C');
      $pdf->Cell(137,10,$key->tgl_reschedul,1,1,'C');
      //isi
      $pdf->Cell(138,10,'Total Reschedule',1,0,'C');
      $pdf->Cell(137,10,$key->total_reschedul,1,1,'C');



    }
    $pdf->Output();
  }

  function pertanggal_reschedule()
  {
    $from =  $_GET['from'];
    $to   =  $_GET['to'];

    $pdf = new FPDF('L','mm','A4');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'',0,1);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(190,7,'LAPORAN TANGGAL '.tanggal_indo(date('Y-m-d', strtotime($from)) ).' - '.tanggal_indo(date('Y-m-d', strtotime($to)) ),0,1);
    $pdf->Image('images/bg03.png',230,10,50,30);
    $pdf->ln(15);

    foreach($this->m_dashboard->pertanggal_laporan_reschedule($from, $to)->result() as $key) {

             $pdf->Cell(10,7,'',0,1);
             $pdf->SetFont('Arial','B',10);
             $pdf->Cell(50,6,'NO. RESCHEDULE',1,0);
             $pdf->Cell(85,6,'PENGAJU RESCHEDULE',1,0);
             $pdf->Cell(60,6,'EMAIL',1,0);
             $pdf->Cell(45,6,'TANGGAL RESHCEDULE',1,0);
             $pdf->Cell(45,6,'TOTAL',1,1);

             $pdf->SetFont('Arial','',10);

             $pdf->Cell(50,6,$key->no_reschedule,1,0,'C');
             $pdf->Cell(85,6,$key->reschedul_name,1,0, 'C');
             $pdf->Cell(60,6,$key->reschedul_email,1,0);
             $pdf->Cell(45,6,$key->tgl_reschedul,1,0);
             $pdf->Cell(45,6,number_format($key->total_reschedul),1,1);
    //              $pdf->Cell(50,6,'',0,0);
    //              $pdf->Cell(85,6,'',0,0);
    //                    $pdf->SetFont('Arial','B',10);
    //                    $pdf->Cell(60,6,'Nama Bank',1,0);
    //                    $pdf->Cell(90,6,'BCA',1,1);
    //              $pdf->Cell(50,6,'',0,0);
    //              $pdf->Cell(85,6,'',0,0);
    //                    $pdf->Cell(60,6,'Cabang',1,0);
    //                    $pdf->Cell(90,6,'PPONDOK GEDE',1,1);
    //              $pdf->Cell(50,6,'',0,0);
    //              $pdf->Cell(85,6,'',0,0);
    //                    $pdf->Cell(60,6,'No Rekening',1,0);
    //                    $pdf->Cell(90,6,'NO_REKENING',1,1);
    //              $pdf->Cell(50,6,'',0,0);
    //              $pdf->Cell(85,6,'',0,0);
    //                    $pdf->Cell(60,6,'Nama Rekening',1,0);
    //                    $pdf->Cell(90,6,'WAHYU ALFARISI',1,1);
    //              $pdf->Cell(50,6,'',0,0);
    //              $pdf->Cell(85,6,'',0,0);
    //                    $pdf->Cell(60,6,'Dikonfirmasi oleh',1,0);
    //                    $pdf->Cell(90,6,'KONFIRM',1,1);
     }
















    $pdf->Output();
  }


}
