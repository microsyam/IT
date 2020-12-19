<?php
class stockboard_m extends CI_Model{
	
	function get_plants($warehouse){ //first page
		
		$this->db->select("*");
		$this->db->from("warehouse");
		$this->db->where('w_display','1');
		
		if(!empty($warehouse)){
		$this->db->where('w_id',$warehouse);
		}
		$this->db->order_by("w_id", "desc");
		$data=$this->db->get();
		return  $result=$data->result();
	}

		public function record_count($warehouse) {
		$this->db->select("*");
		$this->db->from("stock_items");
		$this->db->where('s_display','1');
		$this->db->where('s_warehouse_id',$warehouse);
		
		$this->db->order_by("s_id", "desc");
		return $this->db->get()->num_rows();
    }
	 public function fetch_data($warehouse,$limit, $start) {
		
		$this->db->limit($limit-1,$start-1);

		$this->db->where('s_display','1');
		$this->db->where('s_warehouse_id',$warehouse);
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
	 public function excel() {

		

        $this->db->select('s_name as Item Name,s_qty as Quantity');
        $this->db->from('stock_items');
		$this->db->where('s_warehouse_id',$this->input->post('plant'));
         return $query=$this->db->get();
   
    }
	 

	 

}
?>