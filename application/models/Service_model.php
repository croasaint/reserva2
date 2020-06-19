<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Service_model extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  function get_services(){
    $query = $this->db->get('servicio');
    if($query->num_rows() > 0) return  $query->result();
    else return false;
  }

  function update_service($data,$id){
    $this->db->update('servicio', $data, "id = ".$id);
  }

  function store_service($data){
    $this->db->insert('servicio', $data);
  }

  function destroy_service($id){
    $this->db->where('id', $id);
    return $this->db->delete('servicio');
  }

  function getServiceResourse($id){
    $query = $this->db->query('select * from recurso where recurso.id_servicio ='.$id);
    if($query->num_rows() > 0) return  $query->result();
    else return false;
  }

  function get_service($id){
    $query = $this->db->query('select * from servicio where id ='.$id);
    if($query->num_rows() > 0) return  $query->result();
    else return false;
  }

  function getResource(){
    $query = $this->db->get('recurso');
    if($query->num_rows() > 0) return  $query;
    else return false;
  }

}
 ?>
