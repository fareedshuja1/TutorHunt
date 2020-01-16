 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              
       <?php if($this->session->flashdata('msg')) { ?>      
              
                        <?php if ($this->session->flashdata('msg') == 1) { ?>

                                <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Course Already Exists. </strong>
                                </div>

                        <?php } elseif($this->session->flashdata('msg') == 2) { ?>

                                <div class="alert alert-info fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Course Added Successfully. </strong>
                                </div>

                        <?php } else { ?>
              
                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
              
                        <?php }?>
         
       <?php } ?>
              
              
      <section class="panel">
          
          <header class="panel-heading"> <strong>ADD MAIN COURSE </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/create_main_course" method="post">
                 
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Title <span style="color: red"> * </span></label>
                    <input name="mname" class="form-control" id="exampleInputEmail1" autofocus placeholder="IT, HR, BUSINESS, ENGINEERING" required="required">
                </div>
                                
                  <button type="submit" class="btn btn-info" name="submit">Create Main Course</button>
            
            </form>
              
          </div>
          
      </section>
              

              
              <section class="panel">
          
          <header class="panel-heading"><strong> LIST OF ALL Main Courses</strong> </header>
          
          <div class="panel-body">
              
                        <div class="adv-table">
                                            
 <section id="no-more-tables">
     <table class="table table-bordered table-striped table-condensed cf" id="example">
                                      <thead class="cf">
                                      <tr>
                                          <th>Course Title</th>
                                          <th>Number of Sub Courses</th>
                                          <th>Visibility to User</th>
                                          <th>Action </th>
                                          <th>Edit </th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                          foreach ($result as $result_data) {
                                          echo "<tr>";
                                          echo "<td data-title='Course Title'>$result_data->mains_title</td>";
                                          echo "<td data-title='No. of Sub Courses'>$result_data->tot</td>";
                                          echo "<td data-title='Visibility to User'>$result_data->mains_visibility</td>";
                                          
                                          if($result_data->mains_visibility == 'VISIBLE') { ?>
                                          <td><a class='btn btn-warning' href='<?=base_url();?>WebAdmin/Hide_Main_Subject/<?=$result_data->mains_id; ?>'>HIDE</a> </td>
                                          <?php } else { ?>
                                          <td><a class='btn btn-success' href='<?=base_url();?>WebAdmin/Show_Main_Subject/<?=$result_data->mains_id; ?>'>SHOW</a></td>
                                          <?php } ?>
                                          
                                          
                                          <td><a class='btn btn-info' data-toggle="modal" href="#myModal2" onClick="Edit_Main_Course('<?=$result_data->mains_id; ?>')">EDIT</a></td>
                                          </tr>
                                          <?php }
                                          ?>
                                            
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
                                              <h4 class="modal-title">Edit Course Title</h4>
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
 function Edit_Main_Course(id){
     
  $.post("<?=base_url();?>WebAdmin/Edit_Main_Course/", {id: id}, function(page_response)
  {
  $(".modal-body").html(page_response);
  });
  
 }
</script>