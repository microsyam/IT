<?php
class opclass_m extends CI_Model{
	

		public function record_count() {
		$this->db->select("*");
		$this->db->from("opclass");
		$this->db->where('o_display','1');
		$this->db->order_by("o_id", "desc");
		return $this->db->get()->num_rows();
    }
	 public function fetch_data($limit, $start) {
		
		$this->db->limit($limit-1,$start-1);

		$this->db->where('o_display','1');
		$this->db->order_by("o_id", "desc");
        $query = $this->db->get("opclass");
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
		 'o_name'=>$this->input->post("classname"),
		 );
		 
		 $this->db->insert('opclass',$data);
	 }
	 
	 function remove(){
		
		  $this->db->where('o_id',$_POST['remove']);
		 $this->db->update('opclass',array('o_display'=>'0'));
	 }
}
?>