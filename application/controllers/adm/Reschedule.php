<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reschedule extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Reshcedule';
    $this->load->view('admin/include/header', $data);
    $this->load->view('admin/v_reschedule');
    $this->load->view('admin/include/footer');
  }

}
