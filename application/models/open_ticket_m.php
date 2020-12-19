<?php
Class open_ticket_m extends CI_Model{
	
	
	function index(){
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
		$this->db->where('t_d_id',$usercompanyid[0]['u_department']);
		$data=$this->db->get();
		return $data->result();
	}
	
	function Save(){
		
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
            
              $this->db->select('*')->from('settings')->where('s_id','1');
		  
		  $dd=$this->db->get();
		  foreach($dd->result_array() as $bb){
		      $setin[]=$bb;
		  }
		  
			$timezone=$setin[0]['s_timezone'];
			date_default_timezone_set($timezone);
			$this->db->select('*');
		 $this->db->from('ticket_cases');
		 $this->db->where('t_id', $this->input->post('service'));
		 $this->db->where('t_d_id',$usercompanyid[0]['u_department']);
		 $ticket_cases= $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($ticket_cases->result_array() as $row_userdata) {

                    $cases[] = $row_userdata;
                }
            }
			
			$this->db->select('*');
		 $this->db->from('departments');
		 $this->db->where('d_id', $usercompanyid['0']['u_department']);
		 $user_data = $query = $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $department[] = $row_userdata;
                }
            }
			
			
			
			$data=array(
			't_message'=>$this->input->post('service_text'),
			't_u_id'=>$usercompanyid['0']['u_id'],
			't_u_name'=>$usercompanyid['0']['u_name'],
			't_t_id'=>$cases['0']['t_id'],
			't_t_name'=>$cases['0']['t_name'],
			't_d_id'=>$usercompanyid['0']['u_department'],
			't_d_name'=>$department['0']['d_name'],
			't_date'=>date('Y-m-d H:i:s'),
			);
	
		
		$this->db->insert('tickets',$data);
	}
}

?>