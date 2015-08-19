<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    protected $_data;
    
    public function __construct() {
        parent::__construct();
        
        $this->_data['base_url'] = $this->config->item('base_url');
    }

    
	public function index() {
	   	$this->_data['datos'] = $this->system_model->getUsuarios();
        $indice = 0;
        foreach($this->_data['datos'] as $i=>$dato){
            $this->_data['datos'][$i]['indice'] = $indice++;
            $this->_data['datos'][$i]['nombre'] = str_replace(array('[','^','´','`','¨','~',']','\''),"",$dato['nombre']);
            $this->_data['datos'][$i]['apellido'] = str_replace(array('[','^','´','`','¨','~',']','\''),"",$dato['apellido']);
        }
        
        $this->_data['datos'] = json_encode($this->_data['datos']);
        
        $this->_data['cantidad_item_x_pagina'] = $this->config->item('cantidad_item_x_pagina');
        $this->_data['cantidad_total'] = $indice;
        
        
        $this->data['ranking'] = $this->parser->parse("more_message", $this->_data, true);
        
        
        $this->parser->parse('welcome_message', $this->_data);
	}
    
    public function more() {
        $d = json_decode($this->input->post('datos'));
        
        d($d);
        
        $this->_data['datos'] = array();
        foreach($d as $v){
            array_push($this->_data['datos'], (array)$v);    
        }
        
        
        
        $this->parser->parse('more_message', $this->_data);
        
	}
    
	public function horizontal() {
	   	$this->_data['datos'] = $this->system_model->getRanking();
        $this->_data['cantRanking'] = $this->system_model->cantRanking();
        $this->parser->parse('horizontal_message', $this->_data);
	}
    
    public function endless(){
        $this->_data['datos'] = $this->system_model->getUsuarios();
        $this->parser->parse('endless_view', $this->_data);
    }
    
    public function endlessMore() {
        $last_msg_id = 0;
        $limit = 20;
        if($this->input->post('last_msg_id')){
            $last_msg_id = $this->input->post('last_msg_id');
            $limit = 5;
        }
        
        $this->_data['datos'] = $this->system_model->getUsuarios($last_msg_id, $limit);
        $this->parser->parse('endless_more_view', $this->_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */