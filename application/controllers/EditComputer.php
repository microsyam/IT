<?php
class EditComputer extends CI_Controller{
	
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
	if($perm[0]['p_edit_computer']!=1){
	redirect('NotAuth','refresh');
	die();
	}
	
		if(isset($_POST["select_computer"])){
		
		$data=array(
		'computers'=>$this->EditComputer_m->getcomputerdata(),
		'employees'=>$this->employees_m->get_emp(),
		'userdata' => $this->user->userdata(),
			'priv'=>$this->user->get_permisstion(),
			'deparments'=>$this->EditComputer_m->dep(),
		);
		$this->load->view('editcomputer_v',$data);
		
		}else{
		$data=array(
		'computers'=>$this->EditComputer_m->getcomputers(),
		'employees'=>$this->employees_m->get_emp(),
		'userdata' => $this->user->userdata(),
			'priv'=>$this->user->get_permisstion(),
			'deparments'=>$this->EditComputer_m->dep(),
		);
		$this->load->view('editcomputer_v',$data);
		}
	}
	
	function update(){
			$perm=$this->user->get_permisstion();
	if($perm[0]['p_edit_computer']!=1){
	redirect('NotAuth','refresh');
	die();
	}
	
		if(isset($_POST["back"])){
			redirect('EditComputer','refresh');
		}
		elseif(isset($_POST["del"])){
		$this->EditComputer_m->del();
		redirect('EditComputer','refresh');
		}
		else{
		$this->EditComputer_m->update();
		redirect('EditComputer','refresh');
		}
	}
}


?>