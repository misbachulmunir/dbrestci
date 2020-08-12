<?php 
 
class Upload extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
	}
 
	public function index(){
		$this->load->view('v_upload', array('error' => ' ' ));
	}
 
	public function aksi_upload(){
		$config['upload_path']          = './assets/img/logo/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			// $response['success'] = 0;
       		// $response['message'] = "Filed";
          
		//	$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			// $response['success'] = 1;
       		// $response['message'] = "Image Uploaded Successfully";

           // $this->set_response($data, REST_Controller::HTTP_NO_CONTENT); // N
		//	$this->load->view('v_upload_sukses', $data);
		}
	}
	
}