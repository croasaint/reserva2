<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Service_model extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  function insertService($data){
    $this->db->insert('servicio',array(
      'nombre'=>$data['nombre'],
      'descripcion'=>$data['descripcion'])
    );
  }

  function showService(){
    $query = $this->db->get('servicio');
    if($query->num_rows() > 0) return  $query;
    else return false;
  }

  function getServiceResourse($id){
    $query = $this->db->query('select * from recurso where recurso.id_servicio ='.$id);
    if($query->num_rows() > 0) return  $query->result();
    else return false;
  }

  function getServiceById($id){
    $query = $this->db->query('select * from servicio where id ='.$id);
    if($query->num_rows() > 0) return  $query->result();
    else return false;
  }

  function getResource(){
    $query = $this->db->get('recurso');
    if($query->num_rows() > 0) return  $query;
    else return false;
  }

  function insertResource($data){

    $this->db->insert('recurso',array(
      'id_servicio' => $data['id_servicio'],
      'nombre'=>$data['nombre'],
      'descripcion'=>$data['descripcion'],
      'localizacion'=>$data['localizacion']
  ));

  }

  function insertUser($data){

    $this->db->insert('usuarios',array(
      'id_servicio' => $data['id_servicio'],
      'nombre'=>$data['nombre'],
      'apellido'=>$data['apellido'],
      'username'=>$data['username'],
      'email'=>$data['email'],
      'password'=>$data['password'],
      'rol'=>'member'
  ));

}
}
 ?>
