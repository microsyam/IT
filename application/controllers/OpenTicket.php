<?php 
class OpenTicket extends CI_Controller{
	
	
	function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','open_ticket_m'));
		
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	function index(){
		
		$perm=$this->user->get_permisstion();
			if($perm[0]['p_open_ticket']!=1){
			redirect('NotAuth','refresh');
			die();
			}
		
		$this->load->view('open_ticket_v',array(
		"services"=>$this->open_ticket_m->index(),
		"userdata"=>$this->user->userdata(),
		'priv'=>$this->user->get_permisstion(),
		));
	}
	function Save(){
		$perm=$this->user->get_permisstion();
			if($perm[0]['p_open_ticket']!=1){
			redirect('NotAuth','refresh');
			die();
			}
		
		
		$this->open_ticket_m->Save();
		redirect('OpenTicket','refresh');
	}
}
?>