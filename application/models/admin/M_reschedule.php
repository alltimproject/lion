<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reschedule extends CI_Model{

  function get_reschedule()
  {
    return $this->db->get('tb_reschedul');
  }

}
