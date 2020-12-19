<?php
class Branches_m extends CI_Model{
	
	function get_plants($plant){ //first page
		
		$this->db->select("*");
		$this->db->from("Plants");
		$this->db->where('p_display','1');
		
		if(!empty($plant)){
		$this->db->where('p_id',$plant);
		}
		$this->db->order_by("p_id", "desc");
		$data=$this->db->get();
		return  $result=$data->result();
	}

		public function record_count($plant) {
		$this->db->select("*");
		$this->db->from("branches");
		$this->db->where('b_display','1');
		$this->db->where('b_plant_id',$plant);
		
		$this->db->order_by("b_id", "desc");
		return $this->db->get()->num_rows();
    }
	 public function fetch_data($plant,$limit, $start) {
		
		$this->db->limit($limit-1,$start-1);

		$this->db->where('b_display','1');
		$this->db->where('b_plant_id',$plant);
		$this->db->order_by("b_id", "desc");
        $query = $this->db->get("branches");
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
		 'b_name'=>$this->input->post("branchname"),
		 'b_plant_id'=>$this->input->post("plant"),
		 );
		 
		 $this->db->insert('branches',$data);
	 }
	 
	 function remove(){
		
		  $this->db->where('b_id',$_POST['remove']);
		 $this->db->update('branches',array('b_display'=>'0'));
	 }
}
?>