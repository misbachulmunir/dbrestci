<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Upload extends REST_Controller {



        public function __construct()
	{
		# code...
		parent :: __construct();
                $this ->load ->model('M_person');
	}


        public function do_upload_post()
               
        {

               

                $config['upload_path']          = './assets/uploads/';
                $config['allowed_types']        = '*';
                $config['overwrite'] = TRUE;
              
                $this->load->library('upload', $config);
                
                $userfile ='userfile';
                if ( ! $this->upload->do_upload($userfile))
                {
                        
                        $this->set_response([
                               'status' => FALSE,
                               'message' => 'Not Found'
                                ], REST_Controller::HTTP_NOT_FOUND);
                }
                else
                {
                        $this->set_response([
                               'status' => TRUE,
                               'message'=> 'Success'
                                ], REST_Controller::HTTP_OK);
                     
                }
        }

        public function getSatudata_get(){
              //ambil data id
		$id = $this ->get('id');
		//var_dump($id);
                $data = $this -> M_person -> getIdUas($id);
               // var_dump($data);
                
                var_dump($data);
                
		if($data){
			$this->set_response([
				   'status' => TRUE,
				   'data'   => $data,
				   'message'=> 'Success'
					], REST_Controller::HTTP_OK);
		}else{
			$this->set_response([
				   'status' => FALSE,
				   'message' => 'Not Found'
					], REST_Controller::HTTP_NOT_FOUND);
		}
        }
       
}
?>