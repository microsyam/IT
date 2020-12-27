<?php
class periods_m extends CI_Model{

	function fetch_data($query)
	{
		$this->db->select('*');
		$this->db->from('periods');
		$this->db->where("per_display",1);

		if($query != '')
		{
			$this->db->like('per_name', $query);
		}
		$this->db->order_by('per_id', 'DESC');
		return $this->db->get();
	}

		public function addPeriod(){
			$field = array(
				'per_name'=>$this->input->post('txtperiod'),
				'per_year'=>$this->input->post('txtyear'),
				'per_month'=>$this->input->post('txtmonth'),
				'per_week'=>$this->input->post('txtweek'),
			);
			$this->db->insert('periods', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		public function editPeriod(){
			$id = $this->input->get('id');
			$this->db->where('per_id', $id);
			$query = $this->db->get('periods');
			if($query->num_rows() > 0){
				return $query->row();
			}else{
				return false;
			}
		}

		public function updatePeriod(){
			$id = $this->input->post('txtId');
			$field = array(
				'per_name'=>$this->input->post('txtperiod'),
				'per_year'=>$this->input->post('txtyear'),
				'per_month'=>$this->input->post('txtmonth'),
				'per_week'=>$this->input->post('txtweek'),
			);
			$this->db->where('per_id', $id);
			$this->db->update('periods', $field);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}

		function deletePeriod(){
			$id = $this->input->get('id');
			$this->db->where('per_id', $id);
			$this->db->update('periods',array('per_display'=>"0"));
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
		}


}

?>
