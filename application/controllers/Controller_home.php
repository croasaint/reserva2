<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_home extends CI_Controller {
    function __construct(){
        parent::__construct();
              $this->load->model('Service_model');

}


public function index(){
  $data['services'] = $this->Service_model->showService();
  $this->load->view('layout/layout_home', $data);

}
}
