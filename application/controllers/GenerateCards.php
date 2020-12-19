<?php
class GenerateCards extends CI_Controller{
	
	
	 function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','gift_m'));
		$this->load->helper('string');
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	function index(){
		$perm=$this->user->get_permisstion();
	if($perm[0]['p_gift_redeem']!=1){
	redirect('NotAuth','refresh');
	die();
	}
		$data=array(
			'partners'=>$this->gift_m->index(),
			'userdata'=>$this->user->userdata(),
			'card_info'=>$this->gift_m->checker(),
			'priv'=>$this->user->get_permisstion(),
			);
			$this->load->view('generate_gifts_v',$data);
		
	}
	function Generate(){
		$this->gift_m->generate();
	}
	
}

?>