<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/m_reschedule');
    $this->load->model('acc/m_dashboard');
    if($this->session->userdata('login') != 1 ){
      redirect(base_url('admin') );
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Dashboard';
    $this->load->view('acc/include/v_header', $data);

    $this->load->view('acc/v_dashboard');

    $this->load->view('acc/include/v_footer');
  }

  function refundSuccess()
  {
    $data['data'] = $this->m_dashboard->getRefund()->result();
    $this->load->view('acc/v_refund_success', $data);
  }

  function reschedule()
  {
    $data['get_reschedule'] = $this->m_reschedule->get_reschedule()->result();
    $this->load->view('acc/v_reschedule', $data);
  }

  function refundProcess()
  {
    $this->load->view('acc/v_refund_process');
  }

  function get_pertanggal()
  {
    $from = $this->input->post('dari');
    $to   = $this->input->post('sampai');

    $from1 = date('Y-m-d 00:00:00', strtotime($from) );
    $from2 = date('Y-m-d 23:59:59', strtotime($to));

    $select = $this->m_dashboard->pertanggal_laporan($from1,$from2);

      $output = '
      <center><a href="'.base_url('acc/laporan/pertanggal?from='.$from1.'&&to='.$from2.' ').'" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-print"></i></a></center>
      <div class="table-responsive mailbox-messages animated zoomIn">
        <table class="table table-hover table-striped">
            <tr>
              <th style="font-size:12px;">Tanggal</th>
              <th style="font-size:12px;">No Refund</th>
              <th style="font-size:12px;">Email Customer</th>
              <th style="font-size:12px;">Total Refund</th>
              <th style="font-size:12px;">Kode Booking</th>
            </tr>
      ';
      if($select->num_rows() > 0 ){
      foreach($select->result() as $key){
        $output .= '
            <tr>
              <td>'.$key->tgl_refund.'</td>
              <td>'.$key->no_refund.'</td>
              <td>'.$key->refund_email.'</td>
              <td>'.$key->total_refund.'</td>
              <td>'.$key->kd_booking.'</td>
            </tr>
        ';
        }
        $output .= '
            </table>
          </div>
        ';
        echo $output;
      }else{
        echo "<center>tidak ada data</center>";
      }

  }

  function get_pertanggal_reschedule()
  {
    $from = $this->input->post('dari');
    $to   = $this->input->post('sampai');

    $from1 = date('Y-m-d 00:00:00', strtotime($from) );
    $from2 = date('Y-m-d 23:59:59', strtotime($to));

    $select = $this->m_dashboard->pertanggal_laporan_reschedule($from, $to);
    $output = '
    <center><a href="'.base_url('acc/laporan/pertanggal_reschedule?from='.$from1.'&&to='.$from2.' ').'" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-print"></i></a></center>
    <div class="table-responsive mailbox-messages animated zoomIn">
      <table class="table table-hover table-striped">
          <tr>
            <th style="font-size:12px;">Tanggal</th>
            <th style="font-size:12px;">No Reschedule</th>
            <th style="font-size:12px;">Email Customer</th>
            <th style="font-size:12px;">Total Reschedule</th>
            <th style="font-size:12px;">Kode Booking</th>
          </tr>
    ';
    if($select->num_rows() > 0 ){
    foreach($select->result() as $key){
      $output .= '
          <tr>
            <td>'.$key->tgl_reschedul.'</td>
            <td>'.$key->no_reschedule.'</td>
            <td>'.$key->reschedul_email.'</td>
            <td>'.$key->total_reschedul.'</td>
            <td>'.$key->kd_booking.'</td>
          </tr>
      ';
      }
      $output .= '
          </table>
        </div>
      ';
      echo $output;
    }else{
      echo "<center>tidak ada data</center>";
    }

  }

}
