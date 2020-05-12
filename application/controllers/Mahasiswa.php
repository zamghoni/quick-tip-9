<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('Mahasiswa_model'));
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    $data['judul'] = 'Daftar Mahasiswa';
    $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
    $this->load->view('templates/header', $data );
    $this->load->view('mahasiswa/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah()
  {
    $data['judul'] = 'Form Tambah Data Mahasiswa';
    $this->form_validation->set_rules('nama','Nama', 'required');
    $this->form_validation->set_rules('nrp','NRP', 'required|numeric');
    $this->form_validation->set_rules('email','Email', 'required|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header', $data );
      $this->load->view('mahasiswa/tambah', $data);
      $this->load->view('templates/footer');
    }else {
      $this->Mahasiswa_model->tambahDataMahasiswa();
      $this->session->set_flashdata('flash','ditambahkan');
      redirect('mahasiswa');
    }
  }

  public function hapus($id)
  {
    $this->Mahasiswa_model->hapusDataMahasiswa($id);
    $this->session->set_flashdata('flash','dihapus');
    redirect('mahasiswa');
  }

}
