<?php

Class ActivityReports extends CI_Controller{
	
	function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','activityreport_m'));
		$this->load->library('pagination');
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	function index(){
		
		$perm=$this->user->get_permisstion();
			if($perm[0]['p_activity_report']!=1){
			redirect('NotAuth','refresh');
			die();
			}
			
				$config['base_url'] = base_url() . 'ActivityReports/';
		$total_row = $this->activityreport_m->record_count();
		  $config['total_rows'] = $total_row;
            $config['per_page'] = 15;
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
		$data["tabledata"] = $this->activityreport_m->fetch_data($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links);
		$data["userdata"] = $this->user->userdata();
		$data["priv"] = $this->user->get_permisstion(); // hide or display menu as permesstion flag
		$data['users']=$this->activityreport_m->get_user_data();
        $data['services']= $this->activityreport_m->index();
		$this->load->view('activityreport_v',$data);
		
		
	}
	
	public function search($page_num = 1){

	$perm=$this->user->get_permisstion();
			if($perm[0]['p_activity_report']!=1){
			redirect('NotAuth','refresh');
			die();
			}
			
        $username=$this->input->post('select_user');
        $username = ($this->uri->segment(3)) ? $this->uri->segment(3) : $username;
        $service=$this->input->post('select_customer');
        $service = ($this->uri->segment(4)) ? $this->uri->segment(4) : $service;
        $datefrom=$this->input->post('from');
        $datefrom = ($this->uri->segment(5)) ? $this->uri->segment(5) : $datefrom;
        $dateend=$this->input->post('to');
        $dateend = ($this->uri->segment(6)) ? $this->uri->segment(6) : $dateend;
        //$config['use_page_numbers'] = TRUE;
        if(empty($username)){
            $username="null";
        }
        if(empty($service)){
            $service="null";
        }
        if(empty($datefrom)){
            $datefrom="null";
        }
        if(empty($dateend)){
            $dateend="null";
        }
        $config['base_url'] = site_url("ActivityReports/search/$username/$service/$datefrom/$dateend");
        $total_row = $this->activityreport_m->search_count($username,$service,$datefrom,$dateend);
        $config['total_rows'] = $total_row;
        $config['per_page'] = 15;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);
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
        if ($this->uri->segment(7)) {
            $page = ($this->uri->segment(7));
        } else {
            $page = 1;
        }
        $str_links = $this->pagination->create_links();
        $data["links"]= explode('&nbsp;', $str_links);
        $data['users']=$this->activityreport_m->get_user_data();
		$data["userdata"] = $this->user->userdata();
		$data["priv"] = $this->user->get_permisstion();
        $data['services']= $this->activityreport_m->index();

        $data["tabledata"] =$this->activityreport_m->search($username,$service,$datefrom,$dateend,$config["per_page"],$page);
        $this->load->view('activityreport_v',$data);

    }
}
?>