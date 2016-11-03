<?php

class Mbarang extends CI_Model{
	var $tabel = 'tb_barang';
	
	function __construct(){
		parent::__construct();
	}
	
	function get_allbarang(){
		$this->db->from($this->tabel);
		$query = $this->db->get();
		
		//cek apakah ada barang
		if($query->num_rows()>0){
			return $query->result();
		}
	}
	
	function get_barang_byid($id){
		$this->db->from($this->tabel);
		$this->db->where('kode_brg',$id);
		
		$query = $this->db->get();
		
		if($query->num_rows() == 1){
			return $query->result();
		}
	}
	
	function get_insert($data){
		$this->db->insert($this->tabel, $data);
		return TRUE;
	}
	
	function get_update($id,$data){
		$this->db->where('kode_brg',$id);
		$this->db->update($this->tabel);
		if($this->db->affected_rows() == 1){
			return TRUE;
		}
		return FALSE;
	}
	
	function del_barang($id) {
        $this->db->where('kode_brg', $id);
        $this->db->delete($this->tabel);
        if ($this->db->affected_rows() == 1) {
 
            return TRUE;
        }
        return FALSE;
    }
}
?>