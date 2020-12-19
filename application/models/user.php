<?php
Class user extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('u_id,u_username,u_password');
   $this -> db -> from('users');
   $this -> db -> where('u_username', $username);
   $this -> db -> where('u_password', $password);
   $this -> db -> where('u_active', '1');
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 
 function userdata(){
	 $session_data = $this->session->userdata('logged_in');
        $name = $session_data['username'];
        
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('u_username', $name);
		$this->db->join('settings','settings.s_id=u_active');
        $user_data = $query = $this->db->get();
        if ($user_data->num_rows() > 0) {
            foreach ($query->result_array() as $row_userdata) {

                $usercompanyid[] = $row_userdata;
            }
        }
		
		return $usercompanyid;
	 
 }
  function get_permisstion(){ // to get the privileges for everyuser from datebase , that's general funtcion will using in all function 
	 $session_data = $this->session->userdata('logged_in');
         $name = $session_data['username'];
		 $this->db->select('*');
		 $this->db->from('users');
		 $this->db->where('u_username', $name);
		 $user_data = $query = $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $usercompanyid[] = $row_userdata;
                }
            }
			
		$this->db->select('*');
		$this->db->from('privileges');
		$this->db->where('p_u_id',$usercompanyid[0]['u_id']);
		$query=$this->db->get();
		if($query -> num_rows() > 0)
		   {
			 return $query->result_array();
		   }
		   
 }
 
 
 function display_users(){ 

        $this->db->select('*');
        $this->db->from('users');
        $data=$this->db->get();
        return $result=$data->result();
    }
}
?>