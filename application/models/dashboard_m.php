<?php
class dashboard_m extends CI_Model{
	
	
	function get_warehouses(){
		$this->db->select('w_id as warehouseid');
		$this->db->select('w_name as warehousename');
		
        $this->db->from('warehouse');
		$this->db->join('stock_items','stock_items.s_warehouse_id=warehouse.w_id');
		$this->db->group_by('w_id');
		$this->db->group_by('w_name');
		$this->db->where('w_display', '1'); 
		$this->db->where('stock_items.s_qty <','5');
		$this->db->where('stock_items.s_asset','0');
		
		 $this->db->order_by('warehouseid', 'desc'); 
         $query = $this->db->get();

        return $query->result();
	}
	
	function get_stock(){
        $this->db->select('*');
        $this->db->from('stock_items');
        $this->db->where('s_display','1');
		$this->db->where('stock_items.s_display','1');
        $this->db->where('s_qty <','5');
         $query = $this->db->get();		
		return $query->result();
	}
	
	function less_five(){
		$this->db->select('*');
		$this->db->from('warehouse');
		$this->db->where('w_display','1');
		$this->db->join('stock_items','stock_items.s_warehouse_id=warehouse.w_id');
		$this->db->where('stock_items.s_qty <','5');
		$this->db->where('stock_items.s_display','1');
		$this->db->where('stock_items.s_asset','0');
		$query = $this->db->get();		
		return $query->result();
	}
}

?>
