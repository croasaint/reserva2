<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Service_model');
        $this->load->helper('global');
        
        $this->data['css'][] = 'bootstrap.min';
        $this->data['css'][] = 'base';
        
        $this->data['js'][] = 'jquery.min';
        $this->data['js'][] = 'popper.min';
        $this->data['js'][] = 'bootstrap.min';
        $this->data['js'][] = 'bootstrap-datepicker.min';
        $this->data['js'][] = 'moment.min';
    
    }


  public function index(){
   
    $this->data['services'] = $this->Service_model->showService();
    $this->load->view('layout/layout_home', $this->data);

  }
}
