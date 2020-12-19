<?php 
Class Privileges extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('logged_in')){
	$this->load->model(array('user','Privileges_m')); 
	}else{
		redirect('login','refresh');
		}
	}
	function index(){
	$perm=$this->user->get_permisstion();
	if($perm[0]['p_privilages']!=1){
	redirect('NotAuth','refresh');
	die();
	}
		if(isset($_POST["select_user"])){
			
		$this->load->view('privileges_v',array(
		'userdata'=>$this->user->userdata(),
		'p_data'=>$this->Privileges_m->selectuser(),
		'priv'=>$this->user->get_permisstion(),
		'pri'=>$this->Privileges_m->get_privileges()
		));
		}
		else{
		$this->load->view('privileges_v',array(
		'userdata'=>$this->user->userdata(),
		'p_data'=>$this->user->display_users(),
		'priv'=>$this->user->get_permisstion(),
		'pri'=>$this->Privileges_m->get_privileges()
		));
		}
	}
	function update(){
	$perm=$this->user->get_permisstion();
	if($perm[0]['p_privilages']!=1){
	redirect('NotAuth','refresh');
	die();
	}
	if(isset($_POST['cancel'])){
		redirect('Privileges', 'refresh');
				die();
			}
	
		$this->Privileges_m->update();
		$this->session->set_flashdata('done','Updated');
		redirect('Privileges','refresh');
	}
	
	
}
?>