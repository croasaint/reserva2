<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
    }


  public function index(){
    $this->data['js'][] = 'reservation';
    $this->data['reservas'] = $this->User_model->showReservations();
    $this->data['services'] = $this->Service_model->get_services();
    if($this->data['rol']!='visitor'){
      $data = $this->session->user->id;
      $this->data['userService'] = $this->User_model->showUserService($data);
    }
    $this->data['content'] = $this->load->view('home/index', $this->data, TRUE );

    $this->load->view('layout/layout_home', $this->data);

  }
}
