<?php


defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * 
 */
class Uas extends REST_Controller
{
	
	function __construct()
	{
		# code...
		  parent::__construct();
		  $this -> load ->model('Uas_model',"uasvar");
	}


	//ambil semua data
	public function index_get()
	{
		$data = $this ->uasvar ->getDataUas();
		//var_dump($data);
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

	//ambil datu data

	public function ambilSatu_get()
	{
		//ambil data id
		$id = $this ->get('id');
		var_dump($id);
		$data = $this -> uasvar -> getIdUas($id);
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

	//ambil semua atau salah satu
	public function ambilData_get(){
		$id = $this -> get('id');
		if($id==null){
			$data = $this -> uasvar ->getAlldata();
			if($data){
				$this->set_response([
					   'status' => TRUE,
					   'data'   => $data 
					   'message'=> 'Success'
						], REST_Controller::HTTP_OK);
			}else{
				$this->set_response([
					   'status' => FALSE,
					   'message' => 'Not Found'
						], REST_Controller::HTTP_NOT_FOUND);
			}
		}else{
			$data = $this -> uasvar ->getAlldata($id);
			if($data){
				$this->set_response([
					   'status' => TRUE,
					   'data'   => $data 
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
}