<?php
Class newtask_m extends CI_Model{
	
	
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
		$this->db->from('services');
		$this->db->where('s_display','1');
		$this->db->where('s_department',$usercompanyid[0]['u_department']);
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
		 $this->db->from('services');
		 $this->db->where('s_id', $this->input->post('service'));
		 $user_data = $query = $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $service[] = $row_userdata;
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
		't_s_id'=>$this->input->post('service'),
		't_s_name'=>$service[0]['s_name'],
		't_s_desc'=>nl2br($this->input->post('service_text')),
		't_u_id'=>$usercompanyid['0']['u_id'],
		't_u_name'=>$usercompanyid['0']['u_name'],
		't_d_id'=>$service[0]['s_department'],
		't_d_name'=>$department['0']['d_name'],
		't_date'=>date('Y-m-d H:i:s')
		);
		
		$this->db->insert('transactions',$data);
	}
}

?>