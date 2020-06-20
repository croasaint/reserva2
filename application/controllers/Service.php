<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MY_Controller {
  function __construct(){
    parent::__construct();

  }

  public function index(){
    $this->data['js'][] = 'service';
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['content'] = $this->load->view('service/index', $this->data,TRUE );
    $this->load->view('layout/layout_home', $this->data);
  }

  public function show($id){
    $this->data['js'][] = 'resource';
    $resources = $this->Service_model->getServiceResourse($id);
    $this->data['id_service'] = $id;
    $service = $this->Service_model->get_service($id);
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['service_name'] = $service[0]->nombre;
    $this->data['service_description'] = $service[0]->descripcion;
    $this->data['resources'] = $resources;
    
    $this->data['content'] = $this->load->view('service/show', $this->data, TRUE );
    $resources = $this->Service_model->getResource();
    $this->load->view('layout/layout_home', $this->data);
  }

  public function edit($id){
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['service'] = $this->Service_model->get_service($id)[0];
    
    $this->data['content'] = $this->load->view('service/edit', $this->data,TRUE );
    $this->load->view('layout/layout_home', $this->data);
  }

  public function update($id){
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

  public function destroy($id){
    print_r(json_encode($this->Service_model->destroy_service($id))); 
  }

}
