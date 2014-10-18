<?php
  
  class Site extends CI_Controller{

  	 function index($offset = NULL){
       
      $limit = 5;
      if(!is_null($offset))
    {
        $offset = $this->uri->segment(3);
    }
    $this->load->library('pagination');
    $this->load->model('post_model');
    $config['uri_segment'] = 3;
    $config['base_url'] = "http://ramin.io/blogposter/index.php/site/index";
    $config['total_rows'] = $this->post_model->total_post();
    $config['per_page'] = $limit;
    $config['num_links'] = 5;
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['full_tag_open'] = '<div class="pagination">';
    $config['full_tag_close'] = '</div>';
    $this->pagination->initialize($config);

    $data['query'] = $this->post_model->get_post($limit,$offset);
    $this->load->view('main',$data);

  	 	

  	 }


  	 function add_post(){

  	 	$this->load->library('form_validation');

  	 	$this->form_validation->set_rules('context', 'Context', 'trim|required');

  	 	if($this->form_validation->run() == FALSE){
  	 		$this->load->view('main');
  	 	}else{
       
  	 		$this->load->model('post_model');
  	 		$this->post_model->add_post();

        redirect('site/index');
  	 	}
  	 }

     function deletePost(){
      if (!$this->input->is_ajax_request()) {
        exit('No direct script access allowed');
       }
      $this->load->model('post_model');
      $post_id = $this->input->post('post_id');

      $output['data'] = array('status' => "ok",
                      "message" => $post_id);
      $this->post_model->deletePost($post_id);
      $this->load->view('ajax', $output);

      // redirect('site/profile');
     }

  	 function profile($offset = NULL){

       $limit = 5;
      if(!is_null($offset))
    {
        $offset = $this->uri->segment(3);
    }
    $user_id = $this->session->userdata('user_id');
    $this->load->library('pagination');
    $this->load->model('post_model');
    $config['uri_segment'] = 3;
    $config['base_url'] = "http://ramin.io/blogposter/index.php/site/profile";
    $config['total_rows'] = $this->post_model->totalUserPost($user_id);
    $config['per_page'] = $limit;
    $config['num_links'] = 5;
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['full_tag_open'] = '<div class="pagination_profile">';
    $config['full_tag_close'] = '</div>';
    $this->pagination->initialize($config);

    $data['query'] = $this->post_model->getUserPost($this->session->userdata('username'), $limit, $offset);
  
  	 	$this->load->view('profile', $data);
  	 }

     function addComment(){  



        $this->load->model('comment_model');
        $post_id = $this->input->post('post_id');
        $tdata = $this->input->post('tdata');
        $comment_id = $this->comment_model->addComment($post_id, $tdata);
        

         $output['data'] = array('status' => "ok",
                      "message" => $post_id,
                      "username" => $this->session->userdata('username'),
                      "date" => $this->comment_model->getCommentDate($comment_id)
                      );

        
        $this->load->view('ajax', $output);
        //redirect('site/index');
          	 
  }

  function getPostComment(){

    $this->load->model('comment_model');
    $post_id = $this->input->post('post_id');

    $data['q'] = $this->comment_model->getPostComment($post_id);

    $this->load->view('main', $data);
  }

  function logout(){

    $this->session->sess_destroy();
    redirect('/login');
  }
}
?>
