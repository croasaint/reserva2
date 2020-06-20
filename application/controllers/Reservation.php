<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends MY_Controller {
  function __construct(){
    parent::__construct();
        
    $this->load->model('Resource_model');
    $this->load->model('Reservation_model');
  }

  public function index_rewrite($id){
    $this->data['css'][] = 'bootstrap-datepicker.standalone.min';
    $this->data['css'][] = 'js-year-calendar.min';
  
    $this->data['js'][] = 'js-year-calendar.min';
    $this->data['js'][] = 'calendar';
    $this->data['id_resource']=$id;
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['content'] = $this->load->view("reservation/index",  $this->data ,TRUE );
    $this->load->view("layout/layout_home", $this->data);
  }

  public function store(){    

    $data = array(
      'id_usuario' => $this->input->post('id_usuario'),
      'id_recurso' => $this->input->post('id_recurso'),
      'fecha_inicio' => $this->input->post('fecha_inicio'),
      'fecha_fin' => $this->input->post('fecha_fin'),
      'detalles' => $this->input->post('detalles'),
      'name' => $this->input->post('name'),      
    );
    return $this->Reservation_model->store_reservation($data);
    
  }

  public function update($id){
    $data = array(
      'fecha_inicio' => $this->input->post('fecha_inicio'),
      'fecha_fin' => $this->input->post('fecha_fin'),
      'detalles' => $this->input->post('detalles'),
      'name' => $this->input->post('name'),      
    );
    $this->Reservation_model->update_reservation($data,$id);
    return true;  
  }
  public function destroy($id){
    print_r(json_encode($this->Reservation_model->destroy_reservation($id))); 
  }
  public function get_reservations_by_resource_id($id){
    echo json_encode($this->Reservation_model->get_reservations_by_resource_id($id));
    
  }
}

?>
