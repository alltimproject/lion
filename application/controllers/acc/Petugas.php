<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Kelola petugas';
    $this->load->view('acc/include/v_header', $data);

    $this->load->view('acc/v_petugas');

    $this->load->view('acc/include/v_footer');
  }

}
