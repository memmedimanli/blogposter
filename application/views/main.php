<?php $this->load->view('includes/header');?>
   
   <div class="container">
			<div class="col-lg-10">
			<fieldset>

    		   
				<form class="form-horizontal" role="form" id="post" action='<?= base_url();?>index.php/site/add_post' method="post">
				 <div class="form-group">				    
				    <div class="col-md-6 textarea_post" >
                       <textarea class="form-control" rows="3" name="context" id="context" placeholder="What's up?" required></textarea>
                     </div>
				  </div>	
				  <div class="form-group" id="post_submit" >
				    <div class="col-lg-offset-3 col-lg-10">
				      <button type="submit" class="btn btn-success">Post</button> 
				    </div>
				  </div>
				</form>

				<div >
					<?php foreach ($query as $row): ?>   
					 <div class="post_body">
					 <img src = "<?= base_url();?>image/buser.jpg" width="60" height="60">
					<div class="post_username">
					 	<font class="post_font">
					 	<?php
                         
					 	 echo $row->username;?>
					 	
					 	</font> <br/>
					 	 <?php echo $row->date;?><br>  
					 </div>
					 <div class="post_context">
					  <?php echo $row->context;?><br>
					  </div>
					 
                      <div>
                      <?php if($this->session->userdata('username')):?>
                      <div class="showarea_comment"> 
                      <a class="btn btn-primary showarea" type="button" post='<?=$row->post_id ?>' name="showarea" value="Show Textarea" >comment</a>
                      </div>
                      <?php endif;?>
                      <div class="textarea2">
                      <textarea class="textarea2" id='<?=$row->post_id ?>' rows="3" cols="50" name="comment_context"></textarea>
                      </div>  
                      
                      </div>
                      <div  id="<?=$row->post_id ?>" class='comment comment_body'>
					 	 
                         <?php 
   

    					  $q = $this->comment_model->getPostComment($row->post_id);

                         foreach ($q as $r): ?> 
                         <div class="comment_body">
                           <img src = "<?= base_url();?>image/buser.jpg" width="40" height="40">
                           <div class="comment_username">
                           	  <?php echo $r->username;?><br>
                           </div>

                           <div class="comment_date">
                           	   <p>
                           	   <?php echo $r->date;?><br>
                           	   </p>
                           </div>

                           <div class="comment_context">
					      <?php echo $r->context;?><br>
					      </div> 
					      </div>
					      <?php endforeach; ?> 
					 </div>
					 </div> 

					 
					   
                    <?php endforeach; ?>  

                    
                   
				</div>

				<?php echo $this->pagination->create_links();?>
			</fieldset>
        </div>
		</div>
</html>