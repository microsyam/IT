<?php

class AddComputer_m extends CI_Model{
	
	function index(){
		
		$this->db->select('*');
		$this->db->from('departments');
		$this->db->where('d_display','1');
		$data=$this->db->get();
		return $data->result();
	}
	
	function save(){
		$data=array(
		'p_name'=>$this->input->post('pcname'),
		'p_ip'=>$this->input->post('ip'),
		'p_owner_id'=>$this->input->post('employee'),
		'p_department'=>$this->input->post('department'),
		'p_teamviewer'=>$this->input->post('teamviewer'),
		
		
		);
		
		$this->db->insert('computers',$data);
	}
}

?>