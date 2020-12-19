<?php 
class GeneralSettings extends CI_Controller{
	
		function __construct (){

        parent::__construct();
		  if($this->session->userdata('logged_in')){
		$this->load->model(array('user','GeneralSettings_m'));
		
		  }
		else{
            redirect('Logout','refresh');
      
		}
		}
	function index(){
		
		$this->load->view('generalsettings_v',array(
					'time'=>$this->GeneralSettings_m->display_time(),
                    'userdata' => $this->user->userdata(),
					'c_data'=>$this->GeneralSettings_m->index(),
					'priv'=>$this->user->get_permisstion(),
                ));
				
				
	}
	
	function update(){
		$config['upload_path']="./images/";
		$config['allowed_types']='jpg|jpeg|png';
		$config['encrypt_name']=TRUE;
		$config['max_size']='1024';
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload()){
			$this->load->view('generalsettings_v',array(
			'time'=>$this->GeneralSettings_m->display_time(),
			'userdata'=>$this->user->userdata(),
			'c_data'=>$this->GeneralSettings_m->index(),
			'priv'=>$this->user->get_permisstion(),
			'error'=>$this->upload->display_errors(),
			));
		}else{
			 $image=$this->GeneralSettings_m->image(); // get current image to remove it 
			if(!empty($image)){
			  $path='images/'.$image;
				unlink($path);
			}
			$file_data = $this->upload->data();
			$filename = $file_data['file_name'];
			$config['image_library'] = 'gd2';
			$config['source_image'] = './images/' . $filename;
			//$config['new_image'] = './images/' . $filename; 
			//$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width'] = 500;
			$config['height'] = 500;
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$this->GeneralSettings_m->update($filename);
			redirect('GeneralSettings','refresh');
		}
	}
	
		function remove(){
	
		$image=$this->GeneralSettings_m->image();
		if(!empty($image)){
			  $path='images/'.$image;
				unlink($path);
			}
			$this->GeneralSettings_m->remove_logo();
	redirect('GeneralSettings','refresh');
	}
	
	function save(){
		
		$this->GeneralSettings_m->save();
		redirect('GeneralSettings','refresh');
	}
	
	
}

?>