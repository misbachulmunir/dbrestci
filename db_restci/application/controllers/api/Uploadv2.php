<?php 
 
class Uploadv2 extends CI_Controller{
 
	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
	}
 
	public function index(){
		$this->load->view('v_upload', array('error' => ' ' ));
	}
 
	public function do_upload(){
	$postData = $this->post();
	$config = array(
	'upload_path' => "./assets/img/logo",             //path for upload
	'allowed_types' => "gif|jpg|png|jpeg",   //restrict extension
	'max_size' => '100',
	'max_width' => '1024',
	'max_height' => '768',
	'file_name' => 'logo_'.date('ymdhis')
	);
	$this->load->library('upload',$config);
 
	if($this->upload->do_upload('logo')) 
	{
	$data = array('upload_data' => $this->upload->data());
	$path = $config['upload_path'].'/'.$data['upload_data']['orig_name'];
        // Write query to store image details of login user { }
	$returndata = array('status'=>0,'data'=>'user details','message'=>'image uploaded successfully');
	$this->set_response($returndata, 200); 
	}
	else
	{
	$error = array('error' => $this->upload->display_errors());
	$returndata = array('status'=>0,'data'=>$error,'message'=>'image upload failed');
	$this->set_response($returndata, 200); 
	}
}
	
	
}