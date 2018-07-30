<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('acc/m_petugas');
    if($this->session->userdata('login') != 1 ){
      redirect(base_url('admin') );
    }
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['title'] = 'Kelola petugas';
    $this->load->view('acc/include/v_header', $data);

    $this->load->view('acc/v_petugas');

    $this->load->view('acc/include/v_footer');
  }

  function show_petugas()
  {
    $selectDB = $this->m_petugas->get_all_petugas();
    $output = '
      <div class="card" style="margin-left:15px; margin-right:15px;">
        <div class="card-header">
          <div class="card-title">Data Petugas</div>
        </div>

        <table class="table table-bordered table-striped table-hover" >
          <thead>
            <tr>
              <th>Email</th>
              <th>Nama Lengkap</th>
              <th>Akses</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
    ';
    if($selectDB->num_rows() > 0 )
    {
      foreach($selectDB->result() as $key)
      {
        $output .= '
          <tr>
              <td>'.$key->email.'</td>
              <td>'.$key->firstname.' '.$key->lastname.'</td>
              <td>'.$key->level.'</td>
              <td>
                <a href="javascript:;" class="btn btn-warning btn-xs btn-edit" data-email="'.$key->email.'" data-nd="'.$key->firstname.'" data-nb="'.$key->lastname.'" data-level="'.$key->level.'"><i class="fa fa-pencil"></i></a>
                <a href="javascript:;" class="btn btn-danger btn-xs btn-hapus" data-email="'.$key->email.'"><i class="fa fa-trash"></i></a>
              </td>
          </tr>
        ';
      }
      $output .= '
            </tbody>
          </table>
        </div>
      ';
    }else{
      $output .= 'Data Tidak Ada';
    }



    echo $output;
  }

  function simpan_petuas()
  {
    $email = $this->input->post('email');
    $nd    = $this->input->post('nama_depan');
    $nb    = $this->input->post('nama_belakang');
    $pass  = $this->input->post('password');
    $level = $this->input->post('level');

    $data = array(
      'email'     => $email,
      'firstname' => $nd,
      'lastname'  => $nb,
      'password'  => md5($pass),
      'level'     => $level
    );
    $this->db->insert('tb_administrator', $data);
    echo 'Data Berhasil di tambahkan';
  }

  function update_petugas()
  {
    $email = $this->input->post('email');
    $nd    = $this->input->post('nama_depan');
    $nb    = $this->input->post('nama_belakang');
    $pass  = $this->input->post('password');
    $level = $this->input->post('level');

    $where = array(
      'email' => $email
    );
    $data = array(
      'firstname' => $nd,
      'lastname'  => $nb,
      'password'  => md5($pass),
      'level'     => $level
    );
    $this->db->where($where);
    $update = $this->db->update('tb_administrator', $data);
    if($update){
      echo "Berhasil merubah data".$email;
    }else{
      echo "Gagal Merubah data";
    }
  }

  function hapus_user()
  {
    $email = $this->input->post('email');
    $where = array('email' => $email);
    $this->db->where($where);
    $this->db->delete('tb_administrator');
    echo "Data ".$email." Berhasil dihapus";
  }





}
