<?php
class AddComputer extends CI_Controller{
	
	
	   function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','AddComputer_m','employees_m'));
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	function index(){
			$perm=$this->user->get_permisstion();
	if($perm[0]['p_add_computer']!=1){
	redirect('NotAuth','refresh');
	die();
	}
	
		$data=array(
		'deparments'=>$this->AddComputer_m->index(),
		'employees'=>$this->employees_m->get_emp(),
		'userdata' => $this->user->userdata(),
			'priv'=>$this->user->get_permisstion(),
		);
		$this->load->view('addcomputer_v',$data);
	}
function save(){
		$perm=$this->user->get_permisstion();
	if($perm[0]['p_add_computer']!=1){
	redirect('NotAuth','refresh');
	die();
	}
	
	$this->AddComputer_m->save();
	
	redirect('AddComputer','refresh');
	
}
}

?>