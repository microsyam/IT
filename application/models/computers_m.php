<?php
class computers_m extends CI_Model
{
	function fetch_data($query)
	{
		$this->db->select('*');
		$this->db->from('computers');
		$this->db->join('employees', 'employees.e_id = computers.p_owner_id');
		if($query != '')
		{
			$this->db->or_like('employees.e_name', $query);
			$this->db->or_like('p_name', $query);
			$this->db->or_like('p_ip', $query);
			$this->db->or_like('p_teamviewer', $query);
		}
		$this->db->order_by('p_id', 'DESC');
		return $this->db->get();
	}
}
?>