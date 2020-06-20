<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource extends MY_Controller  {
  function __construct(){
    parent::__construct();        
    $this->load->model('Resource_model');
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

}
