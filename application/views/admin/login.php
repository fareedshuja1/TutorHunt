<?php if ($this->session->userdata('admin_id') && $this->session->userdata('admin_email')) { 
    
    redirect(base_url() . 'WebAdmin/webadministrator');
}
?>

<?php if($this->session->flashdata('msg')){ ?>

    <div class="alert alert-danger fade in">

	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

	<i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?></strong>

	</div>

<?php } ?>

<form class="form-signin" action="<?php echo base_url();?>WebAdmin/admin_login" method="post">
    
        <h2 class="form-signin-heading">Administration Login</h2>
    
        <div class="login-wrap">
            
            <input type="text" class="form-control" placeholder="Enter Email" autofocus name="email" required="required">
            
            <input type="password" class="form-control" placeholder="Enter Password" name="password" required="required">
            
            <button class="btn btn-lg btn-login btn-block" type="submit" name="submit">Sign in</button>


        </div>

</form>

   

