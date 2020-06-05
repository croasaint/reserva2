<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Service_model');
}
public function loginUser(){
  $data['content'] = $this->load->view('user/login', '', TRUE );
  $this->load->view('layout/layout_home', $data);
}

public function insertUser(){
  $data = array(
   'id_servicio' => $this->input->post('id_servicio'),
   'nombre' => $this->input->post('nombre'),
   'apellido' => $this->input->post('apellido'),
   'username' => $this->input->post('login'),
   'email' => $this->input->post('correo'),
   'password' => $this->input->post('password')

 );

 $this->Service_model->insertUser($data);
 redirect('service/show');

}
}
