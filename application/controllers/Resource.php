<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Resource_model');
}


  public function show_add_resource($id){

    $data['content'] = $this->load->view("resource/reservation", "",TRUE );
    $this->load->view("layout/layout_home", $data);

   }

  public function get_schedules($id){
    echo json_encode($this->Resource_model->getschedulesbyResourceId($id));
    
  }

  public function add_schedule($id){    

    $data = array(
      'id_usuario' => $this->input->post('id_usuario'),
      'id_recurso' => $this->input->post('id_recurso'),
      'fecha_inicio' => $this->input->post('fecha_inicio'),
      'fecha_fin' => $this->input->post('fecha_fin'),
      'detalles' => $this->input->post('detalles'),
      'name' => $this->input->post('name'),      
    );
    $this->Resource_model->add_schedule( $data);
    return true;  
    
  }

}
