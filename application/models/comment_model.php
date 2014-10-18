<?php

 class Comment_model extends CI_Model{

 	function addComment($post_id, $tdata){
 		$this->load->helper('form');
        $this->load->helper('html');
        
 		$tdata = array(
 			'context' => $tdata,
 			'date' => date('Y-m-d H:i:s'),
 			'comment_by' => $this->session->userdata('user_id'),
      'comment_to' => $post_id            
 			);

 		$insert = $this->db->insert('comments', $tdata);
 		$comment_id =  $this->db->insert_id();
    return $comment_id;
         
 	}
    
    function getPostComment($post_id){
      
      $this->db->select('comments.comment_id, comments.context, comments.date, comments.comment_by, 
      	comments.comment_to, users.user_id, users.username, post.post_id');
      $this->db->from('comments');
      $this->db->join('post', 'comments.comment_to = post.post_id');
      $this->db->join('users', 'comments.comment_by = users.user_id');
      $this->db->where('comment_to', $post_id);
      $this->db->order_by('comments.date', 'asc');
      $query = $this->db->get();

      return $query->result();
    }

    function getCommentDate($comment_id){
      $query = $this->db->query('SELECT date FROM comments WHERE comment_id = ?', $comment_id);
      $result = $query->result();
      return $result[0]->date;
    }

 }
?>