<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends MY_Controller  {
  function __construct(){
    parent::__construct();
    $this->load->model('User_model');
  }

  public function login(){
    $this->data['js'][] = 'auth';
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['content'] = $this->load->view('authentication/login', $this->data,TRUE );
    $this->load->view('layout/layout_home', $this->data);

  }
  public function register(){
    $this->data['js'][] = 'auth';
    $this->data['services'] = $this->Service_model->get_services();
    $this->data['content'] = $this->load->view('authentication/register', $this->data,TRUE );
    $this->load->view('layout/layout_home', $this->data);

  }
  public function signup(){
    $hash = password_hash($this->input->post('password'), PASSWORD_DEFAULT, ['cost' => 12]);
    $data = array(
        'nombre' => $this->input->post('name'),
        'apellido' => $this->input->post('lastname'),
        'username' => $this->input->post('username'),
        'email' => $this->input->post('email'),
        'password' => $hash,
        'id_servicio' => $this->input->post('id_service'),
        'rol' => 2,
    );

    $this->User_model->store_user($data);
     redirect('login');
    //print_r(json_encode($data));
  }

  public function signin(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    echo $username;
    echo $password;
    $user=$this->User_model->get_user($username);
    print_r(json_encode($user));
    if( password_verify($password,$user->password) ){
        $this->session->user=$user;
        redirect('/');
    }else{
      redirect('/registro');
    }

  }

     public function signout(){
       $this->session->unset_userdata('user');
       redirect('/');
  }

}
