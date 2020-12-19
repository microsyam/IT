<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Operations extends CI_Controller{
	
	function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','employees_m','Operations_m'));
		
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	
	
	
	function index(){
		$perm=$this->user->get_permisstion();
	if($perm[0]['p_operation']!=1){
	redirect('NotAuth','refresh');
	die();
	}
		$this->load->view('operations_v',array(
		"employees"=>$this->employees_m->get_emp(),
		"class"=>$this->Operations_m->get_classes(),
		"userdata"=>$this->user->userdata(),
			'priv'=>$this->user->get_permisstion()
		));
	}

	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('Operations_m');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->Operations_m->fetch_data($query);
		$output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>Employee</th>
							<th>Classification</th>
							<th>Subject</th>
							<th>Status</th>
							<th>Submitted By</th>
							<th>Date</th>
							<th>Details</th>
							
						</tr>
		';
		if( $data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td>'.$row->e_name.'</td>
							<td>'.$row->o_name.'</td>
							<td>'.$row->o_subject.'</td>
							<td>'.$row->o_status.'</td>
							<td>'.$row->u_name.'</td>
							<td>'.$row->o_date.'</td>
							<td><a href="'.base_url().'Operations/Details/'.$row->op_id.'">Details</a></td>
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
	function Save(){
		
		$this->Operations_m->post();
		redirect('Operations','refresh');
	}
	
	function Details(){
		$opdetails=$this->uri->segment(3);
		$this->load->view('operationdetails_v',array(
		"opdet"=>$this->Operations_m->get_op($opdetails),
		"comments"=>$this->Operations_m->get_comments($opdetails),
		"userdata"=>$this->user->userdata(),
			'priv'=>$this->user->get_permisstion(),
		));
	if(!empty($_POST)){
		$this->Operations_m->reply($opdetails);
		redirect('Operations/Details/'.$opdetails,'refresh');
	}
	
	}
	

	

}
?>