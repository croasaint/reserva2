<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();

  }

public function login($username, $password){

  //nos devuelve una fila es porque el usuario existe
$this->db->where('username', $username);
$this->db->where('password', $password);
$q = $this->db->get('usuarios');

if($q->num_rows()>0){
  return $q->row();
}else{
  return false;
}
}

function showReservations(){
  $query = $this->db->query('select reserva.id, recurso.nombre as "nombrer", servicio.nombre as "nombres", recurso.localizacion,  DATE_FORMAT(reserva.fecha_inicio, "%d-%m-%Y") as "fechai", DATE_FORMAT(reserva.fecha_fin, "%d-%m-%Y") as "fechaf", usuarios.username as "usuario" from reserva inner join usuarios inner join recurso inner join servicio on usuarios.id = reserva.id_usuario and recurso.id = reserva.id_recurso and recurso.id_servicio = servicio.id');
  if($query->num_rows() > 0) return  $query;
  else return false;
}

function showUserService(){

$userid = $this->session->userdata('id');
$this->db->select('servicio.nombre, usuarios.id_servicio');
$this->db->from('servicio');
$this->db->join('usuarios','usuarios.id_servicio = servicio.id');
$this->db->where('usuarios.id = '.$userid);
$query = $this->db->get();
  if($query->num_rows() > 0) return $query;
  else return false;
}
}
