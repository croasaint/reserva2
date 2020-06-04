<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Resource_model extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();
  }

public function getschedulesbyResourceId($id){
    $query = $this->db->query('select * from reserva where fecha_fin >= curdate() and estado = 1 and id_recurso ='.$id);
    if($query->num_rows() > 0) return  $query->result();
    else return false;

}

}
