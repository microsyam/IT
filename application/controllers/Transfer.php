<?php
class Transfer extends CI_Controller{
	
	  function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','transfer_m','Employees_m'));
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	function index(){
		
			$perm=$this->user->get_permisstion();
			if($perm[0]['p_make_transaction']!=1){
			redirect('NotAuth','refresh');
			die();
			}
			
			if ($this->uri->segment(2)) {
                $warehouse=$this->uri->segment(2);
            } else {
                $warehouse=$this->input->post('warehouse');
            }
		$data["warehouse"]=$this->transfer_m->get_warehouse();	
		$data["items"]=$this->transfer_m->get_items();	
		$data["vendors"]=$this->transfer_m->get_vendors();	
		$data["userdata"] = $this->user->userdata();
		$data["priv"] = $this->user->get_permisstion();
		$data["employees"]=$this->Employees_m->get_emp();
		$this->load->view('transfer_v',$data);
	
	}
	
	function process(){
		$item=$this->input->post('item');
		$type=$this->input->post('type');
		$qtyin=$this->input->post('qtyin');
		$vendor=$this->input->post('vendor');
		$qtyout=$this->input->post('qtyout');
		$computers=$this->input->post('computers');
		if(isset($_POST['cancel'])){
			
		redirect('Transfer','refresh');
		
		}elseif(isset($_POST['in'])){
			
			if(empty($item)||empty($type)||empty($qtyin)||empty($vendor)){
				
				$this->session->set_flashdata('error','All fields required , Please try again');
				redirect('Transfer','refresh');
				die();
				
			}
		

			if($this->input->post("qtyin")<0){
				$this->session->set_flashdata('error','The quantity field must greater then 0');
				
			}else{
			$this->transfer_m->in();
			$this->session->set_flashdata('done','Your transaction is complete');
			}
			redirect('Transfer','refresh');
		}
		
		elseif(isset($_POST['out'])){
			
			if(empty($item)||empty($type)||empty($qtyout)||empty($computers)){
				
				$this->session->set_flashdata('error','All fields required , Please try again');
				redirect('Transfer','refresh');
				die();
				
			}
			
			
			if($this->input->post("qtyin")<0){
				$this->session->set_flashdata('error','The quantity field must greater then 0');
			}else{
			$this->transfer_m->out();
			
			}
			redirect('Transfer','refresh');
		}
	}
	

}

?>