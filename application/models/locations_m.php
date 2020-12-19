<?php
class locations_m extends CI_Model{

	function fetch_data($query)
	{
		$this->db->select('*');
		$this->db->from('locations');
		$this->db->where("loc_display",1);

		if($query != '')
		{
			$this->db->like('loc_name', $query);
		}
		$this->db->order_by('loc_id', 'DESC');
		return $this->db->get();
	}

		public function addLocation(){
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

			$field = array(
				'loc_name'=>$this->input->post('txtLocationName'),
				'loc_code'=>$this->input->post('txtLocationCode'),
				'loc_brand'=>$this->input->post('brand'),
				'loc_region'=>$this->input->post('region'),
				'loc_district'=>$this->input->post('district'),
				'loc_type'=>$this->input->post('type'),
				'loc_opening_date'=>$this->input->post('openingdate'),
				'loc_u_id'=>$usercompanyid[0]['u_id'],
				'loc_number'=>$this->input->post('phone'),
			);
			$this->db->insert('locations', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		public function editLocation(){
			$id = $this->input->get('id');
			$this->db->where('loc_id', $id);
			$query = $this->db->get('locations');
			if($query->num_rows() > 0){
				return $query->row();
			}else{
				return false;
			}
		}

		public function updateLocation(){
			$id = $this->input->post('txtId');
			$field = array(
				'loc_name'=>$this->input->post('txtLocationName'),
				'loc_code'=>$this->input->post('txtLocationCode'),
				'loc_brand'=>$this->input->post('brand'),
				'loc_region'=>$this->input->post('region'),
				'loc_district'=>$this->input->post('district'),
				'loc_type'=>$this->input->post('type'),
				'loc_opening_date'=>$this->input->post('openingdate'),
				'loc_number'=>$this->input->post('phone'),
			);
			$this->db->where('loc_id', $id);
			$this->db->update('locations', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		function deleteLocation(){
			$id = $this->input->get('id');
			$this->db->where('loc_id', $id);
			$this->db->update('locations',array('loc_display'=>"0"));
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}


}

?>
