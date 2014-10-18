<?php

  class Post_model extends CI_Model{
     
     function add_post(){

        $this->load->helper('form');
        $this->load->helper('html');

     	$tdata = array(
     		'context' => $this->input->post('context'),
     		'date' => date('Y-m-d H:i:s'),
     		'post_by' => $this->session->userdata('user_id')
     	);

     	$insert = $this->db->insert('post', $tdata);
       
     }

     function get_post($limit, $offset){

     	$this->db->select('post.post_id, post.context, post.date, post.post_by, users.username, users.user_id');
     	$this->db->from('post');
     	$this->db->join('users', 'post.post_by = users.user_id','left');
     	$this->db->order_by('post.date', 'desc');
        $this->db->limit($limit, $offset);
     	$query = $this->db->get();

     	return $query->result();

        

     }

     function total_post()
     {
        return $this->db->count_all('post');
        
      }

     function getUserPost($username, $limit, $offset){
     	$this->db->select('post.post_id, post.context, post.date, post.post_by, users.username, users.user_id');
     	$this->db->from('post');
     	$this->db->join('users', 'post.post_by = users.user_id','left');
     	$this->db->where('username', $username);
     	$this->db->order_by('post.date', 'desc');
        $this->db->limit($limit, $offset);
     	$query = $this->db->get();

     	return $query->result();
     }
     
     function totalUserPost($user_id)
     {
       $this->db->where('post_by', $user_id);
       $count = $this->db->count_all_results('post');
       return $count;

        
      }

     function deletePost($post_id){
        $this->db->where('post_id', $post_id);
        $this->db->delete('post');
     }

  }
?>