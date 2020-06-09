<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Service_model');

        $this->load->helper('global');

        $this->data['css'][] = 'bootstrap.min';
        $this->data['css'][] = 'base';
        
        $this->data['js'][] = 'jquery.min';
        $this->data['js'][] = 'popper.min';
        $this->data['js'][] = 'bootstrap.min';
        $this->data['js'][] = 'bootstrap-datepicker.min';
        $this->data['js'][] = 'moment.min';
}


  public function Show_add_service(){
    $this->data['services'] = $this->Service_model->showService();
    $this->data['content'] = $this->load->view('Service/Create', '',TRUE );
    $this->load->view('layout/layout_home', $this->data);


  }

  public function recieveData(){
      $this->data = array(
        'nombre' => $this->input->post('Service_name'),
        'descripcion' => $this->input->post('Service_description'),

      );
      $this->Service_model->insertService($this->data);


  }

  public function show_service($id){
    $resources = $this->Service_model->getServiceResourse($id);
    $this->data['id_service'] = $id;
    $service = $this->Service_model->getServiceById($id);
    $this->data['services'] = $this->Service_model->showService();
    $this->data['service_name'] = $service[0]->nombre;
    $this->data['service_description'] = $service[0]->descripcion;
    $this->data['recursos'] = $resources;
    $this->data['content'] = $this->load->view('Service/Show', $this->data, TRUE );
    $resources = $this->Service_model->getResource();
    $this->load->view('layout/layout_home', $this->data);



  }




public function recieveData_R(){
   $this->data = array(
    'id_servicio' => $this->input->post('id_servicio'),
    'nombre' => $this->input->post('nombre'),
    'descripcion' => $this->input->post('descripcion'),
    'localizacion' => $this->input->post('localizacion')

  );

  $this->Service_model->insertResource($this->data);
  redirect('service/show');

  }

  public function addUser(){
    $this->data['services'] = $this->Service_model->showService();
    $this->data['content'] = $this->load->view('user/registration', $this->data, TRUE );
    $this->load->view('layout/layout_home', $this->data);
  }

  public function insertUser(){
    $this->data = array(
     'id_servicio' => $this->input->post('id_servicio'),
     'nombre' => $this->input->post('nombre'),
     'apellido' => $this->input->post('apellido'),
     'username' => $this->input->post('username'),
     'email' => $this->input->post('correo'),
     'password' => $this->input->post('password')

   );

   $this->Service_model->insertUser($this->data);
   redirect('user/registration');

  }
}
