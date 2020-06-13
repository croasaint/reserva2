<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resource_model extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  function store_resource($data){
    $this->db->insert('recurso',array(
        'id_servicio' => $data['id_servicio'],
        'nombre'=>$data['nombre'],
        'descripcion'=>$data['descripcion'],
        'localizacion'=>$data['localizacion']
      )
    );
  }

  function get_resource($id){
    $query = $this->db->query('select * from recurso where id ='.$id);
    if($query->num_rows() > 0) return  $query->result();
    else return false;
  }

  function update_resource($data,$id){
    $this->db->update('recurso', $data, "id = ".$id);
  }

  function destroy_resource($id){
    $this->db->where('id', $id);
    return $this->db->delete('recurso');
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

}
