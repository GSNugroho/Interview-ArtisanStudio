<?php 
 
class test_model extends CI_Model{

	function getData() {
		return $this->db->get('barang');
	}

    function putData($data,$table) {
		$this->db->insert($table,$data);
	}

    function deleteData($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

    function editData($where,$table){		
        return $this->db->get_where($table,$where);
    }

    function updateData($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}