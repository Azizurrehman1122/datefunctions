<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dates_Functions extends CI_Controller {

	public function index()  
	{  
	   //load the database  
	   $this->load->database();  
	   //load the model  
	   $this->load->model('get_dates');  
	   //load the method of model  
	     $data['h']=$this->get_dates->select(); 
	// 	 $sho =  $data['h']->date ; 
	//    print_r($sho); exit;
	//    print($data['h']); exit;
	//    $re = strtotime( $row->date); 
    //           print_r($re);
	   //return the data in view  
	   $this->load->view('display_dates', $data);  
	}
}
