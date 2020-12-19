<?php
class departments_m extends CI_Model{
	
		public function record_count() {

		
		$this->db->select("*");
		$this->db->from("departments");
		$this->db->where('d_display','1');
		$this->db->order_by("d_id", "desc");
		return $this->db->get()->num_rows();
    }
	 public function fetch_data($limit, $start) {
		
		$this->db->limit($limit-1,$start-1);

		$this->db->where('d_display','1');
		$this->db->order_by("d_id", "desc");
        $query = $this->db->get("departments");
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
		 'd_name'=>$this->input->post("departmentname"),
		 );
		 
		 $this->db->insert('departments',$data);
	 }
	 
	 function remove(){
		
		  $this->db->where('d_id',$_POST['remove']);
		 $this->db->update('departments',array('d_display'=>'0'));
	 }
}
?>