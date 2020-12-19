<?php 

class myaccount_m extends CI_Model{
	
function updatepassword(){
	
	$session_data = $this->session->userdata('logged_in');
         $name = $session_data['username'];
		 
		 $this->db->where('u_username',$name);
		 $this->db->update('users',array('u_password'=>$this->input->post('password')));
		 
}
function save(){
	
	$session_data = $this->session->userdata('logged_in');
         $name = $session_data['username'];
		 
		 $this->db->where('u_username',$name);
		 $this->db->update('users',array('u_email'=>$this->input->post('email'),'u_phone'=>$this->input->post('phone')));
		 
}
}

?>