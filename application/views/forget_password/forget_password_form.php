
		<div class="header-page-title">
			<div class="container">
				<h1>Forget Password</h1>
			</div>
		</div>

     <div id="page-content">
	<div class="container">
	    <div class="row">
                
                 
                
<!-- PAGE MIDDLE CONTENT START -->                          
<div class="col-sm-8 page-content">
    
			            
             <!-- PANEL 1 STARTS -->
                                     
            <div class="latest-jobs-section white-container">
                
            <?php if($this->session->flashdata('msg')) { ?>      
                <div class="alert alert-success" style="color: #FFF">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                    </div>
            <?php } ?>
                                        
                <form class="form-inline" method="post" role="form" action="<?=base_url();?>Emails/forget_password_query">
   
                         <div class="row">
                         <div class="form-group singup-form">
                             
                         <label for="email">Please Enter Your Email:</label> <span class="required_star">  *</span><br>
                         <input id="" class="form-control" name="user_email" style="width:80%" type="email" autofocus>
                         </div>
                         </div>
                          
                         <div class="row">
                         <div class="form-group singup-form">
                    <button type="submit" class="btn btn-info" name="user_submit">Submit</button> 
                         </div>
                         </div>
                    
                         </form>
    
                                        
	    </div> 
       <!-- PANEL 1 ENDS -->
                                    
 </div> 
<!-- PAGE MIDDLE CONTENT END -->
                                
                                
                                
                        
                                
   	    
            </div>
	</div> <!-- end .container -->
    </div> <!-- end #page-content -->

	