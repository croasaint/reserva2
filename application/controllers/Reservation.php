<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller {
    function __construct(){
        parent::__construct();

        $this->load->helper('form');
        $this->load->model('registro_modelo');

    }
    function index(){
        $data['segmento'] = $this->uri->segment(3);
        $this->load->library('menu',array('Inicio','Contacto','Carrito'));
        $data['mi_menu'] = $this->menu->elMenu();
        if(!$data['segmento']){
          $data['usuarios'] = $this->registro_modelo->obtener();
        }
        else{
            $data['usuarios'] = $this->registro_modelo->obtenerusuario($data['segmento']);
        }
        $this->load->view('reservation/usuarios', $data);

    }



    function recibirdatos(){
        $data = array(
          'nombre' => $this->input->post('nombre'),
          'apellido' => $this->input->post('apellido'),
          'username' => $this->input->post('username'),
          'password' => $this->input->post('password'),
          'email' => $this->input->post('email'),
          'rol' => $this->input->post('rol')
        );
        $this->registro_modelo->insertarNombre($data);
        $this->load->library('menu',array('Inicio','Contacto','Carrito'));
        $data['mi_menu'] = $this->menu->elMenu();
        $this->load->view('reservation/principal', $data);
        $data['usuarios'] = $this->registro_modelo->obtener();
        $this->load->view('reservation/usuarios', $data);
    }

    function recibirdatosrecurso(){
        $data = array(
          'nombre' => $this->input->post('nombre'),
          'descripcion' => $this->input->post('descripcion'),
          'localizacion' => $this->input->post('localizacion')

        );
        $this->registro_modelo->insertarRecurso($data);
        $this->load->library('menu',array('Inicio','Contacto','Carrito'));
        $data['mi_menu'] = $this->menu->elMenu();
        $this->load->view('reservation/principal', $data);
    }

    function actualizarusuarios($id){
      $data = array(
        'nombre' => $this->input->post('nombre'),
        'apellido' => $this->input->post('apellido'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'email' => $this->input->post('email'),
        'rol' => $this->input->post('rol')
      );

      $this->load->library('menu',array('Inicio','Contacto','Carrito'));
      $data['mi_menu'] = $this->menu->elMenu();
      $this->load->view('reservation/principal', $data);

      


    }
}

?>
