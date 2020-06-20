<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }


  public function index(){
    $this->data['reservas'] = $this->User_model->showReservations();
    if(isset($this->session->user)){
    $data = $this->session->user->id;
  $this->data['userService'] = $this->User_model->showUserService($data);
}
    $this->data['services'] = $this->Service_model->get_services();
    $this->load->view('layout/layout_home', $this->data);

  }
}
