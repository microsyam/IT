<?php

Class Transactions extends CI_Controller{
	
	function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','transactions_m'));
		$this->load->library('pagination');
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	function index(){
		
		$perm=$this->user->get_permisstion();
			if($perm[0]['p_report']!=1){
			redirect('NotAuth','refresh');
			die();
			}
			
				$config['base_url'] = base_url() . 'Transactions/';
		$total_row = $this->transactions_m->record_count();
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
		$data["tabledata"] = $this->transactions_m->fetch_data($config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links);
		$data["userdata"] = $this->user->userdata();
		$data["priv"] = $this->user->get_permisstion(); // hide or display menu as permesstion flag
		$data["items"]=$this->transactions_m->get_items();
		$data["vendors"]=$this->transactions_m->get_vendors();
        $data["warehouses"]= $this->transactions_m->warehouses();
		$this->load->view('transactions_v',$data);
		
		
	}
	
	public function search($page_num = 1){
	
	$perm=$this->user->get_permisstion();
			if($perm[0]['p_report']!=1){
			redirect('NotAuth','refresh');
			die();
			}
			
        $items=$this->input->post('item');
        $items = ($this->uri->segment(3)) ? $this->uri->segment(3) : $items;
        $warehouse=$this->input->post('warehouse');
        $warehouse = ($this->uri->segment(4)) ? $this->uri->segment(4) : $warehouse;
        $datefrom=$this->input->post('from');
        $datefrom = ($this->uri->segment(5)) ? $this->uri->segment(5) : $datefrom;
        $dateend=$this->input->post('to');
        $dateend = ($this->uri->segment(6)) ? $this->uri->segment(6) : $dateend;
		$trans=$this->input->post('transafer');
        $trans = ($this->uri->segment(7)) ? $this->uri->segment(7) : $trans;
		$vendors=$this->input->post('vendors');
        $vendors = ($this->uri->segment(8)) ? $this->uri->segment(8) : $vendors;
        //$config['use_page_numbers'] = TRUE;
        if(empty($items)){
            $items="null";
        }
        if(empty($warehouse)){
            $warehouse="null";
        }
        if(empty($datefrom)){
            $datefrom="null";
        }
        if(empty($dateend)){
            $dateend="null";
        }
		if(empty($trans)){
            $trans="null";
        }
		if(empty($vendors)){
            $vendors="null";
        }
		
		// for export
		
		if(isset($_POST["excel"])){
		
		$data=$this->transactions_m->excel($vendors,$warehouse,$datefrom,$dateend,$items,$trans);
		$this->load->helper('csv');

		query_to_csv($data, TRUE, 'Report.csv');
		die();
	}
		
		//end 
        $config['base_url'] = site_url("Transactions/search/$items/$warehouse/$datefrom/$dateend/$trans/$vendors");
        $total_row = $this->transactions_m->search_count($vendors,$warehouse,$datefrom,$dateend,$items,$trans);
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
        if ($this->uri->segment(9)) {
            $page = ($this->uri->segment(9));
        } else {
            $page = 1;
        }
        $str_links = $this->pagination->create_links();
        $data["links"]= explode('&nbsp;', $str_links);
		$data["userdata"] = $this->user->userdata();
		$data["items"]=$this->transactions_m->get_items();
		$data["vendors"]=$this->transactions_m->get_vendors();
		$data["priv"] = $this->user->get_permisstion();
        $data["warehouses"]= $this->transactions_m->warehouses();
        $data["tabledata"] =$this->transactions_m->search($vendors,$warehouse,$datefrom,$dateend,$items,$trans,$config["per_page"],$page);
        $this->load->view('transactions_v',$data);

    }
	
	function details(){
		
		$det_id=$this->uri->segment(3);
		$message=$this->transactions_m->get_det($det_id);
		echo $message[0]['s_details'];
		
	}
	
	
}
?>