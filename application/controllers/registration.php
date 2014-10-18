<?php
 
  class Registration extends CI_Controller{


  	function add(){

  		$this->load->library('form_validation');

  		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
  		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
  		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|is_unique[users.username]');
  		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
  		$this->form_validation->set_rules('password_confirm', 'Password Confirm', 'trim|required|matches[password]');
  	    
  	    if($this->form_validation->run() == FALSE){
  	    	$this->load->view('register');
          //redirect('register');
  	    }else{

  	    	$this->load->model('register_model');

  	    	if($query = $this->register_model->registration()){
            //redirect('success');
  	    		$this->load->view('success');
  	    	}else{
  	    		redirect('register');
  	    	}
  	    }

  	}
  }
?>