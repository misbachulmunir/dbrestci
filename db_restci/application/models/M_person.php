<?php

/**
 * 
 */
class M_person extends CI_Model
{
	
	//response jika field aada yang kosong
	public function empty_response(){
		$response ['status']=502;
		$response ['eror']=true;
		$response ['message']='Field Tidak Boleh Kosong';
		return $response;
	}

	//get satu data
	public function getIdUas($id){
        return $this ->db ->get_where('tb_person',['id'=>$id])->result_array();
    }

	//function add data

	public function add_person($name,$address,$phone){
		if(empty($name)||empty($address)||empty($phone)){
			return $this -> empty_response();
		}else{
			$data = array(
				"name" => $name,
				"address" => $address,
				"phone" => $phone
			 );

			$insert = $this -> db -> insert("tb_person",$data);

			if ($insert) {
				# code...
				$response ['status']=200;
				$response ['error']=false;
				$response ['message']="Data pribadi di tambahkan";
				return $response;
			}else{
				$response ['status']=502;
				$response ['error']=true;
				$response ['message']="Data pribadi Gagal tambahkan";
				return $response;
			}
		}
	}

	
	

	//function ambil data semua
	public function all_person(){
		$all = $this ->db ->get("tb_person")->result();
				$response ['status']=200;
				$response ['error']=false;
				$response ['person']=$all;
				return $response;
	}

	// function hapus data
	public function delete_person($id){
		if($id ==''){
			return $this -> empty_response();
		}else{
			$where = array("id" =>$id );
			$this -> db ->where($where);
			$delete = $this->db -> delete("tb_person");
			if($delete){
				$response ['status']=200;
				$response ['error']=false;
				$response ['message']="Data pribadi di hapus";
				return $response;
			}else{
				$response ['status']=502;
				$response ['error']=true;
				$response ['message']="Data pribadi gagal hapus";
				return $response;
			}
		}

	}

	//function update data
	public function update_person($id,$name,$address,$phone,$imagename){
		if($id == ''|| empty($name)||empty($address)||empty($address)||empty($phone)){
			return $this -> empty_response();
		}else{
			$where  = array("id" => $id );
			$set  = array(
				'name' => $name,
				'address' => $address,
				'phone' => $phone,
				'imagename' => $imagename
				 );

			$this ->db -> where ($where);
			$update = $this -> db -> update ("tb_person",$set);

			if($update){
				$response ['status']=200;
				$response ['error']=false;
				$response ['message']="Data pribadi berhasil di update";
				return $response;
			}else{
				$response ['status']=502;
				$response ['error']=true;
				$response ['message']="Data pribadi gagal di update";
				return $response;
			}

		}

	}

	public function select_count(){
		$this -> db -> select('count(*) as jumlah')-> from('tb_person');
		$query = $this -> db -> get()->row_array();
		$total_record  = array('Total' => $query['jumlah'], );
		return $total_record;
	}
}
?>