<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model{

  function get_all_petugas()
  {
    return $this->db->get('tb_administrator');
  }

}
