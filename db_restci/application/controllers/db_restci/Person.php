<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

/**
 * 
 */
class Person extends REST_Controller
{
	
	public function __construct()
	{
		# code...
		parent :: __construct();
		$this ->load ->model('M_person');
	}

	//method index menampilkan data person
	public function index_get(){
		$response = $this ->M_person->all_person();
		$this ->response($response);
	}


	//method untuk menambah person
	public function add_post(){
		$response =$this ->M_person->add_person(
			$this -> post ('name'),
			$this -> post ('address'),
			$this -> post ('phone'),
		);
		$this ->response ($response);
	}

	//update data person menggunakan method put
	public function update_put(){
		$response = $this -> M_person-> update_person(
			$this -> put('id'),
			$this -> put('name'),
			$this -> put('address'),
			$this -> put('phone'),
			$this -> put('imagename')	
		);
		$this ->response($response);
	}

	//delete person data
	public function delete_post(){
		$response=$this->M_person ->delete_person(
			$this->post('id')
		);
		$this ->response($response);
	}


	//ambil count recoed
	public function total_get(){
		$response=$this->M_person ->select_count();
		$this ->response($response);
	}
	

}
?>