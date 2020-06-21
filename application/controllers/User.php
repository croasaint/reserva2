<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('User_model');

  }

  public function index(){
    $this->data['js'][] = 'user';
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['users'] = $this->User_model->get_users();
    $this->data['content'] = $this->load->view('user/index', $this->data,TRUE );
    $this->load->view('layout/layout_home', $this->data);
  }

  public function store(){
    $hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT, ['cost' => 12]);
    $data = array(
        'nombre' => $this->input->post('name'),
        'apellido' => $this->input->post('lastname'),
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => $hash,
        'id_servicio' => $this->input->post('id_service'),
        'rol' => $this->input->post('rol'),
    );

    $this->User_model->store_user($data);
     redirect('usuarios');
    //print_r(json_encode($data));
  }

  public function update($id){
    $hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT, ['cost' => 12]);

    $this->data = array(
        'nombre' => $this->input->post('name'),
        'apellido' => $this->input->post('lastname'),
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => $hash,
        'id_servicio' => $this->input->post('id_service'),
        'rol' => $this->input->post('rol'),
    );
    $this->User_model->update_user($this->data,$id);
    redirect('usuarios');
  }

  public function destroy($id){
    print_r(json_encode($this->User_model->destroy_user($id))); 
  }

}
