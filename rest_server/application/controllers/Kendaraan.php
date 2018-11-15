<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
require APPPATH . '/libraries/REST_Controller.php'; 
use Restserver\Libraries\REST_Controller; 
 
class Kendaraan extends REST_Controller { 
 
    function __construct($config = 'rest') {         
    	parent::__construct($config);
    	$this->load->database();
    } 
 
    //Menampilkan data Kendaraan     
    function index_get() {         
        $kendaraan = $this->db->get('kendaraan')->result();
        $this->response(array("result"=>$kendaraan, 200));   
    } 

    //Mengirim atau menambah data Kendarraan baru  
    function index_post() {         
    	$data = array(
            'id'       => $this->post('id'), 
            'nama'          => $this->post('nama'),                     
            'harga'    => $this->post('harga'),
            'img'          => $this->post('img')
        ); 

        $insert = $this->db->insert('kendaraan', $data);         
        if ($insert) {             
            $this->response($data, 200);         
        } else {             
            $this->response(array('status' => 'fail', 502));         
        }    
    } 

    //Memperbarui data kontak yang telah ada  
    function index_put() {         
    	$id = $this->put('id');         
    	$data = array(                     
    		'id'       => $this->put('id'),                     
    		'nama'          => $this->put('nama'),                     
    		'harga'    => $this->put('harga'),
            'img'          => $this->put('img')
    	);         
   
    	$this->db->where('id', $id);         
    	$update = $this->db->update('kendaraan', $data);         
    	if ($update) {             
    		$this->response($data, 200);         
    	} else {             
    		$this->response(array('status' => 'fail', 502));         
    	}     
    } 
 
 	//Menghapus salah satu data kontak  
 	function index_delete() {         
 		
 		$id = $this->delete('id');         
 		$this->db->where('id', $id);         
 		$delete = $this->db->delete('kendaraan');  

 		if ($delete) {             
 			$this->response(array('status' => 'success'), 201);         
 		} else {             
 			$this->response(array('status' => 'fail', 502));         
 		}    
 	} 
    //Masukan function selanjutnya disini 
} ?>