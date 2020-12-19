<?php

class chat_m extends CI_Model{
	

	
	

		public function record_count($viewcusttask) {
			
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
		$this->db->from("chat");
		$this->db->order_by("c_id", "desc");
		if ($viewcusttask==0){
		$this->db->where('c_u_to_id',$usercompanyid[0]['u_id']);
		$this->db->or_where('c_u_to_id','0');
		$this->db->or_where('c_u_id',$usercompanyid[0]['u_id']);
		}
		$this->db->where('c_d_id',$usercompanyid[0]['u_department']);
		$this->db->where('c_cmptd','0');
		return $this->db->get()->num_rows();
    }
	
	
	function services(){
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
		
		$this->db->select('*')->from('services');
		$this->db->where('s_display','1');
		$this->db->where('s_department',$usercompanyid[0]['u_department']);
		$query=$this->db->get();
		return $data=$query->result();
	}
	 public function fetch_data($viewcusttask,$limit, $start) {
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
		$this->db->where('c_d_id',$usercompanyid[0]['u_department']);
		if ($viewcusttask==0){
		$this->db->where('c_u_to_id',$usercompanyid[0]['u_id']);
		$this->db->or_where('c_u_to_id','0');
		$this->db->or_where('c_u_id',$usercompanyid[0]['u_id']);
		}
		$this->db->where('c_cmptd','0');
		$this->db->where('c_d_id',$usercompanyid[0]['u_department']);
		$this->db->order_by("c_id", "desc");
        $query = $this->db->get("chat");
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
        $qq = $this->db->get();
        if ($qq->num_rows() > 0) {
            foreach ($qq->result_array() as $ss) {

                $serv[] = $ss;
            }
        }
		
		
		$this->db->select('*');
        $this->db->from('users');
        $this->db->where('u_id', $this->input->post('select_user'));
        $name= $this->db->get();
        if ($name->num_rows() > 0) {
            foreach ($name->result_array() as $row_userdata) {

                $username[] = $row_userdata;
            }
        }
		if (empty($username[0]['u_name'])){
			$toname="Anyone";
		}else{
			$toname=$username[0]['u_name'];
		}
		 $data=array(
		 'c_u_id'=>$usercompanyid[0]['u_id'],
		 'c_u_name'=>$usercompanyid[0]['u_name'],
		 'c_d_id'=>$usercompanyid[0]['u_department'],
		 'c_message'=>$this->input->post('message'),
		 'c_u_to_id'=>$this->input->post('select_user'),
		 'c_u_to_name'=>$toname,
		 'c_s_id'=>$this->input->post('service'),
		 'c_s_name'=>$serv[0]['s_name'],
		 'c_date'=>date('Y-m-d H:i:s')
		 );
		 
		 $this->db->insert('chat',$data);
	 }
	 function update(){
		  $this->db->select('*')->from('settings')->where('s_id','1');
		  
		  $dd=$this->db->get();
		  foreach($dd->result_array() as $bb){
		      $setin[]=$bb;
		  }
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
		$timezone=$setin[0]['s_timezone'];
		date_default_timezone_set($timezone);
		
		$this->db->select('*');
        $this->db->from('chat');
       $this->db->where('c_id',$_POST['done']);
        $chat = $query = $this->db->get();
        if ($chat->num_rows() > 0) {
            foreach ($query->result_array() as $other) {

                $chatvalue[] = $other;
            }
        }
		
		$data=array('c_cmptd'=>'1');
		$this->db->where('c_id',$_POST['done']);
		$this->db->update('chat',$data);
		
		
		$datain=array(
		't_s_id'=>$chatvalue[0]['c_s_id'],
		't_s_name'=>$chatvalue[0]['c_s_name'],
		't_s_desc'=>$chatvalue[0]['c_message'],
		't_u_id'=>$usercompanyid[0]['u_id'],
		't_u_name'=>$usercompanyid[0]['u_name'],
		't_d_id'=>$chatvalue[0]['c_d_id'],
		't_date'=>date('Y-m-d H:i:s'),
		't_tasked_from_u_id'=>$chatvalue[0]['c_u_id'],
		't_tasked_from_u_name'=>$chatvalue[0]['c_u_name'],
		't_tasked'=>'1'
		
		);
		
		$this->db->insert('transactions',$datain);
		
	 }
	 
}

?>