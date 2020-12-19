<?php
class adduser_m extends CI_Model{
	
	function index(){
		
		$this->db->select('*')->from('departments')->where('d_id',$this->input->post('department'));
		$this->db->where('d_display','1');
		$query=$this->db->get();
		 if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $usercompanyid[] = $row_userdata;
                }
            }
			
		$att=array(
		'u_name'=>$this->input->post('name'),
		'u_username'=>$this->input->post('username'),
		'u_password'=>$this->input->post('password'),
		'u_email'=>$this->input->post('email'),
		'u_phone'=>$this->input->post('phone'),
		'u_department'=>$this->input->post('department'),
		'u_department_name'=>$usercompanyid[0]['d_name'],
		'u_active'=>$this->input->post('status'),
		);
		$this->db->insert('users',$att);
		$insert_id = $this->db->insert_id();
		$this->db->insert('privileges',array('p_u_id'=>$insert_id));
		
		
		
	}
}

?>