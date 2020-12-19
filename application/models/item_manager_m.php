<?php
class item_manager_m extends CI_Model{
	
	function get_plants($plant){ //first page
		
		$this->db->select("*");
		$this->db->from("warehouse");
		$this->db->where('w_display','1');
		
		if(!empty($plant)){
		$this->db->where('w_id',$plant);
		}
		$this->db->order_by("w_id", "desc");
		$data=$this->db->get();
		return  $result=$data->result();
	}

		public function record_count($plant) {
		$this->db->select("*");
		$this->db->from("stock_items");
		$this->db->where('s_display','1');
		$this->db->where('s_warehouse_id',$plant);
		
		$this->db->order_by("s_id", "desc");
		return $this->db->get()->num_rows();
    }
	 public function fetch_data($plant,$limit, $start) {
		
		$this->db->limit($limit-1,$start-1);

		$this->db->where('s_display','1');
		$this->db->where('s_warehouse_id',$plant);
		$this->db->order_by("s_id", "desc");
        $query = $this->db->get("stock_items");
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
		 's_name'=>$this->input->post("branchname"),
		 's_warehouse_id'=>$this->input->post("plant"),
		 );
		 
		 $this->db->insert('stock_items',$data);
	 }
	 
	 function remove(){
		
		  $this->db->where('s_id',$_POST['remove']);
		 $this->db->update('stock_items',array('s_display'=>'0'));
	 }
	 
	 function update(){
		 $data=array(
		 's_name'=>$this->input->post("value".$_POST["update"]),
		 's_asset'=>$this->input->post("type".$_POST["update"]),
		 );
		 $this->db->where('s_id',$_POST["update"]);
		 $this->db->update('stock_items',$data);
		 
	 }
}
?>