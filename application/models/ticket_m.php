<?php 
Class Ticket_m extends CI_Model{
	
	function index($viewcusttickets,$ticketid){
		
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
		
		if($viewcusttickets==1){
			$this->db->where('t_u_id',$usercompanyid[0]['u_id']);
		}
		$this->db->where('t_id',$ticketid);
		$query=$this->db->get();
		if($query -> num_rows() > 0)
		   {
			 return $query->result_array();
		   }else{
			   redirect('NotAuth','refresh');
		   }
	}
	public function record_count($ticketid) {
		
		$this->db->select("*");
		$this->db->from("tickets_replies");
		$this->db->where('t_t_id',$ticketid);
		$this->db->order_by("t_id", "desc");
		
		return $this->db->get()->num_rows();
    }
	
		public function fetch_data($ticketid,$limit, $start) {
	
		
		$this->db->limit($limit-1,$start-1);

		$this->db->where('t_t_id',$ticketid);
		$this->db->order_by("t_id", "desc");
        $query = $this->db->get("tickets_replies");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
	 }
	
	function reply($ticket_id){ //  insert a new reply
	$this->db->select('*')->from('settings')->where('s_id','1');
		  
		  $dd=$this->db->get();
		  foreach($dd->result_array() as $bb){
		      $setin[]=$bb;
		  }
		  
		$timezone=$setin[0]['s_timezone']; 
		date_default_timezone_set($timezone);
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
			't_t_id'=>$ticket_id,
			't_reply'=>$this->input->post('reply'),
			't_u_id'=>$usercompanyid['0']['u_id'],
			't_u_name'=>$usercompanyid['0']['u_name'],
			't_d_id'=>$usercompanyid['0']['u_department'],
			't_d_name'=>$usercompanyid['0']['u_department_name'],
			't_date'=>date('Y-m-d H:i:s'),
			
			);
			
			$this->db->insert('tickets_replies',$data);
	}
	
	
	function solved(){
		$ticketid=$_POST['solved'];
		$this->db->where('t_id',$ticketid);
		$this->db->update('tickets',array('t_status'=>'1'));
	}
}
?>