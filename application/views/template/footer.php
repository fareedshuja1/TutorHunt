<footer id="footer">
<div class="container">
			<div class="row">
				<div class="col-sm-3 col-md-4">
					<div class="widget">
						<div class="widget-content">
							
                                                    <p style="">
                                                       <a href='http://coursesandtutors.co.uk/signup'><img src="<?=base_url();?>images/how.jpg" alt="" style=""></a>
                                                    </p>
						</div>
					</div>
				</div>

				<div class="col-sm-3 col-md-3">
					<div class="widget">
                                            <h5 class="widget-title"><strong><span style="color:#7aa3e6">POPULAR SUBJECTS</span></strong></h5>

						<div class="widget-content">
							
									<ul class="footer-links">
                                        <li><a href="<?=base_url();?>search-by-subject/15">AutoCad Tutors</a></li>
										<li><a href="<?=base_url();?>search-by-subject/495">PhotoShop Tutors</a></li>
										<li><a href="<?=base_url();?>search-by-subject/387">Maths Tutors</a></li>
										<li><a href="<?=base_url();?>search-by-subject/389">Physics Tutors</a></li>
										<li><a href="<?=base_url();?>search-by-subject/455">IELTS Tutors</a></li>
                                        <li><a href="<?=base_url();?>subjects"><span style="color:#7aa3e6">VIEW ALL SUBJECTS</span></a></li>
									</ul>
								
							
						</div>
					</div>
				</div>

				<div class="col-sm-3 col-md-3">
					<div class="widget">
                                            <h5 class="widget-title"><strong><span style="color:#7aa3e6">LANGUAGE CLASSES</span></strong></h5>

						<div class="widget-content">
							<ul class="footer-links">
								<li><a href="<?=base_url();?>search-by-subject/281">Spanish Classes</a></li>
								<li><a href="<?=base_url();?>search-by-subject/270">French Classes</a></li>
								<li><a href="<?=base_url();?>search-by-subject/623">Chinese Classes</a></li>
								<li><a href="<?=base_url();?>search-by-subject/283">Hindi Classes</a></li>
                                <li><a href="<?=base_url();?>search-by-subject/37">Arabic Classes</a></li>
                                <li><a href="<?=base_url();?>subjects"><span style="color:#7aa3e6">VIEW ALL CLASSES</span></a></li>

							</ul>
						</div>
					</div>
				</div>

				<div class="col-sm-3 col-md-2">
					<div class="widget">
                                            <h5 class="widget-title"><strong><span style="color:#7aa3e6">POPULAR LOCATIONS</span></strong></h5>

						<div class="widget-content">
							<ul class="footer-links">
								<li><a href="<?=base_url();?>search-by-location/1">Tutors in London</a></li>
								<li><a href="<?=base_url();?>search-by-location/15">Tutors in Bradford</a></li>
								<li><a href="<?=base_url();?>search-by-location/31">Tutors in Sheffield</a></li>
								<li><a href="<?=base_url();?>search-by-location/32">Tutors in Manchester</a></li>
                                                                <li><a href="<?=base_url();?>search-by-location/14">Tutors in Birmingham</a></li>
                                                                <li><a href="<?=base_url();?>locations"><span style="color:#7aa3e6">VIEW ALL LOCATIONS</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			 <hr>
    
                        <!-- Blogs Start -->
                        <div class="row">
                                <?php foreach ($blogs as $blogs) { ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="partners-item">
                                    <div class="img">
                                  <a href="<?=$blogs->blog_link;?>" target="_blank"> <img src="<?=base_url();?>blogs/<?=$blogs->blog_image;?>" alt="" style=""></a>
                                 
                                    </div>

                                    <div class="meta clearfix">
                                        <span><a href="<?=$blogs->blog_link;?>" target="_blank"><?=substr($blogs->blog_title, 0, 30);?>.....</a></span>
                                    </div>
                                    </div>
                                </div>
                               <?php } ?>

						
                        </div>
                        <!-- Blogs End -->
    
    
		</div>


				<div class="copyright">
			<div class="container">
				<p>All Rights Reserved | <a href="http://www.coursesandtutors.co.uk"> Courses And Tutors</a></p>

				<ul class="footer-social">
					<li><a href="https://www.facebook.com/coursesandtutors" target="_blank" class="fa fa-facebook"></a></li>
					<li><a href="https://twitter.com/coursestutors" target="_blank" class="fa fa-twitter"></a></li>
				</ul>
			</div>
		</div>
	</footer> <!-- end #footer -->


</div> <!-- end #main-wrapper -->

<!-- Scripts -->
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<script src="<?=base_url();?>assets/js/script2.js"></script>

<!--<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script>-->
<!--<script src="<?=base_url();?>assets/js/map.js"></script>-->


<script>window.jQuery || document.write('<script src="<?=base_url();?>assets/js/jquery-1.11.0.min.js"><\/script>')</script>

<script src="<?=base_url();?>assets/js/maplace.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.ba-outside-events.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.responsive-tabs.js"></script>
<script src="<?=base_url();?>assets/js/jquery.flexslider-min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.fitvids.js"></script>
<script src="<?=base_url();?>assets/js/jquery-ui-1.10.4.custom.min.js"></script>
<script src="<?=base_url();?>assets/js/jquery.inview.min.js"></script>
<script src="<?=base_url();?>assets/js/script.js"></script>

<script src="<?=base_url();?>assets/js/jquery.easytabs.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>assets/js/owl.carousel.js"></script>
<script src="<?=base_url();?>assets/js/job-board.js"></script>

<script src="<?=base_url();?>assets/js/jquery.responsive-tabs.js"></script>
<script src="<?=base_url();?>assets/js/jquery.ba-outside-events.min.js"></script>


<script src="<?=base_url();?>assets/js/jquery.js"></script>
<script src="<?=base_url();?>assets/js/jquery.validate.js"></script>

<script type="text/javascript" src="<?=base_url();?>admin/assets/ckeditor_old/ckeditor.js"></script>



        <script>
	$().ready(function() {

		$("#signupForm").validate({
			rules: {
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},

				agree: "required"
			},
			messages: {

				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy"
			}
		});
	});
	</script>
        
        <script>
	$().ready(function() {

		$(".createprofile").validate({
			rules: {
				fname: {
					required: true
				},
				lname: {
					required: true,
				},
                                address_line1: {
					required: true,
				},
                                postcode: {
					required: true,
				},
                                phone_mobile: {
					required: true,
				},
                                tut_ver_docs: {
                                        required: true,
                                },
			},
			messages: {

				fname: {
					required: "Please write your first name.",
				},
				lname: {
					required: "Please write your last name.",
				},
                                address_line1: {
					required: "Please write your address.",
				},
                                postcode: {
					required: "Please write your postcode.",
				},
                                phone_mobile: {
					required: "Please write your mobile phone number.",
				},
                                tut_ver_docs: {
					required: "Please upload a document to verify your identity. Image formats only.",
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy"
			}
		});
	});
	</script>
        
        
        <script>
	$().ready(function() {

		$(".changepassword").validate({
			rules: {
                                old_pass: {
					required: true,
				},
                                new_pass: {
                                        required: true,
                                },
			},
			messages: {

				old_pass: {
					required: "Please enter old password.",
				},
				new_pass: {
					required: "Please enter new password.",
				},
			}
		});
	});
	</script>
        
        
        
        <script>
	$().ready(function() {

		$(".sent_message_form").validate({
			rules: {
                                msg_subject: {
					required: true,
				},
                                msg_description: {
                                        required: true,
                                },
			},
			messages: {

				msg_subject: {
					required: "Please write the subject.     ",
				},
				msg_description: {
					required: "Please write the message.",
				},
			}
		});
	});
	</script>
        
        
        <!--<script>
          $(function() {
                $('.txtOnly').keydown(function(e) {
                  if (e.shiftKey || e.ctrlKey || e.altKey) {
                    e.preventDefault();
                  } else {
                    var key = e.keyCode;
                    if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                      e.preventDefault();
                    }
                  }
                });
              });
        
        </script>-->
        
        <script>
        $(function() {
        $(".txtOnly").keyup(function() {
        var $this = $(this);
        $this.val($this.val().replace(/[0-9]/g, ''));        
        });
        });
        </script>
        
        <script>
        function isNumberKey(evt)
        {
          var charCode = (evt.which) ? evt.which : event.keyCode;
          if ( charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
       </script>
       
       <script>
       function student_addsubj()
       {
       $("#add_subject_btn").show();
       var id = $("#mains_id").val();
       
       $.post("<?=base_url();?>Student_Controller/Std_Add_Sub_Subjs/", {id: id}, function(page_response)
       {
       $("#subs_subj").html(page_response);
       });
       }
       </script>
       
       <script>
       function tutormsgs()
       {
        var id = $(".tutmsgs").val();
            if(id === 'tut_inbox')
            {
             $(".tutinboxmsgs").show();
             $(".tutsentmsgs").hide();
            }

            if(id === 'tut_sent')
            {
             $(".tutsentmsgs").show();
             $(".tutinboxmsgs").hide();    
            }
       }
       
       </script>
              
       <script>
       function studentmsgs()
       {
        var id = $(".stdmsgs").val();
            if(id === 'std_inbox')
            {
             $(".stdinboxmsgs").show();
             $(".stdsentmsgs").hide();
            }

            if(id === 'std_sent')
            {
             $(".stdsentmsgs").show();
             $(".stdinboxmsgs").hide();    
            }
       }
       
       </script>
       

       <script>
       function search_subject()
       {
       var id = $(".mains_idd").val();
       
       $.post("<?=base_url();?>Student_Controller/Std_Add_Sub_Subjs/", {id: id}, function(page_response)
       {
       $(".subs_subjj").html(page_response);
       });
       }
       </script>
       
       <script>
       function search_subject2()
       {
       var id = $(".mains_iddd").val();
              
     $.post("<?=base_url();?>MainController/getsubsubjects/", {id: id}, function(page_response)
     {
     $(".subs_subjjj").html(page_response);
     });
       }
       </script>
       
       
       <script>
       
        //var forbiddenWords = ['Phone', 'Home', 'Address', 'Number', 'Postcode', 'fuck', 'email', 'call','n u m b e r',];
        
        //var forbiddenWordsString = <?php //foreach($restwords as $res) { echo "'" . $res->rest_word . "',"; } ?>;
        
        //var forbiddenWords = [forbiddenWords.substring(0, str.length - 1)]; // remove last comma
        
        var forbiddenWords = [<?php foreach($restwords as $res) { echo "'" . $res->rest_word . "',"; } ?>];
        
        $(function () {
        $('.msgbox').on('keyup', function(e) {
        forbiddenWords.forEach(function(val, index) {
          if (e.target.value.toUpperCase().indexOf(val.toUpperCase()) >= 0) {
              e.target.value = e.target.value.replace(new RegExp( "(" + val + ")" , 'gi' ), '');
          }
        });
      });
    });
            
        </script>



</body>
</html>