<?php
class Vendors extends CI_Controller{
	
	  function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','vendors_m'));
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	function index(){
			$perm=$this->user->get_permisstion();
			if($perm[0]['p_vendors']!=1){
			redirect('NotAuth','refresh');
			die();
			}
		$this->load->library('pagination');

		$config['base_url'] = base_url() . 'Vendors/';
		$total_row = $this->vendors_m->record_count();
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
		$data["services"] = $this->vendors_m->fetch_data($config["per_page"], $page);
		$data["userdata"] = $this->user->userdata();
		$data["priv"] = $this->user->get_permisstion();
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links);
		$this->load->view('vendors_v',$data);
	}
	
	function save(){
		

		$this->vendors_m->save();
		
		redirect('Vendors','refresh');
	}
	
	function remove(){
		$this->vendors_m->remove();
		redirect('Vendors','refresh');
	}
}

?>