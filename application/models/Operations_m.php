<?php
Class Operations_m extends CI_Model{
	
	function get_classes(){
		
		$this->db->select('*');
		$this->db->from('opclass');
		$this->db->where('o_display','1');
		$data=$this->db->get();
		return $data->result();
		
	}
	function fetch_data($query){
		$this->db->select('*');
		$this->db->from('operations AS O');
		$this->db->join('employees AS E', 'E.e_id = O.o_e_id');
		$this->db->join('opclass AS C', 'C.o_id = O.o_class_id');
		$this->db->join('users AS U', 'U.u_id = O.o_u_id');
		if($query != '')
		{
			$this->db->or_like('e_name', $query);
			$this->db->or_like('o_name', $query);
			$this->db->or_like('o_status', $query);
			$this->db->or_like('o_subject', $query);
		}
		$this->db->order_by('op_id', 'DESC');
		return $this->db->get();
		
	}
function post(){
	
	//retriving time zone
	$this->db->select('*')->from('settings')->where('s_id','1');
		  
		  $dd=$this->db->get();
		  foreach($dd->result_array() as $bb){
		      $setin[]=$bb;
		  }
		  
			$timezone=$setin[0]['s_timezone'];
			date_default_timezone_set($timezone);
			
			// to get the current userdata
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
		// insert the main operation data	
	$data=array(
	'o_e_id'=>$this->input->post('employee'),
	'o_u_id'=>$usercompanyid[0]['u_id'],
	'o_class_id'=>$this->input->post('class'),
	'o_subject'=>$this->input->post('subject'),
	'o_status'=>$this->input->post('Status'),
	'o_piriority'=>$this->input->post('pir'),
	'o_date'=>date('Y-m-d H:i:s'),
	);
	
	$this->db->insert('operations',$data);
	$last_id = $this->db->insert_id();
	// insert the description details for the first time , this section adding the lasted ID into Operantion_details
	
	$datails=array(
	'o_o_id'=>$last_id,
	'o_u_id'=>$usercompanyid[0]['u_id'],
	'o_description'=>$this->input->post('description'),
	'o_direction_flag'=>$this->input->post('direction'),
	'od_date'=>date('Y-m-d H:i:s'),
	);
	
	$this->db->insert('operation_details',$datails);
}
function get_op($opdetails){
	$this->db->select('*');
		$this->db->from('operations AS O');
		$this->db->join('employees AS E', 'E.e_id = O.o_e_id');
		$this->db->join('opclass AS C', 'C.o_id = O.o_class_id');
		$this->db->join('users AS U', 'U.u_id = O.o_u_id');
		$this->db->where('O.op_id',$opdetails);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row_empdata) {

                $odetails[] = $row_empdata;
            }
        }
		
		return $odetails;
}
function get_comments($opdetails){
	$this->db->select('*');
		$this->db->from('operation_details AS OD');
		$this->db->join('users AS U', 'U.u_id = OD.o_u_id');
		$this->db->join('operations as OP', 'OP.op_id = OD.o_o_id');
		$this->db->join('employees as EM', 'EM.e_id = OP.o_e_id');
		$this->db->where('OD.o_o_id',$opdetails);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row_empdata) {

                $odetail[] = $row_empdata;
            }
        }
		
		return $odetail;
}

function reply($opdetails){
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
			//time zone
			$this->db->select('*')->from('settings')->where('s_id','1');
		  
		  $dd=$this->db->get();
		  foreach($dd->result_array() as $bb){
		      $setin[]=$bb;
		  }
		  
			$timezone=$setin[0]['s_timezone'];
			date_default_timezone_set($timezone);
			
			//end of timezone
			
			if(isset($_POST["closed"])){
				$direction="1";
				$desc= "Status Changed to Close";
				$this->db->set('o_status','Closed');
				$this->db->where('op_id',$opdetails);
				$this->db->update('operations');
			}elseif(isset($_POST['onhold'])){
				$direction="1";
				$desc="Status Changed to Onhold";
				$this->db->set('o_status','Onhold');
				$this->db->where('op_id',$opdetails);
				$this->db->update('operations');
			}elseif(isset($_POST['opened'])){
				$direction="1";
				$desc="Status Changed to Open";
				$this->db->set('o_status','Opened');
				$this->db->where('op_id',$opdetails);
				$this->db->update('operations');
			}else{
				$desc=$this->input->post('description');
				$direction=$this->input->post('direction');
			}
	$data=array(
	'o_o_id'=>$opdetails,
	'o_u_id'=>$usercompanyid[0]['u_id'],
	'o_description'=>$desc,
	'od_date'=>date('Y-m-d H:i:s'),
	'o_direction_flag'=>$direction,
	);
	
	$this->db->insert('operation_details',$data);
	
}

}
?>