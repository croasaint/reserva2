<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Resource_model');
        $this->load->model('Service_model');
        $this->load->model('User_model');
        $this->load->helper('form');
        $this->load->helper('global');

        $this->data['css'][] = 'bootstrap.min';
        $this->data['css'][] = 'base';

        $this->data['js'][] = 'jquery.min';
        $this->data['js'][] = 'popper.min';
        $this->data['js'][] = 'bootstrap.min';
        $this->data['js'][] = 'bootstrap-datepicker.min';
        $this->data['js'][] = 'moment.min';
}

public function loginUser(){

  if($this->session->userdata('username')){
    redirect('');
  }

  if(isset($_POST['password'])){
  if($this->User_model->login($_POST['username'], $_POST['password'])){
    $result = $this->User_model->login($_POST['username'], $_POST['password']);
    $data = array (
      'id' => $result->id,
      'id_servicio' => $result->id_servicio,
      'username' => $result->username,
      'rol' => $result->rol,
      'login' => TRUE
    );
    $this->session->set_userdata($data);
    redirect('');
  }else{
    redirect('user/login');
  }

}
  $this->data['content'] = $this->load->view('user/login', '',TRUE );
  $this->load->view('layout/layout_home', $this->data);
}

public function logout(){
  $this->session->sess_destroy();
  redirect('');
}

}
