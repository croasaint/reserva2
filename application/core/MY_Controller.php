<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
  function __construct(){      
    parent::__construct();

    $this->data['css'][] = 'bootstrap.min';
    $this->data['css'][] = 'dataTables.bootstrap4.min';
    $this->data['css'][] = 'base';
    
    $this->data['js'][] = 'jquery.min';
    $this->data['js'][] = 'popper.min';
    $this->data['js'][] = 'bootstrap.min';
    $this->data['js'][] = 'bootstrap-datepicker.min';
    $this->data['js'][] = 'moment.min';
    $this->data['js'][] = 'jquery.dataTables.min';
    $this->data['js'][] = 'dataTables.bootstrap4.min';
    $this->data['js'][] = 'datatable';

    $this->load->model('Service_model');
    $this->data['rol']='visitor';

    if( isset($this->session->user) ){
        if($this->session->user->rol==1){
            $this->data['rol']='admin';
        }else{
            $this->data['rol']='member';
        }
    }
  }
  
}
