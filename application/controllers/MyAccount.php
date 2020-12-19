<?php
class MyAccount extends CI_Controller{
	
	function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','myaccount_m'));
		$this->load->library('form_validation');
		
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	function index(){
		
		$data=array(
		"userdata"=>$this->user->userdata(),
			'priv'=>$this->user->get_permisstion()
		);
		$this->load->view('myaccount_v',$data);
	}
	
	
	
	function update(){// update password
	$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>'); 
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[7]|max_length[45]|matches[password]');
		
		if ($this->form_validation->run() == FALSE)
                {
                       $data=array(
		"userdata"=>$this->user->userdata(),
			'priv'=>$this->user->get_permisstion()
		);
		$this->load->view('myaccount_v',$data);
                }
                else
                {
					$this->myaccount_m->updatepassword();
					redirect('MyAccount','refresh');
                }
				
		
	}
	
	function save(){// update data
	$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>'); 
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric|max_length[45]');
		
		if ($this->form_validation->run() == FALSE)
                {
                       $data=array(
		"userdata"=>$this->user->userdata(),
			'priv'=>$this->user->get_permisstion()
		);
		$this->load->view('myaccount_v',$data);
                }
                else
                {
					$this->myaccount_m->save();
					redirect('MyAccount','refresh');
                }
				
		
	}
}

?>