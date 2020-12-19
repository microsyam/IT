<?php

class EditUser extends CI_Controller{
	
	
		function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','EditUser_m','AddComputer_m'));
		$this->load->library('form_validation');
		
		  }
		else{
            redirect('logout','refresh');
        }
    }
	
	
	function index(){
		
		
		$perm=$this->user->get_permisstion();
	if($perm[0]['p_edit_user']!=1){
	redirect('NotAuth','refresh');
	die();
	}
            if($_POST) {
                $data = $this->EditUser_m->get_data();
                $this->load->view('edituser_v',array(
                    'userdata' => $this->user->userdata(),
                    'user_result'=>$data,
					'deparments'=>$this->AddComputer_m->index(),
					'priv'=>$this->user->get_permisstion(),
                ));
            }else{
            $this->load->view('edituser_v', array(
                'userdata' => $this->user->userdata(),
                'user_result'=>$this->EditUser_m->index(),
				'deparments'=>$this->AddComputer_m->index(),
				'priv'=>$this->user->get_permisstion(),
            ));
            }
			
	
			
	
	}
	
	
	function update()
    {
		$perm=$this->user->get_permisstion();
	if($perm[0]['p_edit_user']!=1){
	redirect('NotAuth','refresh');
	die();
	}
	
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>'); 
			if(isset($_POST['save'])){
				$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>'); 
		$this->form_validation->set_rules('select_user','User','trim|required|xss_clean');
		$this->form_validation->set_rules('name','Name','trim|required|xss_clean');
		$this->form_validation->set_rules('email','Email Address','trim|required|xss_clean|valid_email|min_length[5]|max_length[50]');
		$this->form_validation->set_rules('phone','Phone','trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('department','Department','trim|required|xss_clean|numeric');
			
			if($this->form_validation->run()==false){
                $this->load->view('edituser_v',array(
                    'userdata' => $this->user->userdata(),
					'deparments'=>$this->AddComputer_m->index(),
                    'user_result'=>$this->EditUser_m->get_data(),
					'priv'=>$this->user->get_permisstion(),
                ));
			}else{
            $this->EditUser_m->update();
			  redirect('EditUser','refresh');
			}
			}
			
			
			elseif(isset($_POST['cancel'])){
				redirect('EditUser', 'refresh');
			}
			
			
			elseif(isset($_POST['chpass'])){	
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[7]|max_length[45]|matches[password]');
			if($this->form_validation->run()==false){
				$this->load->view('edituser_v',array(
                    'userdata' => $this->user->userdata(),
					'deparments'=>$this->AddComputer_m->index(),
                    'user_result'=>$this->EditUser_m->get_data(),
					'priv'=>$this->user->get_permisstion(),
                ));
			}else{
			$this->EditUser_m->update_password();
                   redirect('EditUser', 'refresh');
				
				}
			}
        }
		
		
}

?>