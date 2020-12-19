<?php
class Vendors_m extends CI_Model{
	
	function get_plants(){
		
		$this->db->select("*");
		$this->db->from("vendors");
		$this->db->where('v_display','1');
		$this->db->order_by("v_id", "desc");
		$data=$this->db->get();
		return  $data->results();
	}
		public function record_count() {
		$this->db->select("*");
		$this->db->from("vendors");
		$this->db->where('v_display','1');
		$this->db->order_by("v_id", "desc");
		return $this->db->get()->num_rows();
    }
	 public function fetch_data($limit, $start) {
		
		$this->db->limit($limit-1,$start-1);

		$this->db->where('v_display','1');
		$this->db->order_by("v_id", "desc");
        $query = $this->db->get("vendors");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
	 }
	 
	 function save(){

		 $data=array(
		 'v_name'=>$this->input->post("plantname"),
		 'v_phone'=>$this->input->post("phone"),
		 'v_email'=>$this->input->post("email"),
		 'v_address'=>$this->input->post("address"),
		 );
		 
		 $this->db->insert('vendors',$data);
	 }
	 
	 function remove(){
		
		  $this->db->where('v_id',$_POST['remove']);
		 $this->db->update('vendors',array('v_display'=>'0'));
	 }
}
?>