<?php
class get_dates extends CI_Model{

	function __construct()  
      {  
         // Call the Model constructor  
         parent::__construct();  
      }  

	  //we will use the select function  
      public function select()  
      {  
         //data is retrive from this query  
         $query = $this->db->get('date_f'); 
		 $res =  $query->result();
		
		//  print_r($res);exit;
		// print_r($this->db->last_query()); exit;

         return $res;  
      }

	
}