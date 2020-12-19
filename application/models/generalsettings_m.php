<?php
class GeneralSettings_m extends CI_Model{
	
	
	function index(){
			$this->db->select('*');
		$this->db->from('settings');
		$this->db->where('s_id','1');
		$query=$this->db->get();
		if($query->num_rows()>0){

            foreach($query->result_array() as $row_userdata){

                $mydata[] = $row_userdata;
            }

            return $mydata;
        }
	}
	
	
	function display_time(){ // display all time zone
		
		$this->db->select('*')->from('timezone');
		
		$query=$this->db->get();
		
		return $data=$query->result();
	}
	
	function image(){
			
			$this->db->select('s_logo');
			$this->db->from('settings');
			$this->db->where('s_id','1');
			return $query=$this->db->get()->row()->s_logo;
			
	}
	
	function update($filename){
		
		$data=array('s_logo'=>$filename);
		$this->db->where('s_id','1');
		$this->db->update('settings',$data);
		
	}
	
		function remove_logo(){

			$this->db->where('s_id','1');
			$this->db->update('settings',array('s_logo'=>null));
	}
	
	function save(){
		
		 $this->db->select('*');
        $this->db->from('timezone');
        $this->db->where('t_id',$this->input->post('timezone'));
         $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row_userdata) {

                $usercompanyid[] = $row_userdata;
            }
        }
		
		
		$data=array(
		's_name'=>$this->input->post('name'),
		's_timezone'=>$usercompanyid[0]['t_name'],
		's_timezone_id'=>$this->input->post('timezone'),
		);
		$this->db->where('s_id','1');
		
		$this->db->update('settings',$data);
	}
	
}
?>