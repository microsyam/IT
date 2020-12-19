<?php
class Custodies_m extends CI_Model
{
	function fetch_data($query)
	{
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->group_by('e_name');
		$this->db->join('custody','(employees.e_id = custody.c_e_id and custody.c_qty > 0)');
		$this->db->join('departments', 'departments.d_id = employees.e_department_id');
		$this->db->join('stock_items', 'stock_items.s_id = custody.c_item_id');
		
		if($query != '')
		{
			$this->db->or_like('e_name', $query);
			$this->db->or_like('d_name', $query);
			$this->db->or_like('s_name', $query);
			$this->db->or_like('e_code', $query);
		}
		$this->db->order_by('c_id', 'DESC');
		return $this->db->get();
	}
	
	function get_emp($emp_id){
		
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->join('custody','(employees.e_id = custody.c_e_id and custody.c_qty >= 0)');
		$this->db->join('stock_items', 'stock_items.s_id = custody.c_item_id');
		$this->db->join('departments', 'departments.d_id = employees.e_department_id');
		$this->db->where('e_id',$emp_id);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row_empdata) {

                $empinfo[] = $row_empdata;
            }
        }
		
		return $empinfo;
	}
	function emp_data($emp_id){
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->join('departments', 'departments.d_id = employees.e_department_id');
		$this->db->where('e_id',$emp_id);
		$data=$this->db->get();
		return $data->result_array();
		
	}
	 function pdf_custody($emp_id){
        $this->db->select('*');
		$this->db->from('employees');
		$this->db->join('custody','(employees.e_id = custody.c_e_id and custody.c_qty > 0)');
		$this->db->join('departments', 'departments.d_id = employees.e_department_id');
		$this->db->join('stock_items', 'stock_items.s_id = custody.c_item_id');
		$this->db->where('e_id',$emp_id);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
            foreach ($data->result() as $row_empdata) {

                $emp_download[] = $row_empdata;
            }
        }
        return $emp_download;
    }
	function notwork(){
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
		  
		  $cc=$this->db->get();
		  foreach($cc->result_array() as $bb){
		      $setin[]=$bb;
		  }
		  $timezone=$setin[0]['s_timezone'];
			date_default_timezone_set($timezone);
			/////////////////////////////////////////////////////// all above rows to get the user data and time
		$this->db->select('*');
		$this->db->from('custody');
		$this->db->join('stock_items', 'stock_items.s_id = custody.c_item_id');
		$this->db->join('warehouse', 'w_id = stock_items.s_warehouse_id');
		$this->db->where('c_id',$_POST["notwork"]);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row_empdata) {

                $dd[] = $row_empdata;
            }
		}
		$value=$this->input->post("value".$_POST["notwork"]);
		$emp_id=$dd[0]['c_e_id'];
		if($value<=$dd[0]['c_qty']){
		$this->db->set('c_qty',  'c_qty - ' . (float) $value, FALSE);
		$this->db->where('c_id',$_POST["notwork"]);
		$this->db->update('custody');
		$newval=$this->input->post("value".$_POST["notwork"]);
		$this->db->set('s_notwork',  's_notwork + ' .(float)  $newval, FALSE);
		$this->db->where('s_id',$dd[0]['c_item_id']);
		$this->db->update('stock_items');
		
		$datafordatecustody=array(
		'd_c_id'=>$dd[0]['c_id'],
		'd_date'=>date('Y-m-d H:i:s'),
		'd_u_id'=>$usercompanyid[0]['u_id'],
		'd_qty'=>$newval,
		'd_status'=>"notwork",
		);
		$this->db->insert('datecustody',$datafordatecustody);
		$datatotransactions=array(
		's_item_id'=>$dd[0]['c_item_id'],
		's_wh_id'=>$dd[0]['w_id'],
		's_date'=>date('Y-m-d H:i:s'),
		's_u_id'=>$usercompanyid[0]['u_id'],
		's_status'=>"IN",
		'st_qty'=>$newval,
		's_details'=>"Transfered from ".$dd[0]['e_name']." to ".$dd[0]['w_name']." as displosable",
		);
		
		$this->db->insert('stock_trans',$datatotransactions);
		}else{
		
		$this->session->set_flashdata('error',"Please check the QTY");
	}
		//redirect(base_url()."Custodies/View/".$emp_id);
	}
	
	function tostock(){
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
		  
		  $cc=$this->db->get();
		  foreach($cc->result_array() as $bb){
		      $setin[]=$bb;
		  }
		  $timezone=$setin[0]['s_timezone'];
			date_default_timezone_set($timezone);
			//////////////// all upper rows to get the user data and time ////////////////
			
			$this->db->select('*');
		$this->db->from('custody');
		$this->db->join('stock_items', 'stock_items.s_id = custody.c_item_id');
		$this->db->join('warehouse', 'w_id = stock_items.s_warehouse_id');
		$this->db->join('employees', 'e_id = custody.c_e_id');
		$this->db->where('c_id',$_POST["restore"]);
		$data=$this->db->get();
		if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row_empdata) {

                $dd[] = $row_empdata;
            }
		}
		
		$value=$this->input->post("value".$_POST["restore"]);
		$emp_id=$dd[0]['c_e_id'];
		if($value<=$dd[0]['c_qty']){
		$this->db->set('c_qty',  'c_qty - ' . (float) $value, FALSE);
		$this->db->where('c_id',$_POST["restore"]);
		$this->db->update('custody');
		$newval=$this->input->post("value".$_POST["restore"]);
		$this->db->set('s_qty',  's_qty + ' . (float)$newval, FALSE);
		$this->db->where('s_id',$dd[0]['c_item_id']);
		$this->db->update('stock_items');
		
		$datafordatecustody=array(
		'd_c_id'=>$dd[0]['c_id'],
		'd_date'=>date('Y-m-d H:i:s'),
		'd_u_id'=>$usercompanyid[0]['u_id'],
		'd_qty'=>$newval,
		'd_status'=>"restore",
		);
		$this->db->insert('datecustody',$datafordatecustody);
		$datatotransactions=array(
		's_item_id'=>$dd[0]['c_item_id'],
		's_wh_id'=>$dd[0]['w_id'],
		's_date'=>date('Y-m-d H:i:s'),
		's_u_id'=>$usercompanyid[0]['u_id'],
		's_status'=>"IN",
		'st_qty'=>$newval,
		's_details'=>"Transfered from ".$dd[0]['e_name']." to ".$dd[0]['w_name']." as restore",
		);
		
		$this->db->insert('stock_trans',$datatotransactions);
		}else{
		
		$this->session->set_flashdata('error',"PLease check the QTY");
		}
		//redirect(base_url()."Custodies/View/".$emp_id);
	}
}
?>