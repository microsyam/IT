<?php
class AddEmp extends CI_Controller{
	
	
	 function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','employees_m','AddComputer_m'));
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	function index(){
		$perm=$this->user->get_permisstion();
		if($perm[0]['p_new_emp']!=1){
	redirect('NotAuth','refresh');
	die();
	}
		$data=array(
		'deparments'=>$this->AddComputer_m->index(),
		'userdata' => $this->user->userdata(),
			'priv'=>$this->user->get_permisstion(),
		);
		$this->load->view('addemp_V',$data);
	}
	
	function save(){
		
		$this->employees_m->save();
		
		redirect('AddEmp','refresh');
	}
}
?>