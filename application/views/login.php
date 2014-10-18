<?php $this->load->view('includes/header');?>
   
   <div class="container">
			<div class="col-lg-10">
			<fieldset>
         
    		<h3>Welcome to BlogPoster!</h3>
    		    <h5 > Please login </h5> <br/>
				<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/Clogin/validate' method="post">
				 <div class="form-group">
				    <label for="username" class="col-lg-3 control-label">Username</label>
				    <div class="col-lg-6">
				      <input type="text" class="form-control" name="username" id="username" placeholder="Username">
				    </div>
				  </div>	
				  <div class="form-group">
				    <label for="password" class="col-lg-3 control-label">Password</label>
				    <div class="col-lg-6">
				      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
				    </div>
				  </div>
				  <?php echo anchor('register', 'Don`t you have an account? Then register', array('class' => 'login_register'))?> <br/><br/>
				  <div class="form-group">
				    <div class="col-lg-offset-3 col-lg-10">
				      <button type="submit" class="btn btn-success">Login</button> 
				    </div>
				  </div>

				</form>
				<?php
				if (validation_errors()) {
                   echo '<div class="alert alert-danger" role="alert"><a href="#" class="alert-link">'
                    . validation_errors() . ' </a></div>';
                } 
                ?>
				
                
           
			</fieldset>
        </div>
		</div>
</html>