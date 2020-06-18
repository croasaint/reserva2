<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('Service_model');
        $this->load->helper('global');
        $this->load->model('User_model');
        $this->data['css'][] = 'bootstrap.min';
        $this->data['css'][] = 'base';

        $this->data['js'][] = 'jquery.min';
        $this->data['js'][] = 'popper.min';
        $this->data['js'][] = 'bootstrap.min';
        $this->data['js'][] = 'bootstrap-datepicker.min';
        $this->data['js'][] = 'moment.min';

        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');

    }


  public function index(){


    $this->data['reservas'] = $this->User_model->showReservations();
    $this->data['userService'] = $this->User_model->showUserService();


    $this->data['services'] = $this->Service_model->get_services();

    $this->load->view('layout/layout_home', $this->data);


  }


}
