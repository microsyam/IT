<?php
Class Contract extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('contract_m','m');
			$this->load->model('user');
		}
		else{
			redirect('Login','refresh');
		}

	}



	function index(){
		$perm=$this->user->get_permisstion();
		if($perm[0]['p_departments']!=1){
			redirect('NotAuth','refresh');
			die();
		}

		$this->load->view('contract_v',array(
			'priv'=>$this->user->get_permisstion(),
			'userdata'=>$this->user->userdata(),
			'locations'=>$this->m->getLocations(),
			'get_users'=>$this->m->getUsers(),
		));

}

	function fetch()
	{
		$output = '';
		$query = '';
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->m->fetch_data($query);
		$output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>Location</th>
							<th>Registration</th>
							<th>Modification</th>
							<th>TAX</th>
							<th>Commercial Registry</th>
							<th>VAT</th>
							<th>VAT NO</th>
							<th>Follower</th>
							<th>License Status</th>
							<th>Start.R.Date</th>
							<th>End.R.Date</th>
							<th>Rental Cost</th>
							<th>ELECT Status</th>
							<th>R.E TAX</th>
							<th>Contract Copy</th>
							<th>Branch Number</th>
							<th>Owner Name</th>
							<th>Owner Number</th>
							<th>Action</th>
							
						</tr>
		';
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td>'.$row->loc_name.'</td>
							<td>'.$row->leg_reg_type.'</td>
							<td>'.$row->leg_modif_contract.'</td>
							<td>'.$row->leg_taxs.'</td>
							<td>'.$row->leg_comm_reg.'</td>
							<td>'.$row->leg_vat.'</td>
							<td>'.$row->leg_vat_no.'</td>
							<td>'.$row->u_name.'</td>
							<td>'.$row->leg_license_status.'</td>
							<td>'.$row->leg_start_rent_date.'</td>
							<td>'.$row->leg_end_rant_date.'</td>
							<td>'.$row->leg_rent_price.'</td>
							<td>'.$row->leg_elect_status.'</td>
							<td>'.$row->leg_reales_taxs.'</td>
							<td>'.$row->leg_contract_copy.'</td>
							<td>'.$row->leg_branch_no.'</td>
							<td>'.$row->leg_owner_name.'</td>
							<td>'.$row->leg_owner_number.'</td>
							<td>
							<a href="javascript:;" class="btn btn-info item-edit" data="'.$row->leg_id.'">Edit</a>
							<a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->leg_id.'">Delete</a>
</td>
						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="3">No Data Found</td>
						</tr>';
		}
		$output .= '</table>';
		echo $output;
	}

	public function addContract(){
		$result = $this->m->addContract();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editContract(){
		$result = $this->m->editContract();
		echo json_encode($result);
	}

	public function updateContract(){
		$result = $this->m->updateContract();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteContract(){
		$result = $this->m->deleteContract();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}
