<?php

class EditComputer_m extends CI_Model{
	
	function index(){}
	
	function getcomputers(){
		$this->db->select('*');
		$this->db->from('computers');
		$data=$this->db->get();
		return $data->result();
	}
	
	function getcomputerdata(){
		$this->db->select('*');
		$this->db->from('computers');
		$this->db->where('p_id',$this->input->post('select_computer'));
		$data=$this->db->get();
		return $data->result();
	}
	
	function dep(){
		
		$this->db->select('*');
		$this->db->from('departments');
		$this->db->where('d_display','1');
		$data=$this->db->get();
		return $data->result();
	}
	
	function update(){
		
		$data=array(
		'p_name'=>$this->input->post('pcname'),
		'p_ip'=>$this->input->post('ip'),
		'p_owner_id'=>$this->input->post('employee'),
		'p_department'=>$this->input->post('department'),
		'p_teamviewer'=>$this->input->post('teamviewer'),
		
		
		);
		$this->db->where('p_id',$this->input->post('select_computer'));
		$this->db->update('computers',$data);
	}
	
	function del(){
		
		$this->db->where('p_id',$this->input->post('select_computer'));
		$this->db->delete('computers');

	}
}

?>