<?php
class StockBoard extends CI_Controller{
	
	  function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','stockboard_m'));
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	function index(){
		$this->load->library('pagination');
			$perm=$this->user->get_permisstion();
			if($perm[0]['p_stock_board']!=1){
			redirect('NotAuth','refresh');
			die();
			}
		
			if(isset($_POST["cancel"])){
				redirect('StockBoard','refresh');
				
			}
		
			if ($this->uri->segment(2)) {
                $warehouse=$this->uri->segment(2);
            } else {
                $warehouse=$this->input->post('plant');
            }
			
			
			
			
			
			
			$config['base_url'] = base_url() . 'StockBoard/'.$warehouse;
			
			$total_row = $this->stockboard_m->record_count($warehouse);
			
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
			if ($this->uri->segment(3)) {
                $page = ($this->uri->segment(3));
            } else {
                $page = 1;
            }
			
			if(isset($_POST["excel"])){
		
		$data=$this->stockboard_m->excel();
		$this->load->helper('csv');

		query_to_csv($data, TRUE, 'Report.csv');
		die();
	}
	
		$data["item"] = $this->stockboard_m->fetch_data($warehouse,$config["per_page"], $page);
		$data["userdata"] = $this->user->userdata();
		$data["plants"] = $this->stockboard_m->get_plants($warehouse);
		$data["priv"] = $this->user->get_permisstion();
		$data["warehouse"] = $warehouse;
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links);
		$this->load->view('stockboard_v',$data);
	
	}
	

}

?>