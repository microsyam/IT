<?php
class RegistrationReport_m extends CI_Model{

	function fetch_data($company,$rowperpage, $rowno)
	{
		$this->db->select('*');
		$this->db->from('legal');
		$this->db->join('locations','locations.loc_id=legal.leg_loc_id');
		if($company!="0"){
				$this->db->like('legal.leg_reg_type',$company);

		}
		$this->db->limit($rowperpage, $rowno);
		return $this->db->get()->result_array();
	}

	function count_all($company){ // count for pagination
		$this->db->select('*');
		$this->db->from('legal');
		$this->db->join('locations','locations.loc_id=legal.leg_loc_id');
		if($company!="0"){
				$this->db->like('legal.leg_reg_type',$company);

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



	/*	function countContracts(){
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
		}*/


}

?>
