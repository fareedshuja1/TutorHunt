<?php  
foreach ($tot_stds as $stds)
{
$std_count = $stds->stdtotal;

$add_z = str_pad($std_count,4,'0', STR_PAD_LEFT);

$std_count2 = str_split($add_z, 1);
}


foreach ($tot_tuts as $tuts)
{
$tut_count = $tuts->tuttotal;

$add_ze = str_pad($tut_count,4,'0', STR_PAD_LEFT);

$tut_count2 = str_split($add_ze, 1);


}
?>


	<div class="header-banner">
	    <div class="container">
		<div class="row">
  		    <div class="col-sm-6">
			<div class="header-banner-box register">
  			    <div class="counter-container">
				<!--<ul class="counter clearfix">
                                <?php
                               // foreach ($tut_count2 as $tuts)
                            //    {
                             //   echo "<li>".$tuts."</li>" ;
                              //  }
                                ?>
                                    <li>0</li>
                                    <li>2</li>
                                    <li>1</li>
                                    <li>9</li>
				</ul>-->

			    <div><span></span></div>
			    </div>

                            <a href="<?=base_url();?>signup" class="btn btn-default">Start Teaching</a>
			</div>
		    </div>

	<div class="col-sm-6">
	    
            <div class="header-banner-box post-job">
		<div class="counter-container">
		    
                 <!--   <ul class="counter clearfix">
                        <?php
                       // foreach ($std_count2 as $stds)
                    //    {
                      //  echo "<li>".$stds."</li>";
                    //    }
                        ?>
                        
                         <li>0</li>
                                    <li>3</li>
                                    <li>1</li>
                                    <li>7</li>
		    </ul>-->

		<div><span></span></div>
		</div>

		<a href="<?=base_url();?>signup" class="btn btn-red">Start Learning</a>
            </div>
	
        </div>
                    
                    
				</div>
			</div>
		</div> <!-- end .header-banner -->
        