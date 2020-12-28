<?php
class EditEmp extends CI_Controller{
	
	  function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','EditComputer_m','employees_m'));
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	function index(){
			$perm=$this->user->get_permisstion();
	if($perm[0]['p_edit_emp']!=1){
	redirect('NotAuth','refresh');
	die();
	}
	
		if(isset($_POST["select_emp"])){
		
		$data=array(
		'employees'=>$this->employees_m->get_emp1(),
		'userdata' => $this->user->userdata(),
			'priv'=>$this->user->get_permisstion(),
			'deparments'=>$this->EditComputer_m->dep(),
		);
		$this->load->view('editemp_v',$data);
		
		}else{
		$data=array(
		'employees'=>$this->employees_m->get_emp1(),
		'userdata' => $this->user->userdata(),
			'priv'=>$this->user->get_permisstion(),
			'deparments'=>$this->EditComputer_m->dep(),
		);
		$this->load->view('editemp_v',$data);
		}
	}
	
	function update(){
			$perm=$this->user->get_permisstion();
	if($perm[0]['p_edit_emp']!=1){
	redirect('NotAuth','refresh');
	die();
	}
	
		if(isset($_POST["back"])){
			redirect('EditEmp','refresh');
		}
		elseif(isset($_POST["del"])){
		$this->employees_m->del();
		redirect('EditEmp','refresh');
		}elseif(isset($_POST["save"])){
			$this->employees_m->update();
		redirect('EditEmp','refresh');
		}
	}
}


?>