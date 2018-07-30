<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reschedule extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/m_reschedule');
    if($this->session->userdata('login') != 1){
      redirect(base_url('admin'));
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Reshcedule';
    $this->load->view('admin/include/header', $data);

    $data['data_reschedule'] = $this->m_reschedule->get_reschedule();
    $this->load->view('admin/v_reschedule', $data);
    $this->load->view('admin/include/footer');
  }

}
