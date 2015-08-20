<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System_model extends CI_Model{     
	function System_model(){
        parent::__construct();
	}

    /**
     * Este método obtiene todos los registros de la tabla especificada.
     * @return array
     * */
    function getUsuarios(){
        $db = $this->db->get('usuarios');
        return $db->result_array();
    }
    
    /**
     * Este método obtiene todos los registros del id especificado.
     * @param $fbuid
     * @return array
     * 
     * */
    function getUsuariosByFbuid($fbuid){
        $this->db->where('fbuid',$fbuid);
        $db = $this->db->get('usuarios');
        return $db->result_array();
    }
    
}
?>