<?php
class Logout extends CI_Controller{
	
	
	function index(){
	$this->session->unset_userdata('logged_in');
	if (!isset($_SESSION))
  {
    session_start();
  }
	session_destroy();
	redirect('login', 'refresh');
	}
}
?>