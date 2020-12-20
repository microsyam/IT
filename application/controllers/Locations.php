<?php
Class Locations extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('locations_m','m');
		$this->load->model('user');
	}



	function index(){
		$perm=$this->user->get_permisstion();
		if($perm[0]['p_location']!=1){
			redirect('NotAuth','refresh');
			die();
		}
		$this->load->view('locations_v',array(
			'priv'=>$this->user->get_permisstion(),
			'userdata'=>$this->user->userdata(),
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
							<th>Name</th>
							<th>Opening Data</th>
							<th>District</th>
							<th>Number</th>
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
							<td>'.$row->loc_opening_date.'</td>
							<td>'.$row->loc_district.'</td>
							<td>'.$row->loc_number.'</td>
							<td>
							<a href="javascript:;" class="btn btn-info item-edit" data="'.$row->loc_id.'">Edit</a>
							<a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->loc_id.'">Delete</a>
</td>
						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="5">No Data Found</td>
						</tr>';
		}
		$output .= '</table>';
		echo $output;
	}

	public function addLocation(){
		$result = $this->m->addLocation();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editLocation(){
		$result = $this->m->editLocation();
		echo json_encode($result);
	}

	public function updateLocation(){
		$result = $this->m->updateLocation();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteLocation(){
		$result = $this->m->deleteLocation();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}
