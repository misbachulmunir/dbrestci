<?php
class Uas_model extends CI_Model{


    //ambil semua data
    public function getDataUas(){
    return $this ->db ->get('tb_person')->result_array();
    
    }

    //ambil satu data menurut id
    public function getIdUas($id){
        return $this ->db ->get_where('tb_person',['id'=>$id])->result_array();
    }

    public function getAlldata($id == null){
        if($id == null){
            return $this ->db ->get('tb_person')->result_array();
        } else {
            return $this ->db ->get_where('tb_person',['id'=>$id])->result_array();
        }
    }
}