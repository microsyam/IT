<?php

class activityreport_m extends CI_Model{
	
	function index(){ // get serveices
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
		$this->db->from('services');
		$this->db->where('s_display','1');
		$this->db->where('s_department',$usercompanyid[0]['u_department']);
		$query=$this->db->get();
        return $query->result();
		
	}
	
	function get_user_data(){ // get users in activity 
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
		
		$this->db->select('*')->from('privileges')->where('p_u_id',$usercompanyid[0]['u_id']);
        $cus=$this->db->get()->row()->p_cust_activity_report;
        
		
        $this->db->select('*');
        $this->db->from('users');
		if($cus==1){
			$this->db->where('u_id',$usercompanyid[0]['u_id']);
		}
        $this->db->where('u_department',$usercompanyid[0]['u_department']);
        $this->db->where('u_active','1');
        $query=$this->db->get();
        return $query->result();
	}
	
	
	
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
		$this->db->select('*')->from('privileges')->where('p_u_id',$usercompanyid[0]['u_id']);
         $cus=$this->db->get()->row()->p_cust_activity_report;
		
		$this->db->select("*");
		$this->db->from("transactions");
		if($cus=='1'){
			$this->db->where('t_u_id',$usercompanyid[0]['u_id']);
		}
		$this->db->where('t_d_id',$usercompanyid[0]['u_department']);
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
		
		$this->db->select('*')->from('privileges')->where('p_u_id',$usercompanyid[0]['u_id']);
		
		$cus=$this->db->get()->row()->p_cust_activity_report;
		
		
		$this->db->limit($limit-1,$start-1);
		if($cus=='1'){
				$this->db->where('t_u_id',$usercompanyid[0]['u_id']);
			}

		$this->db->where('t_d_id',$usercompanyid[0]['u_department']);
		$this->db->order_by("t_id", "desc");
        $query = $this->db->get("transactions");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
	 }
	 
	    public function search_count($username,$service,$datefrom,$dateend) {
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
		
		$this->db->select('*')->from('privileges')->where('p_u_id',$usercompanyid[0]['u_id']);
			$cus=$this->db->get()->row()->p_cust_activity_report;
        $this->db->select('*');
        $this->db->from('transactions');
        $this->db->where('t_d_id',$usercompanyid[0]['u_department']);
		
			if($cus=='1'){
			$this->db->where('t_u_id',$usercompanyid[0]['u_id']);
			}
        if ($service != "null"){
            $this->db->where('t_s_id',$service);
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
        return $this->db->get()->num_rows();
    }
	
	public function search($username,$service,$datefrom,$dateend,$limit,$start)
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
		$this->db->select('*')->from('privileges')->where('p_u_id',$usercompanyid[0]['u_id']);
		$cus=$this->db->get()->row()->p_cust_activity_report;

        $this->db->select('*');
        $this->db->from('transactions');
		if($cus=='1'){
			$this->db->where('t_u_id',$usercompanyid[0]['u_id']);
			}
        $this->db->where('t_d_id',$usercompanyid[0]['u_department']);
        if ($service != "null"){
            $this->db->where('t_s_id',$service);
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