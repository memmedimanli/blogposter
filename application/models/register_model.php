<?php

   class Register_model extends CI_Model
   {

   	function registration(){
        $new_user = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
        	);

        $insert = $this->db->insert('users', $new_user);
        return $insert;
   	}
   }
?>