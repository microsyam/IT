<?php
class login extends CI_Controller{
	
	function index(){
	    
	    
		$this->load->model('login_logo_m');
		
		
		$this->load->view('login_v',array(
		'logo'=>$this->login_logo_m->index()
		));
	}
}
?>