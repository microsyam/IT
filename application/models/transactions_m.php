<?php

class transactions_m extends CI_Model{
	
	function warehouses(){ // get serveices
	
		$this->db->select('*');
		$this->db->from('warehouse');
		$this->db->where('w_display','1');
		$query=$this->db->get();
        return $query->result();
	}
	
	public function excel($vendors,$warehouse,$datefrom,$dateend,$items,$trans) {

		

        $this->db->select('s_name as Item Name,e_name as Employee,u_name as Submited by,st_qty as QTY,s_date as Duration,v_name as Vendor,s_status as Direction,s_details as Comments');
        //$this->db->select('*');
        $this->db->from('stock_trans');
		$this->db->join('stock_items','stock_items.s_id=stock_trans.s_item_id');
		$this->db->join('employees','employees.e_id=stock_trans.s_owner_id','left');
		$this->db->join('users','users.u_id=stock_trans.s_u_id');
		$this->db->join('vendors','vendors.v_id=stock_trans.s_vendor','left');
        if ($warehouse != "null"){
            $this->db->where('s_wh_id',$warehouse);
        }
        if ($items !="null"){
            $this->db->where('s_item_id',$items);
        }
		if ($trans !="null"){
            $this->db->where('s_status',$trans);
        }
        if ($dateend !="null"){
            $this->db->where('s_date <=',$dateend);
        }
        if ($datefrom !="null"){
            $this->db->where('s_date >=',$datefrom);
        }
		if ($vendors !="null"){
            $this->db->where('s_vendor >=',$vendors);
        }
		
         return $query=$this->db->get();
   
    }
	
	function get_items(){ // get users in activity 
	

        $this->db->select('*');
        $this->db->from('stock_items');
        $this->db->join('warehouse','warehouse.w_id=stock_items.s_warehouse_id');
        $this->db->where('s_display','1');
        $this->db->where('w_display','1');
        $query=$this->db->get();
        return $query->result();
	}
	function get_vendors(){ // get users in activity 
	

        $this->db->select('*');
        $this->db->from('vendors');
	
        $this->db->where('v_display','1');
        $query=$this->db->get();
        return $query->result();
	}
	
	
	
		public function record_count() {
		
		
			$this->db->select("*");
			$this->db->from("stock_trans");
			$this->db->join('stock_items','stock_items.s_id=stock_trans.s_item_id');
		$this->db->join('employees','employees.e_id=stock_trans.s_owner_id','left');
		$this->db->join('users','users.u_id=stock_trans.s_u_id');
		$this->db->join('vendors','vendors.v_id=stock_trans.s_vendor','left');
			$this->db->order_by("stock_trans.st_id", "desc");
			
			return $this->db->get()->num_rows();
    }
	
	
	public function fetch_data($limit, $start) {

		$this->db->limit($limit,$start-1);
		$this->db->join('stock_items','stock_items.s_id=stock_trans.s_item_id');
		$this->db->join('employees','employees.e_id=stock_trans.s_owner_id','left');
		$this->db->join('users','users.u_id=stock_trans.s_u_id');
		$this->db->join('vendors','vendors.v_id=stock_trans.s_vendor','left');
		$this->db->order_by("stock_trans.st_id", "desc");
        $query = $this->db->get("stock_trans");
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }
        return false;
	 }
	 
	    public function search_count($vendors,$warehouse,$datefrom,$dateend,$items,$trans) {

		

        $this->db->select('*');
        $this->db->from('stock_trans');
		$this->db->join('stock_items','stock_items.s_id=stock_trans.s_item_id');
		$this->db->join('employees','employees.e_id=stock_trans.s_owner_id','left');
		$this->db->join('users','users.u_id=stock_trans.s_u_id');
		$this->db->join('vendors','vendors.v_id=stock_trans.s_vendor','left');
		
        if ($warehouse != "null"){
            $this->db->where('s_wh_id',$warehouse);
        }
        if ($items !="null"){
            $this->db->where('s_item_id',$items);
        }
		if ($trans !="null"){
            $this->db->where('s_status',$trans);
        }
        if ($dateend !="null"){
            $this->db->where('s_date <=',$dateend);
        }
        if ($datefrom !="null"){
            $this->db->where('s_date >=',$datefrom);
        }
		if ($vendors !="null"){
            $this->db->where('s_vendor >=',$vendors);
        }
		
        return $this->db->get()->num_rows();
    }
	function get_det($det_id){
		
		$this->db->select('s_details');
		$this->db->from('stock_trans');
		$this->db->where('st_id',$det_id);
		$query=$this->db->get();
		if($query -> num_rows() > 0)
		   {
			 return $query->result_array();
		   }
		
	}
	
	public function search($vendors,$warehouse,$datefrom,$dateend,$items,$trans,$limit,$start)
    {
     
		
        $this->db->select('*');
        $this->db->from('stock_trans');
		$this->db->join('stock_items','stock_items.s_id=stock_trans.s_item_id');
		$this->db->join('employees','employees.e_id=stock_trans.s_owner_id','left');
		$this->db->join('users','users.u_id=stock_trans.s_u_id');
		$this->db->join('vendors','vendors.v_id=stock_trans.s_vendor','left');
        if ($warehouse != "null"){
            $this->db->where('s_wh_id',$warehouse);
        }
        if ($items !="null"){
            $this->db->where('s_item_id',$items);
        }
		if ($trans !="null"){
            $this->db->where('s_status',$trans);
        }
        if ($dateend !="null"){
            $this->db->where('s_date <=',$dateend);
        }
        if ($datefrom !="null"){
            $this->db->where('s_date >=',$datefrom);
        }
		if ($vendors !="null"){
            $this->db->where('s_vendor >=',$vendors);
        }
$this->db->order_by("stock_trans.st_id", "desc");
        $this->db->limit($limit-1,$start-1);
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return $query->result();
        }
    }
	
	
}

?>