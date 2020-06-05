<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Service_model');
}


  public function Show_add_service(){
    $data['services'] = $this->Service_model->showService();
    $data['content'] = $this->load->view('Service/Create', '',TRUE );
    $this->load->view('layout/layout_home', $data);


  }

  public function recieveData(){
      $data = array(
        'nombre' => $this->input->post('Service_name'),
        'descripcion' => $this->input->post('Service_description'),

      );
      $this->Service_model->insertService($data);


  }




  public function show_service($id){
    $resources = $this->Service_model->getServiceResourse($id);
    $data['id_service'] = $id;
    $service = $this->Service_model->getServiceById($id);
    $data['services'] = $this->Service_model->showService();
    $data['service_name'] = $service[0]->nombre;
    $data['service_description'] = $service[0]->descripcion;
    $data['recursos'] = $resources;
    $data['content'] = $this->load->view('Service/Show', $data, TRUE );
    $resources = $this->Service_model->getResource();
    $this->load->view('layout/layout_home', $data);



  }




public function recieveData_R(){
   $data = array(
    'id_servicio' => $this->input->post('id_servicio'),
    'nombre' => $this->input->post('nombre'),
    'descripcion' => $this->input->post('descripcion'),
    'localizacion' => $this->input->post('localizacion')

  );

  $this->Service_model->insertResource($data);
  redirect('service/show');

  }

  public function addUser(){
    $data['services'] = $this->Service_model->showService();
    $data['content'] = $this->load->view('user/registration', $data, TRUE );
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
