<?php $this->load->view('includes/header');?>
    <div class="success_main">
    <fieldset>
      You have signed up. Please <?php echo anchor('login', 'Login')?>
    </fieldset>

     <div class="success_image">
     	 <?php echo anchor('/home','<img src="'.base_url().'image/logo.svg" alt="Delete" width="100" height="100" style="margin-left: 28px;"/>');?>
     </div>

     <div class="success_bp">
     	<p>
     		BlogPoster
     	</p>
     </div>
    </div>
</body>   
</html>