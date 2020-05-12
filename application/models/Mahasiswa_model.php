<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAllMahasiswa()
  {
    return $this->db->get('mahasiswa')->result_array();
  }

  public function tambahDataMahasiswa()
  {
    $data = array(
        'nama' => $this->input->post('nama', true),
        'nrp' => $this->input->post('nrp', true),
        'email' => $this->input->post('email', true),
        'jurusan' => $this->input->post('jurusan', true),

  );
  $this->db->insert('mahasiswa', $data);
  }

  public function hapusDataMahasiswa($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('mahasiswa');
  }

}
