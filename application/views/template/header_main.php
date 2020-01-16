<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>
            <?php             
            if($title !== '')
            {
                echo $title;
            } else {
                echo "Courses And Tutors - London";
            }
            ?>
        </title>
        
        <meta name="keywords" content="courses tutor london, maths tutors, maths chemistry physics private lessons, business private lessons, 
              accounting IT software training, photoshop training, 3ds max training in london, php python java training, web development training in london, IT short courses , 
              London project management , business courses, london history courses ,art short courses , london short courses,java c++ c-sharp lesson in london, 
              adobe photoshop fireworks dreamweaver lesson in london,abode training courses, finance london classes, home economics london classes, economics london, maths training london,
              bollywoord break dancing training london,photoshop training london,maya training london, sketchup training london,joomla training london,unity 3d training london,
              aftereffects training london,vray training london,3dsmax lesson london,autocad lesson london,photoshop lesson london,maya lesson london, 
              human resource lesson london,project management lesson london,general science lesson london,aftereffects lesson london,architecture lesson london,architecture course london,
              interior design course london,interior design course london, course london, find tutors in london birmingham manchester,joomla course london,unity 3d course london">
              
                            	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

              
	<!-- Stylesheets -->
	
        <!--<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>-->
        <link rel='stylesheet' type='text/css' href='<?=base_url();?>assets/css/style2.css'>
	
        
        <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/flexslider.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/responsive.css">
        
        <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
        <!--<link rel="stylesheet" type='text/css' href="<?=base_url();?>assets/css/bootstrap2.css">-->
        
        <!-- Latest compiled and minified CSS -->
        <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">-->
        <link rel="stylesheet" type='text/css' href="<?=base_url();?>assets/css/bootstrap3.css">
        
        	<!-- fonts -->
        <link href='http://fonts.googleapis.com/css?family=Nunito:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
	<link href='font-awesome/css/font-awesome.css' rel="stylesheet" type="text/css">
	<!-- fonts -->
        
        
    <link href="<?=base_url();?>assets/css/owl.carousel.css" rel="stylesheet">
    <link href="<?=base_url();?>assets/css/owl.theme.css" rel="stylesheet">
    
    <link href="<?=base_url();?>admin/css/table-responsive.css" rel="stylesheet" />
    
    <!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?4GRgNynX9mr0SaGunxpOOarfy9n96L9E";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->

</head>

<body>
<div id="main-wrapper">

	<header id="header" class="header-style-1">
		<div class="header-top-bar">
			<div class="container">

				<!-- Header Language -->
				<div class="header-language clearfix">
					<ul>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
					</ul>
				</div> <!-- end .header-language -->

				<!-- Bookmarks -->
				<a href="#" class="btn btn-link bookmarks"></a>

                                
                                <?php if($this->session->userdata('login_email')) { ?>
                                
                                
                                                <?php if($this->session->userdata('student_id')) { ?>
                                
                                                        <div class="" style="float: right">
                                                        <a href="<?=base_url();?>student-panel" class="btn btn-link">My Account</a>
                                                        <a href="<?=base_url();?>student-logout" class="btn btn-link">Logout</a>
                                                        </div> 
                                
                                                <?php } else if($this->session->userdata('tutor_id')) { ?>
                                
                                                      <div class="" style="float: right">
                                                      <a href="<?=base_url();?>tutor-panel" class="btn btn-link">My Account</a>
                                                      <a href="<?=base_url();?>tutor-logout" class="btn btn-link">Logout</a>
                                                      </div> 
                                
                                                <?php } else { ?>
                                
                                                      <div class="" style="float: right">
                                                      <a href="<?=base_url();?>MainController/Front_User_Logout" class="btn btn-link">Logout</a>
                                                      </div>
                                
                                                <?php } ?>
                                
                              
                                <?php } else { ?>
                                
                                
                                
				<!-- Header Login -->
				<div class="header-login">
					<a href="#" class="btn btn-link">Login</a>
					<div>
                                            <form action="<?=base_url();?>MainController/User_Login" method="post">
                                                <input type="text" class="form-control" autofocus name="user_email" placeholder="Email">
							<input type="password" name="user_password" class="form-control" placeholder="Password">
                                                        <input type="submit" name="user_submit" class="btn btn-default" value="Login">
						<a href="<?=base_url();?>forget-password" style="color:#fff">Forget Password</a>
						</form>
					</div>
				</div> 
                                <!-- end .header-login -->
                                
                                <?php } ?>
                                
                                
                                
                                
                                
                                

			</div> <!-- end .container -->
		</div> <!-- end .header-top-bar -->

		<div class="header-nav-bar">
			<div class="container">

				<!-- Logo -->
				<div class="css-table logo">
					<div class="css-table-cell">
						<a href="<?=base_url();?>index">
							<img src="<?=base_url();?>images/logo/logo.png" alt="">
						</a> <!-- end .logo -->
					</div>
				</div>

				<!-- Mobile Menu Toggle -->
				<a href="#" id="mobile-menu-toggle"><span></span></a>

				<!-- Primary Nav -->
				<nav>
					<ul class="primary-nav">
						<li class="active"><a href="<?=base_url();?>index">Home</a></li>
						<li><a href="<?=base_url();?>faqs">FAQs</a></li>
						<?php if(!$this->session->userdata('login_email')) { ?>
                        <li><a href="<?=base_url();?>signup">Register</a></li>
                        <?php } ?>
                        <li><a href="<?=base_url();?>resources">Resources</a></li>
                        <li><a href="<?=base_url();?>contact">Contact Us</a></li>
					</ul>
				</nav>
			</div> <!-- end .container -->

			<div id="mobile-menu-container" class="container">
				<div class="login-register"></div>
				<div class="menu"></div>
			</div>
		</div> <!-- end .header-nav-bar -->

		<div class="header-search-bar">
		   <div class="container">
                    
                    <form class="form-inline" role="form" method="post" action="<?=base_url();?>MainController/main_search_form_result">
   
                    <div class="row">
                        
                        <div class="form-group col-sm-3">
                          <label for="email" style="color: #5bc0de">Category:</label><br> 
                           <select class="form-control mains_idd" name="mains_id" id="" onchange="search_subject();">
		              <option value="">Select Category  </option>
				<?php
                                foreach($main_subjs as $ms)
                                {
                                    echo "<option value='$ms->mains_id'>$ms->mains_title</option>";
                                }
                                ?>
			</select>
                        </div>
  
                        
                        <div class="form-group col-sm-3">
                            
                        <label for="email" style="color: #5bc0de">Courses:</label><br>
                        <select class="form-control subs_subjj" name="subs_id" id="">
			<?php
                        foreach($sub_subjs as $ss)
                        {
                        echo "<option value='$ss->subs_id'>$ss->subs_title</option>";
                        }
                        ?>
			</select>
                          
                        </div>
                        
                        
                        <div class="form-group  col-sm-2">
                            <label for="email" style="color: #5bc0de">City:</label><br>
                        <select class="form-control"  name="town_id"  style="width: 100%">
                        <?php
                        foreach($town_list as $tl)
                        {
                        echo "<option value='$tl->town_id'>$tl->town_name</option>";
                        }
                        ?>

			</select>
                        </div>
                    
                    
                        <div class="form-group col-sm-2">
                         <label for="email" style="color: #5bc0de">Looking For:</label><br>
                        <select class="form-control" name="search_account_type" style="width: 100%"> 
                        <option value="SEARCH_TUTOR">Tutors</option>
			<option value="SEARCH_STUDENT">Students</option>
			
			</select>
			<input type="hidden" name="postcode">
                        </div>
                    
                        
                        <!--<div class="form-group col-sm-2">
                        <label for="email" style="color: #5bc0de">Post Code:</label><br>
                        <input type="text" class="form-control" name="postcode">
                        </div>-->
                        
                        
                        <div class="form-group col-sm-2">
                            <label for="email"> </label><br>
                            <button type="submit" class="btn btn-info" style="margin-left: 20px;" onclick="if(!$('.mains_idd').val()) { alert('Please choose a main category!'); return false; }">Search</button>
                        </div>
                    
                    </div>
                    
            </form>

			</div>
		</div> <!-- end .header-search-bar -->

	</header> <!-- end #header -->