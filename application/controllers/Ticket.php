<?php 
class Ticket extends CI_Controller{
	
	
	function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','Ticket_m'));
		$this->load->library('pagination');
		
		  }
		else{
            redirect('Logout','refresh');
        }
    }
	
	
	function index(){
		
		$perm=$this->user->get_permisstion();
		$viewcusttickets=$perm[0]['p_view_cust_tickets'];
		$ticketid=$this->uri->segment(2);
		$this -> session -> set_userdata('ticket_id', $ticketid);
	
		
		$config['base_url'] = base_url() . 'Ticket/'.$ticketid;
		$total_row = $this->Ticket_m->record_count($ticketid);
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
			if ($this->uri->segment(3)) {
                $page = ($this->uri->segment(3));
            } else {
                $page = 1;
            }
		$data["replies"] = $this->Ticket_m->fetch_data($ticketid,$config["per_page"], $page);
		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;', $str_links);
		$data["userdata"] = $this->user->userdata();
		$data["priv"] = $this->user->get_permisstion();
        $data['ticket_data']= $this->Ticket_m->index($viewcusttickets,$ticketid);
		$this->load->view('ticket_v',$data);
		
		
	}
	
	function reply(){
		$ticket_id=$this -> session -> userdata("ticket_id");
		$this->Ticket_m->reply($ticket_id);
		 redirect('Ticket/'.$ticket_id);
	}
	
	function solved(){
		$ticket_id=$this -> session -> userdata("ticket_id");
		$this->Ticket_m->solved();
		 redirect('Ticket/'.$ticket_id);
		
	}
	
}
?>