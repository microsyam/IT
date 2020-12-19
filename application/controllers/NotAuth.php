<?php 

class NotAuth extends  CI_Controller{
	
	
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
		
			$this->load->view('notauth_v',array(
			"userdata"=>$this->user->userdata(),
			'priv'=>$this->user->get_permisstion()
			
			));
		  
	}
	
}

?>