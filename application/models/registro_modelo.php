<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Registro_modelo extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();
  }
  function insertarNombre($data){
    $this->db->insert('usuarios',array(
      'nombre'=>$data['nombre'],
      'apellido'=>$data['apellido'],
      'username'=>$data['username'],
      'password'=>$data['password'],
      'email'=>$data['email'],
      'rol'=>$data['rol']));
  }

  function insertarRecurso($data){
    $this->db->insert('recurso',array(
      'nombre'=>$data['nombre'],
      'descripcion'=>$data['descripcion'],
      'localizacion'=>$data['localizacion'])
    );
  }

  function obtener(){
    $query = $this->db->get('usuarios');
    if($query->num_rows() > 0) return  $query;
    else return false;
  }

  function obtenerusuario($id){
    $this->db->where('id',$id);
    $query = $this->db->get('usuarios');
    if($query->num_rows() > 0) return  $query;
    else return false;
  }


}
 ?>
