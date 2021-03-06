<?php
class OpClass extends CI_Controller{
	
	  function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','opclass_m'));
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	function index(){
			$perm=$this->user->get_permisstion();
			if($perm[0]['p_op_class']!=1){
			redirect('NotAuth','refresh');
			die();
			}
		$this->load->library('pagination');

		$config['base_url'] = base_url() . 'OpClass/';
		$total_row = $this->opclass_m->record_count();
		  $config['total_rows'] = $total_row;
            $config['per_page'] = 10;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
			if ($this->uri->segment(2)) {
                $page = ($this->uri->segment(2));
            } else {
                $page = 1;
            }
		$data["services"] = $this->opclass_m->fetch_data($config["per_page"], $page);
		$data["userdata"] = $this->user->userdata();
		$data["priv"] = $this->user->get_permisstion();
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links);
		$this->load->view('opclass_v',$data);
	}
	
	function save(){
		

		$this->opclass_m->save();
		
		redirect('OpClass','refresh');
	}
	
	function remove(){
		$this->opclass_m->remove();
		redirect('OpClass','refresh');
	}
}

?>