<?php 
class CompletedTask extends CI_Controller{
	
	
	function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','newtask_m'));
		
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	function index(){
		
		$perm=$this->user->get_permisstion();
			if($perm[0]['p_new_task']!=1){
			redirect('NotAuth','refresh');
			die();
			}
		
		$this->load->view('newtask_v',array(
		"services"=>$this->newtask_m->index(),
		"userdata"=>$this->user->userdata(),
		'priv'=>$this->user->get_permisstion(),
		));
	}
	function Save(){
		$perm=$this->user->get_permisstion();
			if($perm[0]['p_new_task']!=1){
			redirect('NotAuth','refresh');
			die();
			}
		
		
		$this->newtask_m->Save();
		redirect('CompletedTask','refresh');
	}
}
?>