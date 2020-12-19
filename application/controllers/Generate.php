<?php

class Generate extends CI_Controller
{
public function index() {

    $this->load->database();
		
	$query = $this->db->query("select t_s_name as ServiceName,t_s_desc as ServiceDetails,t_date as DateAndTime from transactions ");

    $this->load->helper('csv');

    query_to_csv($query, TRUE, 'Report.csv');
	
	
	

}
}