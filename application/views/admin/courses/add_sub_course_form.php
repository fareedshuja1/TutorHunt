 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

                     <?php if($this->session->flashdata('msg')) { ?>      
              
                        <?php if ($this->session->flashdata('msg') == 1) { ?>

                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Course Added Successfully. </strong>
                                </div>

                        <?php } elseif($this->session->flashdata('msg') == 2) { ?>

                                <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Course Deleted Successfully. </strong>
                                </div>

                        <?php } else { ?>
              
                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
              
                        <?php }?>
         
       <?php } ?>
              
      <section class="panel">
          
          <header class="panel-heading"> <strong>ADD SUB COURSE </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/create_sub_course" method="post">
                 
                  <div class="row">
                      
                <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Select Main Course <span style="color: red"> * </span></label>
                    <select class="form-control m-bot15" name="mains_id" style="color: #000">
                       <option value="" disabled="disabled">Select Main Course</option>
                    <?php
                        foreach($result as $result)
                        {
                            echo "<option value='$result->mains_id'>$result->mains_title</option>";
                        }
                       ?>                    
                    </select>
                </div>
                
                <div class="form-group col-sm-6">
                    <!--<label for="exampleInputEmail1">Sub Course Title <span style="color: red"> * </span></label>
                    <input name="subs_title" class="form-control" id="exampleInputEmail1" placeholder="PHP, AutoCad, Algebra, Calculas" required="required">-->
                    
                    <label for="exampleInputEmail1">Enter No. of Courses you want to add <span style="color: red"> * </span></label>
                    <input name="countt" class="form-control" id="countt" required="required" onkeyup="ShowFormFields();">
                </div>
               
                <div class="row">
                <div class="form-group col-sm-12">
                <table width="50%" cellspacing="10"  style="position:relative; display:none; margin-left: 20px;" id="tbll">
                </table>
                </div>
                </div>
                
                      <div class="row" style="display: none" id="submitbutton"><div class="form-group col-sm-12" style=" margin-left: 20px">
                  <button type="submit" class="btn btn-info" name="submit">Add Courses</button>
                  </div></div>
                      
                      
                  </div>
            </form>
              
          </div>
          
      </section>
              

              
              <section class="panel">
          
          <header class="panel-heading"><strong> List of all Sub Courses</strong> </header>
          
          <div class="panel-body">
              
                        <div class="adv-table">
                                           

                                    <section id="no-more-tables">
<table class="table table-bordered table-striped table-condensed cf"  id="example">
                                      <thead class="cf">
                                      <tr>
                                          <th>Main Course Title</th>
                                          <th>Sub Course Title</th>
                                          <th>EDIT </th>
                                          <th> </th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      
                                      <?php 
                                      foreach($subc as $sc) { ?>
                                          <tr>
                                          <td data-title="Main Course"><?php echo $sc->mains_title; ?></td>
                                          <td data-title="Sub Course"><?php echo $sc->subs_title; ?></td>
                                          <td data-title="EDIT"><a class='btn btn-info' data-toggle="modal" href="#myModal2" onClick="Edit_Sub_Course('<?=$sc->subs_id; ?>')">EDIT</a></td>
                                          <td data-title="DELETE"><a class='btn btn-danger' href='<?=base_url();?>WebAdmin/Delete_SubSubject/<?=$sc->subs_id; ?>'>DELETE</a></td>
                                     <?php } ?>  
                              </tbody>
                          </table>
                                    </section>
                                            
              
          </div>
               
          </div>
          
      </section>
              
<!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Edit Course Details</h4>
                                          </div>
                                          <div class="modal-body">

                                             

                                          </div>
                                          
                                      </div>
                                  </div>
                              </div>
                              <!-- modal -->

          </section>
      </section>
 
 
  <script>
 function Edit_Sub_Course(id){
     
  $.post("<?=base_url();?>WebAdmin/Edit_Sub_Course/", {id: id}, function(page_response)
  {
  $(".modal-body").html(page_response);
  });
  
 }
</script>