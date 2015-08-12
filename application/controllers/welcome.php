<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    protected $_data;
    
    public function __construct() {
        parent::__construct();
        
        $this->_data['base_url'] = $this->config->item('base_url');
    }

    
	public function index() {
	   $last_msg_id = 0;
       $limit = 20;
       if($this->input->post('last_msg_id')){
        $last_msg_id = $this->input->post('last_msg_id');
        $limit = 5;
       }
       
		$this->_data['datos'] = $this->system_model->getRanking($last_msg_id, $limit);
        
        $this->parser->parse('welcome_message', $this->_data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */