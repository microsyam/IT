<?php
class contract_m extends CI_Model{

	function fetch_data($query,$filter)
	{
		$this->db->select('*');
		$this->db->from('legal');
		$this->db->join('locations','locations.loc_id=legal.leg_loc_id');
		$this->db->join('users','users.u_id=legal.leg_follower');

		if($query != '')
		{
			if($filter=='brancha'){
			$this->db->like('loc_name', $query);
			}elseif ($filter=='owner'){
				$this->db->like('leg_owner_name', $query);
			}
		}
		$this->db->order_by('leg_id', 'DESC');
		return $this->db->get()->result_array();
	}

	function count_all($query,$filter){ // count for pagination
		$this->db->select('*');
		$this->db->from('legal');
		$this->db->join('locations','locations.loc_id=legal.leg_loc_id');
		$this->db->join('users','users.u_id=legal.leg_follower');

		if($query != '')
		{
			if($filter=='brancha'){
				$this->db->like('loc_name', $query);
			}elseif ($filter=='owner'){
				$this->db->like('leg_owner_name', $query);
			}
		}
		 return $this->db->get()->num_rows();
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

		function countContracts(){
			$this->db->select("
    COUNT(*) AS Alla,
    COUNT(CASE WHEN `leg_reg_type` LIKE '%Agent%' THEN 1 END) AS Agents,
    COUNT(CASE WHEN `leg_reg_type` LIKE '%Company%' THEN 1 END) AS Companies,
    COUNT(CASE WHEN `leg_reg_type` LIKE '%Shared%' THEN 1 END) AS Shared,
    COUNT(CASE WHEN `leg_taxs` LIKE '%Added%' THEN 1 END) AS Added_tax,
    COUNT(CASE WHEN `leg_taxs` LIKE '%Not%' THEN 1 END) AS Not_tax,
    COUNT(CASE WHEN `leg_vat` LIKE '%Yes%' THEN 1 END) AS Yes_Vat,
    COUNT(CASE WHEN `leg_vat` LIKE '%No%' THEN 1 END) AS No_Vat,
    COUNT(CASE WHEN `leg_license_status` LIKE '%Required%' THEN 1 END) AS lic_required,
    COUNT(CASE WHEN `leg_license_status` LIKE '%InProgress%' THEN 1 END) AS lic_inprogress,
    COUNT(CASE WHEN `leg_license_status` LIKE '%Completed%' THEN 1 END) AS lic_comp,
    COUNT(CASE WHEN `leg_contract_copy` LIKE '%OnHold%' THEN 1 END) AS contract_onhold,
    COUNT(CASE WHEN `leg_contract_copy` LIKE '%Done%' THEN 1 END) AS contract_done,
    COUNT(CASE WHEN `leg_elect_status` LIKE '%Practice%' THEN 1 END) AS elect_prac,
    COUNT(CASE WHEN `leg_elect_status` LIKE '%Complete%' THEN 1 END) AS elect_done
			");
			$this->db->from("legal");

		$data=$this->db->get();
		return $data->result_array();
		}


}

?>
