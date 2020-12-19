<?php
class warehouses_m extends CI_Model{
	
		public function record_count() {

		
		$this->db->select("*");
		$this->db->from("warehouse");
		$this->db->where('w_display','1');
		$this->db->order_by("w_id", "desc");
		return $this->db->get()->num_rows();
    }
	 public function fetch_data($limit, $start) {
		
		$this->db->limit($limit-1,$start-1);

		$this->db->where('w_display','1');
		$this->db->order_by("w_id", "desc");
        $query = $this->db->get("warehouse");
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
		 'w_name'=>$this->input->post("departmentname"),
		 );
		 
		 $this->db->insert('warehouse',$data);
	 }
	 
	 function remove(){
		
		  $this->db->where('w_id',$_POST['remove']);
		 $this->db->update('warehouse',array('w_display'=>'0'));
	 }
}
?>