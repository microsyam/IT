<?php

class view_tickets_m extends CI_Model{
	
	function index($viewcusttickets){
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
		$this->db->from('ticket_cases');
		if($viewcusttickets==1){
			$this->db->where('t_d_id',$usercompanyid[0]['u_department']);
		}
		
		$query=$this->db->get();
        return $query->result();
		
	}
	
	function get_user_data($viewcusttickets){
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
        $this->db->from('users');
		if($viewcusttickets==1){
			$this->db->where('u_id',$usercompanyid[0]['u_id']);
		}
		$this->db->where('u_department',$usercompanyid[0]['u_department']);
		$this->db->where('u_active','1');
        
        $query=$this->db->get();
        return $query->result();
	}
	
	
	
		public function record_count($viewcusttickets) {
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
		$this->db->from("tickets");
		if($viewcusttickets==1){
			$this->db->where('t_u_id',$usercompanyid[0]['u_id']);
		}
		$this->db->where('t_d_id',$usercompanyid[0]['u_department']);
		$this->db->order_by("t_id", "desc");
		
		return $this->db->get()->num_rows();
    }
	
	
	public function fetch_data($viewcusttickets,$limit, $start) {
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
		if($viewcusttickets==1){
			$this->db->where('t_u_id',$usercompanyid[0]['u_id']);
		}
		$this->db->where('t_d_id',$usercompanyid[0]['u_department']);
		$this->db->order_by("t_id", "desc");
        $query = $this->db->get("tickets");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
	 }
	 
	    public function search_count($viewcusttickets,$username,$service,$datefrom,$dateend) {
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
        $this->db->from('tickets');
        $this->db->where('t_d_id',$usercompanyid[0]['u_department']);
        if ($service != "null"){
            $this->db->where('t_t_id',$service);
        }
        if ($username !="null"){
            $this->db->where('t_u_id',$username);
        }
        if ($dateend !="null"){
            $this->db->where('t_date <=',$dateend);
        }
        if ($datefrom !="null"){
            $this->db->where('t_date >=',$datefrom);
        }
		if($viewcusttickets==1){
			$this->db->where('t_u_id',$usercompanyid[0]['u_id']);
		}
        return $this->db->get()->num_rows();
    }
	
	public function search($viewcusttickets,$username,$service,$datefrom,$dateend,$limit,$start)
    {
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
        $this->db->from('tickets');
        $this->db->where('t_d_id',$usercompanyid[0]['u_department']);
        if ($service != "null"){
            $this->db->where('t_t_id',$service);
        }
        if ($username !="null"){
            $this->db->where('t_u_id',$username);
        }
        if ($dateend !="null"){
            $this->db->where('t_date <=',$dateend);
        }
        if ($datefrom !="null"){
            $this->db->where('t_date >=',$datefrom);
        }
		if($viewcusttickets==1){
			$this->db->where('t_u_id',$usercompanyid[0]['u_id']);
		}
$this->db->order_by("t_id", "desc");
        $this->db->limit($limit-1,$start-1);
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return $query->result();
        }
    }
	
	
}

?>