<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Resource_model');
}


  public function Show_add_resource(){


    $data['content'] = $this->load->view('Resource/Reservation', '',TRUE );
    $this->load->view('layout/layout_home', $data);
  }

  public function get_schedules($id){
    //return $this->Resource_model->getschedulesbyResourceId($id);
    return [];
  }

}
