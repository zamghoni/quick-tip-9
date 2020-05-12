<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Mahasiswa_model'));
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data['judul'] = 'Daftar Mahasiswa';
    $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
    $this->load->view('templates/header', $data );
    $this->load->view('mahasiswa/index', $data);
    $this->load->view('templates/footer');
  }

}
