<?php

class newservice_m extends CI_Model{

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
		$this->db->from("services");
		$this->db->where('s_display','1');
		$this->db->order_by("s_id", "desc");
		$this->db->where('s_department',$usercompanyid[0]['u_department']);
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
		$this->db->where('s_department',$usercompanyid[0]['u_department']);
		$this->db->where('s_display','1');
		$this->db->order_by("s_id", "desc");
        $query = $this->db->get("services");
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
		 's_name'=>$this->input->post("servicename"),
		 's_department'=>$usercompanyid[0]['u_department']
		 );
		 
		 $this->db->insert('services',$data);
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
		
		 $this->db->where('s_department',$usercompanyid[0]['u_department']);
		 $this->db->where('s_id',$_POST['remove']);
		 $this->db->update('services',array('s_display'=>'0'));
	 }
	 
}

?>