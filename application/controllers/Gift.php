<?php
class Gift extends CI_Controller{
	
	
	 function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','gift_m'));
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
		if(isset($_POST["check"])){
			
			$data=array(
			'partners'=>$this->gift_m->index(),
			'userdata'=>$this->user->userdata(),
			'card_info'=>$this->gift_m->checker(),
			'priv'=>$this->user->get_permisstion(),
			);
			$this->load->view('gift_v',$data);
		}elseif(isset($_POST["redeem"])){
		$this->gift_m->redeem();
			$data=array(
			'partners'=>$this->gift_m->index(),
			'userdata'=>$this->user->userdata(),
			'card_info'=>$this->gift_m->checker(),
			'priv'=>$this->user->get_permisstion(),
			);
			$this->load->view('gift_v',$data);
		
		}else{
		$data=array(
		'partners'=>$this->gift_m->index(),
		'card_info'=>null,
		'userdata' => $this->user->userdata(),
			'priv'=>$this->user->get_permisstion(),
		);
		$this->load->view('gift_v',$data);
	}
		
	}
	
}

?>