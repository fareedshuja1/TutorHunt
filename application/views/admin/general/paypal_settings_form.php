 <?php
      
 foreach ($result as $result_data) {
 $paypal_account = $result_data->paypal_account;
 $purchase_amount = $result_data->purchase_amount;
 } 
?>
                                             

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              
       <?php if($this->session->flashdata('msg')) { ?>      
              
                               <div class="alert alert-success fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <i class=""></i> <strong align="center"><?=$this->session->flashdata('msg');?> </strong>
                                </div>
       <?php } ?>
              
              
      <section class="panel">
          
          <header class="panel-heading"> <strong>PAYPAL SETTINGS </strong></header>
          
          <div class="panel-body">
              
              <form role="form" action="<?php echo base_url();?>WebAdmin/paypal_settings_query" method="post">
                 
                  <div class="row">
                 <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">PayPal (Business) Account ID <span style="color: red"> * </span></label>
                    <input name="paypal_account" class="form-control" id="exampleInputEmail1" autofocus required="required" value="<?php echo $paypal_account; ?>">
                </div>
                <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Purchase Amount (£)<span style="color: red"> * </span></label>
                    <input name="purchase_amount" onkeypress='return isNumberKey(event)' class="form-control" id="exampleInputEmail1" value="<?php echo $purchase_amount; ?>" autofocus required="required">
                </div>
                  </div>
                                
                  <button type="submit" class="btn btn-info" name="submit">SAVE SETTINGS</button>
            
            </form>
              
          </div>
          
      </section>
              
                <section class="panel">
          
          <header class="panel-heading"><strong> CURRENT SETTINGS</strong> </header>
          
          <div class="panel-body">
              
                        <div class="adv-table">
                                            
 <section id="no-more-tables">
     <table class="table table-bordered table-striped table-condensed cf" id="example">
                                      <thead class="cf">
                                      <tr>
                                          <th>ACCOUNT ID</th>
                                          <th>PURCHASE AMOUNT (£)</th>
                                         
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <td><?php echo $paypal_account; ?></td>
                                              <td><?php echo $purchase_amount; ?></td>
                                          </tr>
                                      </tbody>
                          </table>
 </section>
                                            
              
          </div>
               
          </div>
          
      </section>
              

              

          </section>
      </section>
 