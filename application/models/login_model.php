<?php

class Login_model extends CI_Model{

	function check(){
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$q = $this->db->get('users');

		if($q->num_rows == 1){
			return true;
		}
	}

	function getID($username){
		$this->db->where('username',$username);
 		$query = $this->db->get('users');
 		foreach ($query->result() as $row)
        {
            $user_id = $row->user_id;
        }
        return $user_id;
	}

}
?>