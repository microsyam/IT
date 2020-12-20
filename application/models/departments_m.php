<?php
class departments_m extends CI_Model{

	function fetch_data($query)
	{
		$this->db->select('*');
		$this->db->from('departments');
		$this->db->join('locations','locations.loc_id=departments.d_loc_id');
		$this->db->where("d_display",1);

		if($query != '')
		{
			$this->db->like('d_name', $query);
		}
		$this->db->order_by('d_id', 'DESC');
		return $this->db->get();
	}
	function getLocations(){
		$this->db->select('*');
		$this->db->from('locations');
		$data=$this->db->get();
		return $data->result();
	}

		public function addDepartment(){
			$field = array(
				'd_name'=>$this->input->post('departmentName'),
				'd_loc_id'=>$this->input->post('txtlocation'),
			);
			$this->db->insert('departments', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		public function editDepartment(){
			$id = $this->input->get('id');
			$this->db->where('d_id', $id);
			$query = $this->db->get('departments');
			if($query->num_rows() > 0){
				return $query->row();
			}else{
				return false;
			}
		}

		public function updateDepartment(){
			$id = $this->input->post('txtId');
			$field = array(
				'd_name'=>$this->input->post('departmentName'),
				'd_loc_id'=>$this->input->post('txtlocation'),
			);
			$this->db->where('d_id', $id);
			$this->db->update('departments', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		function deleteDepartment(){
			$id = $this->input->get('id');
			$this->db->where('d_id', $id);
			$this->db->update('departments',array('d_display'=>"0"));
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}


}

?>
