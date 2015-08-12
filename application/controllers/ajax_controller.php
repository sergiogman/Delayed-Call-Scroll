<?php

class Ajax_controller extends CI_Controller {
    private $data = array();

    function __construct(){ 
        parent::__construct();

        $this->data['base_url'] = $this->config->item('base_url');
    }

    /**
    * Almacena la data basica de un usuario a partir de una respuesta de Facebook
    * @return void
    */
    function initUser(){
        // Inicializo la variable de retorno
        $response = array();
        
        // Valido que los datos vengan por POST
        if($this->input->post()){
            // Variables necesarias
            $fbuid = $this->input->post('fbuid');
            $nombre = $this->input->post('nombre');
            $apellido = $this->input->post('apellido');
            $email = $this->input->post('email');
            $ciudad = $this->input->post('ciudad');
            $artista = $this->input->post('artista');
            $access_token = $this->input->post('at');
        
            // Inserto registro de usuario
            $resp = $this->system_model->inicializarUsuario($fbuid, $nombre, $apellido, $email, $ciudad, $artista, $access_token);
        
            // Validación del proceso
            if($resp){
                $response['error'] = 0;
            }else{
                $response['error'] = 1;
                $response['error_msg'] = "La info no fue recibida correctamente";
            }
        }else{
            $response['error'] = 1;
            $response['error_msg'] = "La info no entro por post";
        }

        echo json_encode($response);
    }

    function getRanking(){
        if(isset($_POST['offset'])){        
            $offset = $_POST['offset'];
            $datos = $this->system_model->getRanking($offset);
            echo json_encode($datos);
        }else{
            $array = array();
            echo json_encode($array);
        }
    }
}

// END OF FILE
?>