<?php
class contract_m extends CI_Model{

	function fetch_data($query)
	{
		$this->db->select('*');
		$this->db->from('legal');
		$this->db->join('locations','locations.loc_id=legal.leg_loc_id');
		$this->db->join('users','users.u_id=legal.leg_follower');

		if($query != '')
		{
			$this->db->like('loc_name', $query);
		}
		$this->db->order_by('leg_id', 'DESC');
		return $this->db->get();
	}
	function getLocations(){
		$this->db->select('*');
		$this->db->from('locations');
		$this->db->where('loc_display',1);
		$data=$this->db->get();
		return $data->result();
	}
	function getUsers(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('u_active',1);
		$data=$this->db->get();
		return $data->result();
	}

		public function addContract(){
			$field = array(
				'leg_loc_id'=>$this->input->post('txtlocation'),
				'leg_reg_type'=>$this->input->post('txtregist'),
				'leg_modif_contract'=>$this->input->post('txtmodification'),
				'leg_taxs'=>$this->input->post('txttax'),
				'leg_comm_reg'=>$this->input->post('comreg'),
				'leg_vat'=>$this->input->post('vat'),
				'leg_vat_no'=>$this->input->post('vatno'),
				'leg_follower'=>$this->input->post('follower'),
				'leg_license_status'=>$this->input->post('licencestatus'),
				'leg_start_rent_date'=>$this->input->post('rental_start_date'),
				'leg_end_rant_date'=>$this->input->post('rental_end_date'),
				'leg_rent_price'=>$this->input->post('rent_cost'),
				'leg_elect_status'=>$this->input->post('elect'),
				'leg_reales_taxs'=>$this->input->post('realestatetax'),
				'leg_contract_copy'=>$this->input->post('copy'),
				'leg_branch_no'=>$this->input->post('branch_number'),
				'leg_owner_name'=>$this->input->post('owner_name'),
				'leg_owner_number'=>$this->input->post('owner_number'),
				'leg_observation'=>$this->input->post('note'),
			);
			$this->db->insert('legal', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		public function editContract(){
			$id = $this->input->get('id');
			$this->db->where('leg_id', $id);
			$query = $this->db->get('legal');
			if($query->num_rows() > 0){
				return $query->row();
			}else{
				return false;
			}
		}

		public function updateContract(){
			$id = $this->input->post('txtId');
			$field = array(
				'leg_loc_id'=>$this->input->post('txtlocation'),
				'leg_reg_type'=>$this->input->post('txtregist'),
				'leg_modif_contract'=>$this->input->post('txtmodification'),
				'leg_taxs'=>$this->input->post('txttax'),
				'leg_comm_reg'=>$this->input->post('comreg'),
				'leg_vat'=>$this->input->post('vat'),
				'leg_vat_no'=>$this->input->post('vatno'),
				'leg_follower'=>$this->input->post('follower'),
				'leg_license_status'=>$this->input->post('licencestatus'),
				'leg_start_rent_date'=>$this->input->post('rental_start_date'),
				'leg_end_rant_date'=>$this->input->post('rental_end_date'),
				'leg_rent_price'=>$this->input->post('rent_cost'),
				'leg_elect_status'=>$this->input->post('elect'),
				'leg_reales_taxs'=>$this->input->post('realestatetax'),
				'leg_contract_copy'=>$this->input->post('copy'),
				'leg_branch_no'=>$this->input->post('branch_number'),
				'leg_owner_name'=>$this->input->post('owner_name'),
				'leg_owner_number'=>$this->input->post('owner_number'),
				'leg_observation'=>$this->input->post('note'),
			);
			$this->db->where('leg_id', $id);
			$this->db->update('legal', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		function deleteContract(){
			$id = $this->input->get('id');
			$this->db->where('leg_id', $id);
			$this->db->delete('legal');
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}


}

?>
