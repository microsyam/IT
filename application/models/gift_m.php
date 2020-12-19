<?php
class gift_m extends CI_Model{
function index(){
	
	$this->db->select('*');
	$this->db->from('gift_partners');
	$data=$this->db->get();
	return $data->result();
}

function checker(){
	
	
	$this->db->select('*');
	$this->db->from('gift_cards');
	
	$this->db->join('gift_partners', 'gift_partners.gp_id = gift_cards.gift_part_id');
	$this->db->join('users','users.u_id = gift_cards.gift_u_id');
	if(isset($_POST["redeem"])){
		$redeemvalue=$this->input->post("redeem");
		$this->db->where('gift_id',$redeemvalue);
	}else{
	$this->db->where('gift_code', $this->input->post('gift_code'));
	$this->db->where('gift_part_id',$this->input->post('partner'));
	}
	
	$data=$this->db->get();
	if ($data->num_rows() > 0) {
		
		foreach ($data->result_array() as $row) {
                $dt[] = $row;
				
            }
		return $dt;
	}else{
		
		return false;
	}
	
}

function redeem(){
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

                    $userid[] = $row_userdata;
                }
            }
	$redeemvalue=$this->input->post("redeem");
	
		$this->db->where('gift_id',$redeemvalue);
		$this->db->update('gift_cards',array('gift_active'=>'1','gift_u_id'=>$userid[0]['u_id'],'gift_date'=>date('Y-m-d H:i:s')));
		
	
	
}
function generate(){
	ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');
		$session_data = $this->session->userdata('logged_in');
         $name = $session_data['username'];
		 $this->db->select('*');
		 $this->db->from('users');
		 $this->db->where('u_username', $name);
		 $user_data = $query = $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $userid[] = $row_userdata;
                }
            }
			
		$this->db->select('*')->from('settings')->where('s_id','1');
		  
		  $dd=$this->db->get();
		  foreach($dd->result_array() as $bb){
		      $setin[]=$bb;
		  }
		$timezone=$setin[0]['s_timezone'];
			date_default_timezone_set($timezone);
			
			
	$qty=$this->input->post('qty');
	 for ($i = 0; $i < $qty; $i++){
		 $code=random_string('alnum',8);
		 $this->db->select('gift_code');
		 $this->db->from('gift_cards');
		 $this->db->where('gift_code',$code);
		 $res=$this->db->get();
		 if ($res->num_rows() > 0) {
			 $qty++;
		 }else{
		 $data=array(
		 'gift_name'=>$this->input->post('name'),
		 'gift_part_id'=>$this->input->post('partner'),
		 'gift_u_id'=>$userid[0]['u_id'],
		 'gift_creation_date'=>date('Y-m-d H:i:s'),
		 'gift_code'=>$code,
		 );
		 $this->db->insert('gift_cards',$data);
		 }
	 }
    
  

	 
	
}


	
}