<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Computers extends CI_Controller{
	
	function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user'));
		
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	
	
	
	function index(){
		$perm=$this->user->get_permisstion();
	if($perm[0]['p_view_computers']!=1){
	redirect('NotAuth','refresh');
	die();
	}
		$this->load->view('viewcomputers_v',array(
		"userdata"=>$this->user->userdata(),
			'priv'=>$this->user->get_permisstion()
		));
	}

	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('computers_m');
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->computers_m->fetch_data($query);
		$output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>PC Name</th>
							<th>IP</th>
							<th>Employee</th>
							<th>TeamViewer</th>
							
						</tr>
		';
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td>'.$row->p_name.'</td>
							<td>'.$row->p_ip.'</td>
							<td>'.$row->e_name.'</td>
							<td>'.$row->p_teamviewer.'</td>
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
	

}
?>