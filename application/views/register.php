<?php $this->load->view('includes/header');?>
   
   <div class="container" style="margin: 73px 173px 173px 138px;">
			<div class="col-lg-10">
			<fieldset>

    		<h3 style="text-align: center;" >Registration Form!</h3> <br/>
    		    
				<form class="form-horizontal" role="form" action='<?= base_url();?>index.php/registration/add' method="post">
				 <div class="form-group">
				    <label for="firstname" class="col-lg-3 control-label">First Name:</label>
				    <div class="col-lg-6">
				      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
				    </div>
				  </div>	
				  <div class="form-group">
				    <label for="lastname" class="col-lg-3 control-label">Last Name:</label>
				    <div class="col-lg-6">
				      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
				    </div>
				  </div>	
				  <div class="form-group">
				    <label for="username" class="col-lg-3 control-label">Username:</label>
				    <div class="col-lg-6">
				      <input type="text" class="form-control" name="username" id="username" placeholder="Username">
				    </div>
				  </div>	
				  <div class="form-group">
				    <label for="password" class="col-lg-3 control-label">Password: </label>
				    <div class="col-lg-6">
				      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="password_confirm" class="col-lg-3 control-label">Password Confirm: </label>
				    <div class="col-lg-6">
				      <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Password Confirm">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-lg-offset-3 col-lg-10">
				      <button type="submit" class="btn btn-success">Sign in</button> 
				    </div>
				  </div>
                   
				</form>
				<?php
				if (validation_errors()) {
                   echo '<div class="alert alert-danger" id="alert" role="alert"><a href="#" class="alert-link">'
                    . validation_errors() . ' </a></div>';
                } 
                ?>
			</fieldset>
        </div>
		</div>
</html>