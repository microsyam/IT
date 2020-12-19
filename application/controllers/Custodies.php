<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Custodies extends CI_Controller{
	
	function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','Custodies_m'));
		$this->load->library('pdf_report','form_validation');
		
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	
	
	
	function index(){
		$perm=$this->user->get_permisstion();
	if($perm[0]['p_custodies']!=1){
	redirect('NotAuth','refresh');
	die();
	}
		$this->load->view('custodies_v',array(
		"userdata"=>$this->user->userdata(),
			'priv'=>$this->user->get_permisstion()
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
		$data = $this->Custodies_m->fetch_data($query);
		$output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>Code</th>
							<th>Department</th>
							<th>Name</th>
							<th>Details</th>
							
						</tr>
		';
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td>'.$row->e_code.'</td>
							<td>'.$row->d_name.'</td>
							<td>'.$row->e_name.'</td>
							<td><a href="'.base_url().'Custodies/View/'.$row->e_id.'">Details</a> <a href="'.base_url().'Custodies/download/'.$row->e_id.'">Download</a> </td>
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
	
	function view(){
	$perm=$this->user->get_permisstion();
	if($perm[0]['p_custodies']!=1){
	redirect('NotAuth','refresh');
	die();
	}
	$emp_id=$this->uri->segment(3);
	$this->load->view('viewcustody_v',array(
		"empdata"=>$this->Custodies_m->get_emp($emp_id),
		"userdata"=>$this->user->userdata(),
			'priv'=>$this->user->get_permisstion(),
			'emp_data'=>$this->user->get_permisstion(),
		));
		
	}
	
	function download(){
	$emp_id=$this->uri->segment(3);
    $userdata=$this->user->userdata();
	$data=$this->Custodies_m->pdf_custody($emp_id);
	$emp_data=$this->Custodies_m->emp_data($emp_id);
    $this->load->view('pdfcustody_v',array('data'=>$data,'emp'=>$emp_data,'user'=>$userdata));
	}
	
	function update(){
		echo $emp_id=$this->uri->segment(3);
		if(isset($_POST['restore'])){
		
				$this->Custodies_m->tostock();
			//redirect('refresh','Custodies');
		}elseif(isset($_POST['notwork'])){
			$this->Custodies_m->notwork();
		//	redirect('refresh','Custodies');
			
		}
		
	}
	

}
?>