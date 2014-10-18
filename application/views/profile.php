<?php $this->load->view('includes/header');?>
   
                
    	<div>
    		<div class="profile_picture">
    			<img src="<?= base_url();?>image/buser.jpg" width="150" height="150">
    		</div>
    		<div class="profile_main_username">
    			<font >
					 	<?php
                         
					 	 echo $this->session->userdata('username');
					 	 ?>					 	
				</font>

				<p>
				   Another BlogPoster user!!!
				</p>
    		</div>
    	</div>

    	<div>
    	    <div class="my_posts">
    	    	<h3> My Posts </h3>
    	    </div>
    	    
					<?php foreach ($query as $row): ?>   
					 <div class="profile_body">
					  <img src="<?= base_url();?>image/buser.jpg" width="50" height="50">
					<div class="profile_username">
					 	
					 	<font >
					 	<?php
                         
					 	 echo $row->username;?>
					 	
					 	</font> <br/>
					 	 <?php echo $row->date;?><br>  
					 </div>
					 <div class="profile_context">
					  <?php echo $row->context;?><br>
					  </div>

				     <div>
                      <div class="showarea_comment"> 
                      <a class="btn btn-primary showarea" type="button" post='<?=$row->post_id ?>' name="showarea" value="Show Textarea" >Comment</a>
                      </div>
                      
                      <div class="profile_delete_button">                       
                       <a class="btn btn-danger delete" type="button" post="<?=$row->post_id?>" style="margin-bottom: 32px;" > Delete </a>        
                      </div>                        

                      <div class="textarea2">
                      <textarea class="textarea2"  id='<?=$row->post_id ?>' rows="3" cols="50" name="comment_context"></textarea>
                      </div>  

    
                      </div>

                     

                       <div  id="<?=$row->post_id ?>" class='comment'>
					 	 
                         <?php 
    					           $q = $this->comment_model->getPostComment($row->post_id);

                         foreach ($q as $r): ?> 
                         <div class="comment_body">
                           <img src = "<?= base_url();?>image/buser.jpg" width="40" height="40">
                           <div class="profile_comment_username">
                           	  <?php echo $r->username;?><br>
                           </div>

                           <div class="profile_comment_date">
                           	   <p >
                           	   <?php echo $r->date;?><br>
                           	   </p>
                           </div>

                           <div class="profile_comment_context">
					                  <?php echo $r->context;?><br>
					                 </div> 
					               </div>
					      <?php endforeach; ?> 
					              </div>

					 </div> 

                     
                    <?php endforeach; ?>  
                   <?php echo $this->pagination->create_links();?>
				</div>
                  
	   
		
</html>