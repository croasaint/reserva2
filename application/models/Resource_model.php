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


}
