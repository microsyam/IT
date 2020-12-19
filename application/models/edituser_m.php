<?php
class EditUser_m extends CI_Model {
   function index()
   {
	   $session_data = $this->session->userdata('logged_in');
         $name = $session_data['username'];
		 $this->db->select('*');
		 $this->db->from('users');
		 $this->db->where('u_username', $name);
		 $user_data = $query = $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $usercompanyid[] = $row_userdata;
                }
            }
       $this->db->select('*');
       $this->db->from('users');

       $query = $this->db->get();
       return $result=$query->result();

   }
    function get_data(){
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('u_id',$this->input->post('select_user'));
    $query=$this->db->get();
    return $result=$query->result();

    }

    function update(){

		 $this->db->select('*');
		 $this->db->from('departments');
		 $this->db->where('d_display','1');
		 $this->db->where('d_id', $this->input->post('department'));
		 $user_data = $query = $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $usercompanyid[] = $row_userdata;
                }
            }
        $data=array(
            'u_name'=>$this->input->post('name'),
			'u_phone'=>$this->input->post('phone'),
			'u_email'=>$this->input->post('email'),
			'u_department'=>$this->input->post('department'),
			'u_department_name'=> $usercompanyid[0]['d_name'],
			'u_active'=>$this->input->post("status"),

        );
        $this->db->where('u_id',$this->input->post('select_user'));

        $this->db->update('users',$data);
    }
	
	function update_password(){
		$session_data = $this->session->userdata('logged_in');
         $name = $session_data['username'];
		 $this->db->select('*');
		 $this->db->from('users');
		 $this->db->where('u_username', $name);
		 $user_data = $query = $this->db->get();
		 if ($user_data->num_rows() > 0) {
                foreach ($query->result_array() as $row_userdata) {

                    $usercompanyid[] = $row_userdata;
                }
            }
		 $data=array(
            'u_password'=>$this->input->post('password'),
            );
        $this->db->where('u_id',$this->input->post('select_user'));

        $this->db->update('users',$data);
	}


}
?>