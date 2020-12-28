<?php
class accounts_m extends CI_Model{

	function fetch_data($query)
	{
		$this->db->select('*');
		$this->db->from('accounts');
		$this->db->join('departments','departments.d_id=accounts.a_department_id');
		$this->db->join('locations','locations.loc_id=departments.d_loc_id');

		$this->db->where("a_display",1);

		if($query != '')
		{
			$this->db->like('a_name', $query);
		}
		$this->db->order_by('a_name', 'ASC');
		return $this->db->get();
	}
	function getDepartments(){ // for drop menu dialog
		$this->db->select('*');
		$this->db->from('departments');
		$this->db->join('locations','locations.loc_id=departments.d_loc_id');
		$this->db->where("d_display",1);
		$this->db->order_by('loc_name','ASC');
		$data=$this->db->get();
		return $data->result();
	}

		public function addAccount(){
			$field = array(
				'a_name'=>$this->input->post('accountName'),
				'a_department_id'=>$this->input->post('txtdepartment'),
				'a_code'=>$this->input->post('accountCode'),
			);
			$this->db->insert('accounts', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		public function editAccount(){
			$id = $this->input->get('id');
			$this->db->where('a_id', $id);
			$query = $this->db->get('accounts');
			if($query->num_rows() > 0){
				return $query->row();
			}else{
				return false;
			}
		}

		public function updateAccount(){
			$id = $this->input->post('txtId');
			$field = array(
				'a_name'=>$this->input->post('accountName'),
				'a_department_id'=>$this->input->post('txtdepartment'),
				'a_code'=>$this->input->post('accountCode'),
			);
			$this->db->where('a_id', $id);
			$this->db->update('accounts', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		function deleteAccount(){
			$id = $this->input->get('id');
			$this->db->where('a_id', $id);
			$this->db->update('accounts',array('a_display'=>"0"));
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}


}

?>
