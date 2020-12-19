<?php

class Cases_m extends CI_Model{
	

	
	

		public function record_count() {
			
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
		
		
		$this->db->select("*");
		$this->db->from("ticket_cases");
		$this->db->order_by("t_id", "desc");
		
		return $this->db->get()->num_rows();
    }
	 public function fetch_data($limit, $start) {
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
		
		$this->db->limit($limit-1,$start-1);
		
		$this->db->order_by("t_id", "desc");
        $query = $this->db->get("ticket_cases");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
	 }
	 
	 function save(){
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
		
		 $data=array(
		 't_name'=>$this->input->post("casename"),
		 't_d_id'=>$usercompanyid[0]['u_department'],
		 't_d_name'=>$usercompanyid[0]['u_department_name']
		 );
		 
		 $this->db->insert('ticket_cases',$data);
	 }
	 
	 function remove(){
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
		
		$this->db->where('t_id',$_POST["del"]);
		
		$this->db->delete('ticket_cases');
	 }
	 
}

?>