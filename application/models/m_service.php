<?php 

class M_Service extends CI_Model {
	public function tampil_data()
	{
		return $this->db->get('t_terima');
	}
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function update_data($where,$data,$table){
		return $this->db->update($table,$data,$where);
	}
}