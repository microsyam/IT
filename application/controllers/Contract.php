<?php
Class Contract extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('contract_m','m');
			$this->load->model('user');
			$this->load->library('pagination');
		}
		else{
			redirect('Login','refresh');
		}

	}



	function index(){
		$perm=$this->user->get_permisstion();
		if($perm[0]['p_contract']!=1){
			redirect('NotAuth','refresh');
			die();
		}

		$this->load->view('contract_v',array(
			'priv'=>$this->user->get_permisstion(),
			'userdata'=>$this->user->userdata(),
			'locations'=>$this->m->getLocations(),
			'get_users'=>$this->m->getUsers(),
			'rws'=>$this->m->countContracts()
		));

}

	function fetch($rowno=0)
	{
		$query="";
		$filter="";

		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
			$filter = $this->input->post('filter');
		}
		$rowperpage = 5;
		if($rowno != 0){

			$rowno = ($rowno-1) * $rowperpage;

		}
		$allcount = $this->m->count_all($query,$filter);
		$this->db->limit($rowperpage, $rowno);
		$users_record = $this->m->fetch_data($query,$filter);
		$config['base_url'] = base_url().'Contract/fetch';
		$config['use_page_numbers'] = TRUE;
		$config['total_rows'] = $allcount;
		$config['per_page'] = $rowperpage;
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['result'] = $users_record;
		$data['row'] = $rowno;
		echo json_encode($data);
	}

	public function addContract(){
		$result = $this->m->addContract();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editContract(){
		$result = $this->m->editContract();
		echo json_encode($result);
	}

	public function updateContract(){
		$result = $this->m->updateContract();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteContract(){
		$result = $this->m->deleteContract();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}
