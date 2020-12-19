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
			
		$value=$this->input->post('qtyin');
		 $this->db->set('s_qty',  's_qty + ' . (float) $value, FALSE);
		$this->db->where('s_id',$this->input->post("item"));
		$this->db->where('s_warehouse_id',$this->input->post("warehouse"));
		$this->db->update('stock_items');
		
		$data=array(
		's_item_id'=>$this->input->post('item'),
		's_wh_id'=>$this->input->post('warehouse'),
		's_date'=>date('Y-m-d H:i:s'),
		's_u_id'=>$usercompanyid[0]['u_id'],
		'st_qty'=>$this->input->post('qtyin'),
		's_status'=>"IN",
		's_vendor'=>$this->input->post("vendor"),
		's_details'=>$this->input->post('detailsin')
		
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
		 $this->db->from('employees');
		 $this->db->where('e_id',$this->input->post("computers"));
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
		's_item_id'=>$this->input->post('item'),
		's_owner_id'=>$this->input->post('computers'),
		's_wh_id'=>$this->input->post('warehouse'),
		's_date'=>date('Y-m-d H:i:s'),
		's_u_id'=>$usercompanyid[0]['u_id'],
		'st_qty'=>$this->input->post('qtyout'),
		's_details'=>$this->input->post('details'),
		's_status'=>"OUT",
		
		);
		
		$this->db->insert('stock_trans',$data);
		
		if($qtyvalu[0]['s_asset']==1){
		//28-01-2020
		$this->db->select('*');
		$this->db->from('custody');
		$this->db->where('c_item_id',$qtyvalu[0]['s_id']);
		$this->db->where('c_e_id',$comp[0]['e_id']);
		$res=$this->db->get();
		$custodycount=$res->num_rows();
		if ($custodycount>=1){
			foreach ($res->result_array() as $re) {

                    $cus[] = $re;
                }
					
			$updatecustody=array(
			'c_qty'=>$cus[0]['c_qty']+$this->input->post('qtyout'),
		);
		
		$this->db->where('c_id',$cus[0]['c_id']);
		$this->db->update('custody',$updatecustody);
				
				
				
			$datecustody=array(
			'd_u_id'=>$usercompanyid[0]['u_id'],
			'd_qty'=>$this->input->post('qtyout'),
			'd_c_id'=>$cus[0]['c_id'],
			'd_status'=>"adding",
			'd_date'=>date('Y-m-d H:i:s')
			);
			
			$this->db->insert("datecustody",$datecustody);
		}else{
		
		$custody=array(
		'c_item_id'=>$qtyvalu[0]['s_id'],
		'c_qty'=>$this->input->post('qtyout'),
		'c_e_id'=>$comp[0]['e_id'],
		
		
		);
		$this->db->insert('custody',$custody);
		$insert_id = $this->db->insert_id();
		$datecustody=array(
			'd_u_id'=>$usercompanyid[0]['u_id'],
			'd_qty'=>$this->input->post('qtyout'),
			'd_c_id'=>$insert_id,
			'd_status'=>"adding",
			'd_date'=>date('Y-m-d H:i:s')
			);
			
			$this->db->insert("datecustody",$datecustody);
		}
		}	
			$this->session->set_flashdata('done','Your transaction is complete');
			}
			else{
				$this->session->set_flashdata('error',"you don't have enough stock , Please try again");
			}
	}
}
?>