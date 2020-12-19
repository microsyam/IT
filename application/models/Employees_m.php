<?php
class Employees_m extends CI_Model{
	
	function get_emp(){
		$this->db->select("*");
		$this->db->from("employees");
		$this->db->where('e_status','1');
		
		$data=$this->db->get();
		return $data->result();
		
	}function get_emp1(){
		$this->db->select("*");
		$this->db->from("employees");
		if(isset($_POST["select_emp"])){ // this for edit employee drop list
			$this->db->where('e_id',$this->input->post('select_emp'));
			
		}
		
		$data=$this->db->get();
		return $data->result();
		
	}
	
	function save(){
		
		$data=array(
		'e_name'=>$this->input->post('empname'),
		'e_department_id'=>$this->input->post('department'),
		'e_code'=>$this->input->post('empcode'),
		);
		$this->db->insert('employees',$data);
	}
		function update(){
		
		$data=array(
		'e_name'=>$this->input->post('ename'),
		'e_department_id'=>$this->input->post('department'),
		'e_code'=>$this->input->post('code'),
		'e_status'=>$this->input->post('status'),
		
		);
		$this->db->where('e_id',$this->input->post('select_emp'));
		$this->db->update('employees',$data);
	}
}

?>