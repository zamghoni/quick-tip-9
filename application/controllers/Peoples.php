<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peoples extends CI_Controller{

  public function index()
  {
    $data['judul'] = 'List of Peoples';
    $this->load->model('Peoples_model', 'peoples');

    // load library
    $this->load->library('pagination');

    // config
    $config['base_url'] = 'http://localhost/ci-app/peoples/index';
    $config['total_rows'] = $this->peoples->countAllPeoples();
    $config['per_page'] = 8;
    $config['num_links'] = 2;

    //styling
    $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
    $config['full_tag_close'] = '</ul></nav>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['Last_link'] = 'Last';
    $config['Last_tag_open'] = '<li class="page-item">';
    $config['Last_tag_close'] = '</li>';

    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['attributes'] = array('class' => 'page-link', );

    // initialize
    $this->pagination->initialize($config);

    $data['start'] = $this->uri->segment(3);
    $data['peoples'] = $this->peoples->getPeoples($config['per_page'],$data['start']);
    $this->load->view('templates/header', $data );
    $this->load->view('peoples/index', $data);
    $this->load->view('templates/footer');
  }

}
