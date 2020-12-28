<?php
Class Accounts extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('accounts_m','m');
			$this->load->model('user');
		}
		else{
			redirect('Login','refresh');
		}

	}



	function index(){
		$perm=$this->user->get_permisstion();
		if($perm[0]['p_accounts']!=1){
			redirect('NotAuth','refresh');
			die();
		}

		$this->load->view('accounts_v',array(
			'priv'=>$this->user->get_permisstion(),
			'userdata'=>$this->user->userdata(),
			'departments'=>$this->m->getDepartments(),
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
							<th>Code</th>
							<th>Account</th>
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
							<td>'.$row->a_code.'</td>
							<td>'.$row->a_name.'</td>
							<td>'.$row->d_name.'</td>
							<td>'.$row->loc_name.'</td>
							<td>
							<a href="javascript:;" class="btn btn-info item-edit" data="'.$row->a_id.'">Edit</a>
							<a href="javascript:;" class="btn btn-danger item-delete" data="'.$row->a_id.'">Delete</a>
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

	public function addAccount(){
		$result = $this->m->addAccount();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editAccount(){
		$result = $this->m->editAccount();
		echo json_encode($result);
	}

	public function updateAccount(){
		$result = $this->m->updateAccount();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteAccount(){
		$result = $this->m->deleteAccount();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}
