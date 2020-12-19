<?php 
class Dashboard extends CI_Controller{
	
	
		function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','dashboard_m'));
		
		  }
		else{
            redirect('login','refresh');
        }
    }
	/*
	 *
	 *
				'comp_tasks'=>$this->dashboard_m->compeleted_tasks(),
				'taskedtoyou'=>$this->dashboard_m->tasks_assigned_to_you(),
			'total_tickets'=>$this->dashboard_m->total_tickets(),
			'open_tickets'=>$this->dashboard_m->opened_tickets(),
	 *
	 */
	function index(){
					
			$this->load->view('general_v',array(
			'priv'=>$this->user->get_permisstion(),
			'userdata'=>$this->user->userdata(),
			'warehouses'=>$this->dashboard_m->get_warehouses(),
			'lessfive'=>$this->dashboard_m->less_five(),
			
			'priv'=>$this->user->get_permisstion()
			
			));
		  
	}
	
}
