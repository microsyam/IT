<?php
class Plants_m extends CI_Model{
	
	function get_plants(){
		
		$this->db->select("*");
		$this->db->from("Plants");
		$this->db->where('p_display','1');
		$this->db->order_by("p_id", "desc");
		$data=$this->db->get();
		return  $data->results();
	}
		public function record_count() {
		$this->db->select("*");
		$this->db->from("Plants");
		$this->db->where('p_display','1');
		$this->db->order_by("p_id", "desc");
		return $this->db->get()->num_rows();
    }
	 public function fetch_data($limit, $start) {
		
		$this->db->limit($limit-1,$start-1);

		$this->db->where('p_display','1');
		$this->db->order_by("p_id", "desc");
        $query = $this->db->get("plants");
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
		 'p_name'=>$this->input->post("plantname"),
		 );
		 
		 $this->db->insert('plants',$data);
	 }
	 
	 function remove(){
		
		  $this->db->where('p_id',$_POST['remove']);
		 $this->db->update('plants',array('p_display'=>'0'));
	 }
}
?>