<!DOCTYPE html>
<html>
<head>
	<title></title>
  <script src="<?=base_url();?>js/jquery.js"></script>
	<link href="<?= base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="<?= base_url();?>bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=base_url();?>js/jquery.min.js"></script>
	<link href="<?= base_url();?>css/style.css" rel="stylesheet" type="text/css" >
  <script src="<?= base_url();?>js/practice.js"></script>
  <script src="<?= base_url();?>js/deletePost.js"></script>
  <script src="<?= base_url();?>js/comment_area.js"></script>
  <script src="<?= base_url();?>js/comment.js"></script>
  
</head>
<body>
  <div class="header">
      <div>
        <?php echo anchor('/home','<img src="'.base_url().'image/logo.svg" alt="Delete" width="40" height="40" style="margin-left: 28px;"/>');?>
      </div>

      <div class="greeting">
    <p >
    <?php if($this->session->userdata('username')){
    $username = $this->session->userdata('username');
    echo 
    "Welcome, ".
    anchor('profile', $username) 
    ."!"; 
    }?>

    <?php 
    if($this->session->userdata('username')){
      echo anchor('site/logout', 'Logout');
    }else{
      echo anchor('login', 'Login', array('class' => 'login_style'));
    }
    //$this->session->sess_destroy();
    ?> 
    </p> 
    
  </div>

  </div>


 
