<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
require APPPATH . '/libraries/REST_Controller.php'; 
use Restserver\Libraries\REST_Controller; 


class Pembeli extends REST_Controller {
	
	function __construct($config = 'rest') {         
    	parent::__construct($config);
    	$this->load->database();
    } 

	function user_get(){
		$get_pembeli = $this->db->query("SELECT * FROM pembeli")->result();
		$this->response(array("status"=>"success","result" => $get_pembeli));
	}


}