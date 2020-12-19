<?php
class login_logo_m extends CI_Model{
	
	function index(){
		
		$this->db->select('*')
		->from('settings')
		->where('s_id','1');
		
		$query=$this->db->get();
		
		foreach($query->result_array() as $row){
			$data[] =$row; 
		}
		return  $data;
	}
}
?>