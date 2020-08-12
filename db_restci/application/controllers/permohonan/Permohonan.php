<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Permohonan extends REST_Controller{
    public function __construct()
	{
		# code...
		parent :: __construct();
		$this ->load -> model('M_permohonan');
    }
    
    //method index menampilkan data person
	public function index_get(){
		$response = $this ->M_permohonan->all_permohonan();
		$this ->response($response);
    }
    

	//method untuk menambah person
	public function add_post(){
		$response =$this ->M_permohonan->add_permohonan(
            $this -> post ('nik'),
			$this -> post ('nama_pemohon'),
            $this -> post ('alamat'),
            $this -> post ('no_tlp'),
            $this -> post ('email'),
            $this -> post ('id_kategori_permohonan'),
            $this -> post ('file_ktp'),
            $this -> post ('file_ktp_kuasa'),
            $this -> post ('file_surat_kuasa'),
            $this -> post ('file_akta'),
            $this -> post ('file_pengesahan'),
            $this -> post ('file_surat_keterangan'),
            $this -> post ('rincian_informasi'),
            $this -> post ('tujuan'),
            $this -> post ('id_memperoleh_informasi'),
            $this -> post ('bentuk_informasi'),  
		);
		$this ->response ($response);
	}

}