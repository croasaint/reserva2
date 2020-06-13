<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource extends CI_Controller {
  function __construct(){
    parent::__construct();
        
    $this->load->model('Resource_model');
    $this->load->model('Service_model');
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

  public function edit($id_service,$id_resource){
    $this->data['services'] = $this->Service_model->get_services();    
    $this->data['resource'] = $this->Resource_model->get_resource($id_resource)[0];    
    $this->data['id_service']=$id_service;
    $this->data['content'] = $this->load->view('resource/edit', $this->data,TRUE );
    $this->load->view('layout/layout_home', $this->data);
  }

  public function store(){
    $id_service=$this->input->post('id_servicio');
    $this->data = array(
      'id_servicio' => $id_service,
      'nombre' => $this->input->post('nombre'),
      'descripcion' => $this->input->post('descripcion'),
      'localizacion' => $this->input->post('localizacion') 
    );

    $this->Resource_model->store_resource($this->data);
    redirect('servicio/'.$id_service.'/recursos');
  }

  public function update($id_service,$id_resource){
    $this->data = array(
      'nombre' => $this->input->post('name'),
      'descripcion' => $this->input->post('description'),
      'localizacion' => $this->input->post('localization'),
    );
    $this->Resource_model->update_resource($this->data,$id_resource);
    redirect('servicio/'.$id_service.'/recursos');

}

public function destroy($id){
  print_r(json_encode($this->Resource_model->destroy_resource($id))); 
}

  public function show_add_resource($id){
    $this->data['css'][] = 'bootstrap-datepicker.standalone.min';
    $this->data['css'][] = 'js-year-calendar.min';

    $this->data['js'][] = 'js-year-calendar.min';
    $this->data['js'][] = 'calendar';
    $this->data['id_resource']=$id;
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['content'] = $this->load->view("resource/reservation",  $this->data ,TRUE );
    $this->load->view("layout/layout_home", $this->data);

   }

  public function get_schedules($id){
    echo json_encode($this->Resource_model->getschedulesbyResourceId($id));
    
  }

  public function add_schedule(){    

    $data = array(
      'id_usuario' => $this->input->post('id_usuario'),
      'id_recurso' => $this->input->post('id_recurso'),
      'fecha_inicio' => $this->input->post('fecha_inicio'),
      'fecha_fin' => $this->input->post('fecha_fin'),
      'detalles' => $this->input->post('detalles'),
      'name' => $this->input->post('name'),      
    );
    $this->Resource_model->add_schedule($data);
    return true;  
    
  }

}
