<?php
Class LegalReports extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')){
			$this->load->model('legalReports_m','m');
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

		$this->load->view('LegalReport_v',array(
			'priv'=>$this->user->get_permisstion(),
			'userdata'=>$this->user->userdata(),
			'locations'=>$this->m->getLocations(),
			'get_users'=>$this->m->getUsers(),
			'rws'=>$this->m->countContracts()
		));

}

	function fetch($rowno=0)
	{
		$user="0";
		/*$user=$this->uri->segment(4);*/
		if($this->input->post('user')!=0){
		$user = $this->input->post('user');
		}
			/*$user = $this->uri->segment(4);*/

		$rowperpage = 5;
		if($rowno != 0){
			$rowno = ($rowno-1) * $rowperpage;
		}

		$allcount = $this->m->count_all($user);
		/*$this->db->limit($rowperpage, $rowno);*/
		$users_record = $this->m->fetch_data($user,$rowperpage, $rowno);

		$config['base_url'] = base_url().'LegalReports/fetch/';
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
		$data['counta'] = $allcount; // count of row numbers
		$data['row'] = $rowno;
		echo json_encode($data);
	}
}
