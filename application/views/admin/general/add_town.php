 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

                     <?php if($this->session->flashdata('msg')) { ?>      
              
                        <?php if ($this->session->flashdata('msg') == 1) { ?>

                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Town Added Successfully. </strong>
                                </div>

                        <?php } elseif($this->session->flashdata('msg') == 2) { ?>

                                <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Town Name Already Exists. </strong>
                                </div>

                        <?php } else { ?>
              
                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
              
                        <?php }?>
         
       <?php } ?>
              
      <section class="panel">
          
          <header class="panel-heading"> <strong>ADD TOWN </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/create_town_query" method="post">
                                 <div class="table-responsive">

                <table width="80%" border="0" cellpadding='10' cellspacing='10'> 
                <tr>
                <td style="padding: 15px">
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Country <span style="color: red"> * </span></label>
                    <select class="form-control m-bot15" name="country_id" style="color: #000">
                    <?php
                        foreach($countries as $countries)
                        {
                            echo "<option value='$countries->country_id'>$countries->country_name</option>";
                        }
                       ?>                    
                    </select>
                </div>
                </td>

                <td style="padding: 10px">
                <div class="form-group">
                    <label for="exampleInputEmail1">Town Name <span style="color: red"> * </span></label>
                    <input name="town_name" class="form-control" id="exampleInputEmail1" required="required">
                </div>
                </td>
                </tr>
                </table>
                                 </div>
                  <button type="submit" class="btn btn-info" name="submit">Add Town</button>
            
            </form>
              
          </div>
          
      </section>
              

              
              <section class="panel">
          
          <header class="panel-heading"><strong> List of all Town</strong> </header>
          
          <div class="panel-body">
              
                        <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>Town</th>
                                          <th>EDIT </th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      
                                      <?php 
                                      foreach($result as $sc) { ?>
                                          <tr>
                                          <td><?php echo $sc->town_name; ?></td>
                                          <td><a class='btn btn-info' data-toggle="modal" href="#myModal2" onClick="Edit_Town('<?=$sc->town_id; ?>')">EDIT</a></td>
                                     <?php } ?>  
                              </tbody>
                          </table>
              
          </div>
               
          </div>
          
      </section>
              
<!-- Modal -->
                              <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Edit Town</h4>
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
 function Edit_Town(id){
     
  $.post("<?=base_url();?>WebAdmin/Edit_Town/", {id: id}, function(page_response)
  {
  $(".modal-body").html(page_response);
  });
  
 }
</script>