<?php
class Privileges_m extends CI_Model{
	
	function get_privileges(){
		
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
			
		$this->db->select('*');
		$this->db->from('privileges');
		$this->db->where('p_u_id',$this->input->post('select_user'));
		$query=$this->db->get();
		if($query -> num_rows() > 0)
		   {
			 return $query->result_array();
		   }
   
	}
	function update(){
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
			
			$data=array(
			'p_new_task'=>$this->input->post('newtask'),
			'p_new_service'=>$this->input->post('newservice'),
			'p_activity_report'=>$this->input->post('actvityreport'),
			'p_privilages'=>$this->input->post('Privileges'),
			'p_easy_share'=>$this->input->post('easyshare'),
			'p_cust_activity_report'=>$this->input->post('custtask'),
			'p_view_computers'=>$this->input->post('viewcomputers'),
			'p_open_ticket'=>$this->input->post('openticket'),
			'p_view_tickets'=>$this->input->post('viewtickets'),
			'p_view_cust_tickets'=>$this->input->post('cust_tickets'),
			'p_ticket_cases'=>$this->input->post('tickectcases'),
			'p_edit_computer'=>$this->input->post('editcomputer'),
			'p_add_computer'=>$this->input->post('newcomputer'),
			'p_edit_user'=>$this->input->post('edituser'),
			'p_add_user'=>$this->input->post('createuser'),
			'p_departments'=>$this->input->post('depart'),
			'p_general'=>$this->input->post('settings'),
			'p_assign_task'=>$this->input->post('asstask'),
			'p_cust_task'=>$this->input->post('seealltasks'),
			'p_warehouses'=>$this->input->post('warehouses'),
			'p_manage_items'=>$this->input->post('item'),
			'p_make_transaction'=>$this->input->post('stocktrans'),
			'p_report'=>$this->input->post('stockreport'),
			'p_stock_board'=>$this->input->post('stockboard'),
			'p_vendors'=>$this->input->post('vendors'),
			'p_new_emp '=>$this->input->post('addemp'),
			'p_edit_emp'=>$this->input->post('editemp'),
			'p_custodies '=>$this->input->post('custodies'),
			'p_operation '=>$this->input->post('Operations'),
			'p_op_class '=>$this->input->post('OpClass'),
			'p_gift_redeem '=>$this->input->post('giftcards'),
			);

		$this->db->where('p_u_id',$this->input->post('select_user'));
		$this->db->update('privileges',$data);
	}
	
	function selectuser(){
		$session_data = $this->session->userdata('logged_in');
         $name = $session_data['username'];
		 $this->db->select('*');
		 $this->db->from('users');
		 $this->db->where('u_username', $name);
		 $user_data = $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($user_data->result_array() as $row_userdata) {

                    $usercompanyid[] = $row_userdata;
                }
            }
		 $this->db->select('*');
		 $this->db->from('users');

		 $this->db->where('u_id',$this->input->post('select_user'));
		 $data=$this->db->get();
		 return $data->result();
	}
}
?>