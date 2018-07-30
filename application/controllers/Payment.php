<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('acakhuruf');
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('v_payment');
  }

  function bayar()
  {
    $kode  = $this->input->post('bank').'/'.acakhuruf(5);
    $total = $this->input->post('total_pembayaran');
    $bank  = $this->input->post('bank');


    $data = array(
      'kd_pembayaran'    => $kode,
      'nama_bank'        => $total,
      'total_pembayaran' => $total
    );
    $this->db->insert('tb_bank_account', $data);
    echo "$kode";



  }

}
