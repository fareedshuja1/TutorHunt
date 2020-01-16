 <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              
       <?php if($this->session->flashdata('msg')) { ?>      
              
                        <?php if ($this->session->flashdata('msg') == 1) { ?>

                                <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Word Already Exists. </strong>
                                </div>

                        <?php } elseif($this->session->flashdata('msg') == 2) { ?>

                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center">Record Added Successfully. </strong>
                                </div>

                        <?php } else { ?>
              
                                <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
              
                        <?php }?>
         
       <?php } ?>
              
              
      <section class="panel">
          
          <header class="panel-heading"> <strong>ADD RESTRICTED WORD </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/restricted_words_query" method="post">
                 
                <div class="form-group">
                    <label for="exampleInputEmail1">Word <span style="color: red"> * </span></label>
                    <input name="rest_word" class="form-control" id="exampleInputEmail1" autofocus required="required">
                </div>
                                
                  <button type="submit" class="btn btn-info" name="submit">ADD</button>
            
            </form>
              
          </div>
          
      </section>
              

              
              <section class="panel">
          
          <header class="panel-heading"><strong> LIST OF WORDS</strong> </header>
          
          <div class="panel-body">
              
                        <div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                          <th>WORD</th>
                                          <th>DELETE </th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php
                                          foreach ($result as $result_data) { ?>
                                          
                                          <tr>
                                          <td><?=$result_data->rest_word;?></td>
                                          <td><a class='btn btn-danger' href='<?=base_url();?>WebAdmin/delete_rest_word/<?=$result_data->rest_word_id; ?>'>DELETE</a></td>
                                          </tr>
                                          
                                          <?php } ?>
                                            
                              </tbody>
                          </table>
              
          </div>
               
          </div>
          
      </section>
              

          </section>
      </section>
 
