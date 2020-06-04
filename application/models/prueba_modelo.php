<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prueba_modelo extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();
  }
  function insertarNombre($data){
    $this->db->insert('usuarios',array('nombre'=>$data['nombre']));
  }

  function obtener(){
    $query = $this->db->get('usuarios');
    if($query->num_rows() > 0) return  $query;
    else return false;
  }
}
 ?>
