<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System_model extends CI_Model{     
	function System_model(){
        parent::__construct();
	}

	/**
	 * Consulta el ranking. Si se pasa como parámetro un criterio de búsqueda retornará los registros que coincidan.
	 * @param  mixed $criterio
	 * @return array
	 */
	function getRanking($last_msg_id = 0, $limit = 20){
	   if($last_msg_id != 0){
	       $this->db->where('mes_id >',$last_msg_id);
       }
       
       $this->db->limit($limit);
	   $this->db->select('*')->from('messages');
       
       $this->db->order_by('mes_id','ASC');
       $datos = $this->db->get();
       
       return $datos->result_array();
	}
    
    function cantRanking(){
        return $this->db->count_all('messages');
    }
    
    
    function getUsuarios($last_msg_id = 0, $limit = 5){
        if($last_msg_id > 0){
            $this->db->where('id_usuarios >',$last_msg_id);
        }
        $this->db->order_by('id_usuarios','ASC');
        $this->db->limit($limit);
        $db = $this->db->get('usuarios');
        return $db->result_array();
    }
    
        
}
?>