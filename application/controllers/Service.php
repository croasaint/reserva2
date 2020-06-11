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

  public function index(){
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['content'] = $this->load->view('Service/index', $this->data,TRUE );
    $this->load->view('layout/layout_home', $this->data);
  }

  public function show($id){
    $resources = $this->Service_model->getServiceResourse($id);
    $this->data['id_service'] = $id;
    $service = $this->Service_model->get_service($id);
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['service_name'] = $service[0]->nombre;
    $this->data['service_description'] = $service[0]->descripcion;
    $this->data['recursos'] = $resources;
    
    $this->data['content'] = $this->load->view('Service/show', $this->data, TRUE );
    $resources = $this->Service_model->getResource();
    $this->load->view('layout/layout_home', $this->data);
  }

  public function edit($id){
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['service'] = $this->Service_model->get_service($id)[0];
    
    $this->data['content'] = $this->load->view('Service/edit', $this->data,TRUE );
    $this->load->view('layout/layout_home', $this->data);
  }

  public function update(){
      $id=$this->input->post('id');
      $this->data = array(
        'nombre' => $this->input->post('name'),
        'descripcion' => $this->input->post('description'),
      );
      $this->Service_model->update_service($this->data,$id);
      redirect('service');

  }

  public function store(){
    $this->data = array(
      'nombre' => $this->input->post('name'),
      'descripcion' => $this->input->post('description'),
    );
    $this->Service_model->store_service($this->data);
    redirect('service');
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
    $this->data['services'] = $this->Service_model->get_services();
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
