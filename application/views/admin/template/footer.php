
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url();?>admin/js/jquery.js"></script>
    <script src="<?=base_url();?>admin/js/jquery-1.8.3.min.js"></script>
    <script src="<?=base_url();?>admin/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>admin/js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript" ></script>
    <script src="<?=base_url();?>admin/js/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url();?>admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?=base_url();?>admin/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?=base_url();?>admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?=base_url();?>admin/js/owl.carousel.js" ></script>
    <script src="<?=base_url();?>admin/js/jquery.customSelect.min.js" ></script>
    <script src="<?=base_url();?>admin/js/respond.min.js" ></script>
    
    
    <script src="<?=base_url();?>admin/assets/jquery-knob/js/jquery.knob.js"></script>

    <!--common script for all pages-->
    <script src="<?=base_url();?>admin/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="<?=base_url();?>admin/js/sparkline-chart.js"></script>
    <script src="<?=base_url();?>admin/js/easy-pie-chart.js"></script>
    <script src="<?=base_url();?>admin/js/count.js"></script>
    
    <script type="text/javascript" src="<?=base_url();?>admin/js/jquery.validate.min.js"></script>

    <script src="<?=base_url();?>admin/js/form-validation-script.js"></script>
    
    <script type="text/javascript" src="<?=base_url();?>admin/assets/ckeditor/ckeditor.js"></script>

    <script type="text/javascript" language="javascript" src="<?=base_url();?>admin/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?=base_url();?>admin/assets/data-tables/DT_bootstrap.js"></script>
            
    <script src="<?=base_url();?>admin/assets/fancybox/source/jquery.fancybox.js"></script>
    <script src="<?=base_url();?>admin/js/modernizr.custom.js"></script>
    <script src="<?=base_url();?>admin/js/toucheffects.js"></script>
    
            <script type="text/javascript" src="<?=base_url();?>admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>




    <script>
        
    $(".knob").knob();

    </script>
    
    
    <!--script for this page only-->

      <script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#example').dataTable({
                  "aaSorting": [[ 4, "desc" ]]
              });
          });
      </script> 
    
      
      <script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#example22').dataTable( {
                  "aaSorting": [[ 4, "desc" ]]
              } );
          } );
      </script> 
    
  <script>
      
      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  
  
    
    <script type="text/javascript">
    $(function() {
      jQuery(".fancybox").fancybox();
    });
    </script>
    
    
       <script>
    function ShowFormFields() 
    {
    var id = $("#countt").val();
    $.post("<?=base_url();?>WebAdmin/show_subs_form/", {id: id}, function(page_response)
    {
      $("#tbll").html(page_response);
      $("#tbll").show();
      $("#submitbutton").show();
    });
    }
        
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
    
    
      
  </body>
</html>
