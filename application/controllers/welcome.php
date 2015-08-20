<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    protected $_data;
    
    public function __construct() {
        parent::__construct();
        
        $this->_data['base_url'] = $this->config->item('base_url');
    }

    /**
     * Este método obtiene todos los registros y los prepara para la vista.
     * Se debe generar un indice por cada registro para la obtensión consecutiva de registros durante el scroll.
     * El procesamiento de la información por cada registro se debe hacer desde este controlador.
     * 
     * @return Se setean 3 variables para la vista:
     * - datos: Es el json de los registros obtenidos y procesados.
     * - cantidad_item_x_pagina: Es el valor definido en el config para parametrizar cantidad de registros a mostrar al primer llamado y por cada llamado a nuevos registros.
     * - cantidad_total: Es el indice final que se obtiene al recorrer todos los registros procesados.
     * 
     * */
	public function index() {
	   	$datos = $this->system_model->getUsuarios();
        
        $indice = 0;
        foreach($datos as $i=>$dato){
            $datos[$i]['indice'] = $indice++;
            $datos[$i]['nombre'] = str_replace(array('[','^','´','`','¨','~',']','\''),"",$dato['nombre']);
            $datos[$i]['apellido'] = str_replace(array('[','^','´','`','¨','~',']','\''),"",$dato['apellido']);
        }
        
        $this->_data['datos'] = json_encode($datos);
        $this->_data['cantidad_item_x_pagina'] = $this->config->item('cantidad_item_x_pagina');
        $this->_data['cantidad_total'] = $indice;

        $this->parser->parse('welcome_message', $this->_data);
	}
    
    /**
     * Este métdodo será invocado por llamado ajax para la visualización sobre el template definido.
     * @param Se recibe por ajax post un set de datos en formato json.
     * @return Se obtiene una vista con los registros procesados. 
     * 
     * */
    public function more() {
        $d = json_decode($this->input->post('datos'));
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
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */