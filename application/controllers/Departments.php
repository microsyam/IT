<?php
Class Departments extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('departments_m','m');
		$this->load->model('user');
	}



	function index(){
		$this->load->view('departments_v',array(
			'priv'=>$this->user->get_permisstion(),
			'userdata'=>$this->user->userdata(),
			'locations'=>$this->m->getLocations(),
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
							<th>Department</th>
							<th>Location</th>
							<th>Action</th>
							
						</tr>
		';
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td>'.$row->d_name.'</td>
							<td>'.$row->loc_name.'</td>
							<td>
							<a href="javascript:;" class="btn btn-info item-edit" data="'.$row->d_id.'">Edit</a>
							<a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->d_id.'">Delete</a>
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

	public function addDepartment(){
		$result = $this->m->addDepartment();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editDepartment(){
		$result = $this->m->editDepartment();
		echo json_encode($result);
	}

	public function updateDepartment(){
		$result = $this->m->updateDepartment();
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
