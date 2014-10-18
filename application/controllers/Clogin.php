<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Clogin extends CI_Controller{

 	public function login(){
 		
 		$this->load->view('login');
 	}

 	function validate(){
 		
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == FALSE){
  	    	$this->login();
  	    }else{

        $this->load->model('login_model');
 		$q = $this->login_model->check();

 		if($q){
         $user_id = $this->login_model->getID($this->input->post('username'));
 			$data = array(
                'username' => $this->input->post('username'),
                'user_id' => $user_id,
                'is_logged' => true
 				);
            //echo '1';
 			$this->session->set_userdata($data);
 			redirect('home');
 		}else{
 			
 			$this->login();
 		}
 	}
  }
 }
?>