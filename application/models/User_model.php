<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  function store_user($data){
    return $this->db->insert('usuarios',$data);
  }

  function get_user($username){
    $query = $this->db->query('select * from usuarios where username = "'.$username.'"');
    if($query->num_rows() > 0) return  $query->result()[0];
    else return false;
  }
 
}
 ?>
