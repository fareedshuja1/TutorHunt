
		<div class="header-page-title">
			<div class="container">
				<h1>User Login</h1>
			</div>
		</div>

     <div id="page-content">
	<div class="container">
	    <div class="row">
                
                 
                
<!-- PAGE MIDDLE CONTENT START -->                          
<div class="col-sm-8 page-content">
    
			            
             <!-- PANEL 1 STARTS -->
            <div class="title-lines"> <h3 class="mt0"> Please Login</h3> </div>
                                     
            <div class="latest-jobs-section white-container">
                
            <?php if($this->session->flashdata('msg')) { ?>      
                <div class="alert alert-success" style="color: #FFF">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                    </div>
            <?php } ?>
                                        
                <form class="form-inline" method="post" role="form" action="<?=base_url();?>MainController/User_Login">
   
                         <div class="row">
                         <div class="form-group singup-form">
                             
                         <label for="email">Enter Email:</label> <span class="required_star">  *</span><br>
                         <input id="" class="form-control" name="user_email" style="width:80%" type="email" autofocus>
                         </div>
                         </div>
                                     
                    
                    
                         <div class="row">
                         <div class="form-group singup-form">
                         <label for="password">Enter Password:</label> <span class="required_star">  *</span><br>
                         <input type="password" id="" class="form-control" name="user_password" style="width:80%">
                         </div>
                         </div>
                        
                    
                    
                         <div class="row">
                         <div class="form-group singup-form">
   <button type="submit" class="btn btn-info" name="user_submit">Login</button> &nbsp;&nbsp; <a href="<?=base_url();?>forget-password">Forget Password</a>
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

	