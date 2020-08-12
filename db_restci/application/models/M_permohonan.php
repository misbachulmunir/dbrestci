<?php

class M_Permohonan extends CI_Model
{

    //response jika field aada yang kosong
	public function empty_response(){
		$response ['status']=502;
		$response ['eror']=true;
		$response ['message']='Field Tidak Boleh Kosong';
		return $response;
    }
    
    //function ambil data semua
	public function all_permohonan(){
		$all = $this ->db ->get("t_permohonan")->result();
				$response ['status']=200;
				$response ['error']=false;
				$response ['permohonan']=$all;
				return $response;
    }
    
    //function add data permohonan
	public function add_permohonan($nik,$nama_pemohon,$alamat,$no_tlp,$email,$id_kategori_permohonan,$file_ktp,$file_ktp_kuasa,$file_surat_kuasa,$file_akta,$file_pengesahan,$file_surat_keterangan,$rincian_informasi,$tujuan,$id_memperoleh_informasi,$bentuk_informasi){
		// if(empty($nik)||empty($nama_pemohon)||empty($alamat)){
		// 	return $this -> empty_response();
		// }else{
            $no = date('Ymd') . '/PPID/' . date('Hmis') . '/' . rand(1000, 9990);
            $cek = $this-> get_last_no($no);
            if ($cek > 0) {
                $no = date('Ymd') . '/PPID/' . date('Hmis') . '/' . rand(1000, 9990);
            }
            var_dump($no);
			$data = array(
				"no_permohonan" => $no,
				"nik" => $nik,
                "nama_pemohon" => $nama_pemohon,
                "alamat" => $alamat,
                "no_tlp" => $no_tlp,
				"email" => $email,
                "id_kategori_permohonan" => $id_kategori_permohonan,
                "file_ktp" => $file_ktp,
				"file_ktp_kuasa" => $file_ktp_kuasa,
                "file_surat_kuasa" => $file_surat_kuasa,
                "file_akta" => $file_akta,
				"file_pengesahan" => $file_pengesahan,
                "file_surat_keterangan" => $file_surat_keterangan,
                "rincian_informasi" => $rincian_informasi,
                "tujuan" => $tujuan,
                "id_memperoleh_informasi" => $id_memperoleh_informasi,
                "bentuk_informasi" => $bentuk_informasi,
                "cdd" => date('Y-m-d H:i:s'),
                "hash" => md5(rand(1, 9999) + time()),
			 );

			$insert = $this -> db -> insert("t_permohonan",$data);

			if ($insert) {
				# code...
				$response ['status']=200;
				$response ['error']=false;
				$response ['message']="Data permohonan di tambahkan";
				return $response;
			}else{
				$response ['status']=502;
				$response ['error']=true;
				$response ['message']="Data permohonan Gagal tambahkan";
				return $response;
			}
		// }
    }
    public function get_last_no($id){
		$this->db->select('no_permohonan');
		$this->db->from('t_permohonan');
		$this->db->where('no_permohonan', $id);
		$query = $this->db->get();
		return $query->row();
	}

}