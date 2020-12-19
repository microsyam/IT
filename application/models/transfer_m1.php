<?php
class transfer_m extends CI_Model{
	
	function get_warehouse(){ //first page
		
		$this->db->select("*");
		$this->db->from("warehouse");
		if($_POST){
		$this->db->where('w_id',$this->input->post("warehouse"));
		}
		$this->db->where('w_display','1');
		$this->db->order_by("w_id", "desc");
		$data=$this->db->get();
		return  $result=$data->result();
	}
	function get_computers(){
		$this->db->select("*");
		$this->db->from("computers");
		
		$this->db->order_by("p_id", "desc");
		$data=$this->db->get();
		return  $result=$data->result();
	}
	
	function get_items(){
		$this->db->select("*");
		$this->db->from("stock_items");
		if($_POST){
		$this->db->where('s_warehouse_id',$this->input->post('warehouse'));
		}
		$this->db->where('s_display','1');
		$this->db->order_by("s_id", "desc");
		$data=$this->db->get();
		return  $result=$data->result();
	}
	function get_vendors(){
		$this->db->select("*");
		$this->db->from("vendors");
		
		$this->db->where('v_display','1');
		$this->db->order_by("v_id", "desc");
		$data=$this->db->get();
		return  $result=$data->result();
	}
	function in(){
		$session_data = $this->session->userdata('logged_in');
         $name = $session_data['username'];
		 $this->db->select('*');
		 $this->db->from('users');
		 $this->db->where('u_username', $name);
		 $user_data = $query = $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $usercompanyid[] = $row_userdata;
                }
            }
			
		$this->db->select('*')->from('settings')->where('s_id','1');
		  
		  $dd=$this->db->get();
		  foreach($dd->result_array() as $bb){
		      $setin[]=$bb;
		  }
		  
			$timezone=$setin[0]['s_timezone'];
			date_default_timezone_set($timezone);
		$this->db->select('*');
		 $this->db->from('stock_items');
		 $this->db->where('s_id',$this->input->post("item"));
		$this->db->where('s_warehouse_id',$this->input->post("warehouse"));
		 $query = $this->db->get();
		 if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $qtyvalu[] = $row_userdata;
                }
            }
			$this->db->select('*');
			$this->db->from('warehouse');
			$this->db->where('w_id',$this->input->post("warehouse"));
			$this->db->where('w_display','1');
			 $w = $this->db->get();
			 if ($w->num_rows() > 0) {
                foreach ($w->result_array() as $ss) {

                    $wr[] = $ss;
                }
            }
			
			$this->db->select('*');
			$this->db->from('vendors');
			$this->db->where('v_id',$this->input->post("vendor"));
			 $v = $this->db->get();
			 if ($v->num_rows() > 0) {
                foreach ($v->result_array() as $vv) {

                    $vn[] = $vv;
                }
            }
			
		$value=$this->input->post('qtyin');
		 $this->db->set('s_qty',  's_qty + ' . (float) $value, FALSE);
		$this->db->where('s_id',$this->input->post("item"));
		$this->db->where('s_warehouse_id',$this->input->post("warehouse"));
		$this->db->update('stock_items');
		
		$data=array(
		's_item_id'=>$qtyvalu[0]['s_id'],
		's_item_name'=>$qtyvalu[0]['s_name'],
		's_wh_id'=>$this->input->post('warehouse'),
		's_date'=>date('Y-m-d H:i:s'),
		's_u_id'=>$usercompanyid[0]['u_id'],
		's_u_name'=>$usercompanyid[0]['u_name'],
		's_qty'=>$this->input->post('qtyin'),
		's_owner'=>$wr[0]['w_name'],
		's_status'=>"IN",
		's_vendor'=>$vn[0]['v_id'],
		's_vendor_name'=>$vn[0]['v_name']
		
		);
		
		$this->db->insert('stock_trans',$data);
	}
	
	function out(){
		$session_data = $this->session->userdata('logged_in');
         $name = $session_data['username'];
		 $this->db->select('*');
		 $this->db->from('users');
		 $this->db->where('u_username', $name);
		 $user_data = $query = $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $usercompanyid[] = $row_userdata;
                }
            }
			
		$this->db->select('*')->from('settings')->where('s_id','1');
		  
		  $dd=$this->db->get();
		  foreach($dd->result_array() as $bb){
		      $setin[]=$bb;
		  }
		  
			$timezone=$setin[0]['s_timezone'];
			date_default_timezone_set($timezone);
			
		$value=$this->input->post('qtyout');
		$this->db->select('*');
		 $this->db->from('stock_items');
		 $this->db->where('s_id',$this->input->post("item"));
		$this->db->where('s_warehouse_id',$this->input->post("warehouse"));
		 $query = $this->db->get();
		 if ($query->num_rows() > 0) {
                foreach ($query->result_array() as $d) {

                    $qtyvalu[] = $d;
                }
            }
			
			$this->db->select('*');
		 $this->db->from('computers');
		 $this->db->where('p_id',$this->input->post("computers"));
		 $q = $this->db->get();
		 if ($q->num_rows() > 0) {
                foreach ($q->result_array() as $pc) {

                    $comp[] = $pc;
                }
            }
			if($value<=$qtyvalu[0]['s_qty']){
		
			$this->db->set('s_qty',  's_qty - ' . (float) $value, FALSE);
			$this->db->where('s_id',$this->input->post("item"));
			$this->db->where('s_warehouse_id',$this->input->post("warehouse"));
			$this->db->update('stock_items');
			
			$data=array(
		's_item_id'=>$qtyvalu[0]['s_id'],
		's_item_name'=>$qtyvalu[0]['s_name'],
		's_computer_id'=>$this->input->post('computers'),
		's_owner'=> $comp[0]['p_owner'],
		's_wh_id'=>$this->input->post('warehouse'),
		's_date'=>date('Y-m-d H:i:s'),
		's_u_id'=>$usercompanyid[0]['u_id'],
		's_u_name'=>$usercompanyid[0]['u_name'],
		's_qty'=>$this->input->post('qtyout'),
		's_details'=>$this->input->post('details'),
		's_status'=>"OUT",
		
		);
		
		$this->db->insert('stock_trans',$data);
			
			$this->session->set_flashdata('done','Your transaction is complete');
			}
			else{
				$this->session->set_flashdata('error',"you don't have enough stock , Please try again");
			}
	}
}
?>