<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Service_model');
}


  public function Show_add_service(){
    $data['services'] = $this->Service_model->ShowService();
    $data['content'] = $this->load->view('Service/Create', '',TRUE );
    $this->load->view('layout/layout_home', $data);


  }

  public function RecieveData(){
      $data = array(
        'nombre' => $this->input->post('Service_name'),
        'descripcion' => $this->input->post('Service_description'),

      );
      $this->Service_model->InsertService($data);


  }




  public function Show_service($id){
    $resources = $this->Service_model->GetServiceResourse($id);
    $data['id_service'] = $id;
    $service = $this->Service_model->GetServiceById($id);
    $data['services'] = $this->Service_model->ShowService();
    $data['service_name'] = $service[0]->nombre;
    $data['service_description'] = $service[0]->descripcion;
    $data['recursos'] = $resources;
    $data['content'] = $this->load->view('Service/Show', $data, TRUE );
    $resources = $this->Service_model->GetResource();
    $this->load->view('layout/layout_home', $data);



  }




public function RecieveData_R(){
   $data = array(
    'id_servicio' => $this->input->post('id_servicio'),
    'nombre' => $this->input->post('nombre'),
    'descripcion' => $this->input->post('descripcion'),
    'localizacion' => $this->input->post('localizacion')

  );

  $this->Service_model->InsertResource($data);
  redirect('service/show');

  }

  public function AddUser(){
    $data['services'] = $this->Service_model->ShowService();
    $data['content'] = $this->load->view('user/registration', $data, TRUE );
    $this->load->view('layout/layout_home', $data);
  }

  public function InsertUser(){
    $data = array(
     'id_servicio' => $this->input->post('id_servicio'),
     'nombre' => $this->input->post('nombre'),
     'apellido' => $this->input->post('apellido'),
     'username' => $this->input->post('login'),
     'email' => $this->input->post('correo'),
     'password' => $this->input->post('password')

   );

   $this->Service_model->InsertUser($data);
   redirect('service/show');

  }
}
