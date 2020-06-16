<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resource_model extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();
  }

public function getschedulesbyResourceId($id){
    $query = $this->db->query('select * from reserva where fecha_fin >= curdate() and estado = 1 and id_recurso ='.$id);
    if($query->num_rows() > 0) return  $query->result();
    else return [];

}

public function add_schedule($data){

  $this->db->insert('reserva',array(
    'id_usuario' => $data['id_usuario'],
      'id_recurso' => $data['id_recurso'],
      'fecha_inicio' => date('Y-m-d',strtotime($data['fecha_inicio'])),
      'fecha_fin' => date('Y-m-d',strtotime($data['fecha_fin'])),
      'detalles' => $data['detalles'],
      'name' => $data['name'],
      'estado' => true,
));


}

public function delete_schedule($data){
  $this->db->delete('');
}

}
