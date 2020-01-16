 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              
       <?php if($this->session->flashdata('msg')) { ?>      
              
                        <?php if ($this->session->flashdata('msg') == 1) { ?>

                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Level Added Successfully. </strong>
                                </div>

                        <?php } elseif($this->session->flashdata('msg') == 2) { ?>

                                <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Record Deleted Successfully. </strong>
                                </div>

                        <?php } else { ?>
              
                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
              
                        <?php }?>
         
       <?php } ?>
              
              
      <section class="panel">
          
          <header class="panel-heading"> <strong>ADD SUBJECT LEVEL </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/create_subject_level" method="post">
                 
                <div class="form-group">
                    <label for="exampleInputEmail1">Level Name <span style="color: red"> * </span></label>
                    <input name="sub_level_title" class="form-control" id="exampleInputEmail1" autofocus placeholder="Beginner, Advance, Intermediate" required="required">
                </div>
                                
                  <button type="submit" class="btn btn-info" name="submit">ADD</button>
            
            </form>
              
          </div>
          
      </section>
              

              
              <section class="panel">
          
          <header class="panel-heading"><strong> LIST OF ALL LEVELS</strong> </header>
          
          <div class="panel-body">
              
                        <div class="adv-table">
                                            <div class="table-responsive">

                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>TITLE</th>
                                          <th>EDIT </th>
                                          <th>DELETE </th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                          foreach ($result as $result_data) { ?>
                                          
                                          <tr>
                                          <td><?=$result_data->sub_level_title;?></td>
                                          <td><a class='btn btn-info' data-toggle="modal" href="#myModal2" onClick="Edit_Level('<?=$result_data->sub_level_id; ?>')">EDIT</a></td>
                                          <td><a class='btn btn-danger' href='<?=base_url();?>WebAdmin/Delete_Level/<?=$result_data->sub_level_id; ?>'>DELETE</a></td>
                                          </tr>
                                          
                                          <?php } ?>
                                            
                              </tbody>
                          </table>
                                            </div>
          </div>
               
          </div>
          
      </section>
              
<!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">EDIT LEVEL</h4>
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
 function Edit_Level(id){
     
  $.post("<?=base_url();?>WebAdmin/Edit_Level/", {id: id}, function(page_response)
  {
  $(".modal-body").html(page_response);
  });
  
 }
</script>