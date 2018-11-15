<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
require APPPATH . '/libraries/REST_Controller.php'; 
use Restserver\Libraries\REST_Controller; 
 
class User extends REST_Controller { 
 
    function __construct($config = 'rest') {         
    	parent::__construct($config);
    	$this->load->database();
    } 
 
    //Menampilkan data Kendaraan     
    function index_post() {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->where('nohp',$this->input->post('nohp'));
        $this->db->where('password',$this->input->post('password'));
        $query=$this->db->get();

        if ($query->num_rows()==1) {
            return $this->response(array('status' => 'okee', 200));
        }else{
            return $this->response(array('status' => 'fail', 502));
        }
           
    } 

    //Mengirim atau menambah data Kendarraan baru  
    // function index_post() {         
    // 	$data = array(
    //         'id'     => $this->post('id'), 
    //         'nama'   => $this->post('nama'),                     
    //         'nohp'   => $this->post('nohp'),
    //         'alamat' => $this->post('alamat'),
    //         'password' => $this->post('password')
    //     ); 

    //     $insert = $this->db->insert('karyawan', $data);         
    //     if ($insert) {             
    //         $this->response($data, 200);         
    //     } else {             
    //         $this->response(array('status' => 'fail', 502));         
    //     }    
    // } 

    //Memperbarui data kontak yang telah ada  
    function index_put() {         
    	$id = $this->put('id');         
    	$data = array(                     
    		'id'   => $this->put('id'),                     
    		'nama' => $this->put('nama'),                     
    		'nohp' => $this->put('nohp'),
            'alamat'=> $this->put('alamat'),
            'password' => $this->put('password')
    	);         
   
    	$this->db->where('id', $id);         
    	$update = $this->db->update('karyawan', $data);         
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
 		$delete = $this->db->delete('karyawan');  

 		if ($delete) {             
 			$this->response(array('status' => 'success'), 201);         
 		} else {             
 			$this->response(array('status' => 'fail', 502));         
 		}    
 	} 
    //Masukan function selanjutnya disini 
} ?>