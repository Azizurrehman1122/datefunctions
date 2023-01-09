<?php
class Upload extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_upload');
		
	}

	function index(){
		$this->load->view('v_upload');	
	}


	function do_upload(){
        $config['upload_path']="./assets/images";
        $config['allowed_types']='jpg|png|mp4|pdf';
        $config['encrypt_name'] = TRUE;
       
		
        $this->load->library('upload',$config);
		$img_type = array("jpg", "png", "mp4", "pdf"); 
		
		if($img_type){
	    if($this->upload->do_upload("file")){
	        $data = array('upload_data' => $this->upload->data());

	        $image= $data['upload_data']['file_name']; 
	        
	        $result= $this->m_upload->file_upload($image);
	        echo json_decode($result);
        }
	}else{
		echo "Invalid File Type!!!" ;
	}

     }
	
}


