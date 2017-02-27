<?php include '../config/db_confg.php'; ?>
<?php   session_start();    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title >Lassana Events | Tempory Reservation </title>
    </head>

    <body>
        <div id="body-bg">

            <!-- === HEADER  === -->
            <?php include 'pageheader.php'; ?>   
            <div class="container ">
            <div id="back">

            <!-- === START CONTENT  === -->        
                <div style="margin-top:15px;" class="row">
                <div class="col-md-12">
                <div class="panel-body">
                <?php
                    // print table heads//
                    echo ('<div class="table-responsive"><table border=1 class="table table-bordered" >
                                    <thead style="background-color:#656565;color:#ffffff;">
                                    <tr>
                                        <th>Res_ID</th>
                                        <th>Cus_Name</th>
                                        <th>Reservation Date</th>
                                        <th>Total Cost</th>
                                        <th>Confirm</th>
                                        <th>Cancel</th>
										<th></th>
                                    </tr></thead>');
                             
                             
                                    echo("<tbody>");
                                    
									echo(
										"<tr>
										
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td>
											<iframe style=\"display:none\" name=\"iframe\"></iframe>
											<form method=\"post\" action=\"cart.php\">
												<input name=\"type\" type=\"hidden\" id=\"type\" value=\"\"\>
												<input name=\"remove\" type=\"submit\" id=\"remove\" value=\"Remove\">
											</form>
											</td>
										</tr>"
									
									);
                                        //$row = mysqli_fetch_assoc($rs);
                                        //echo "id: " . $row["Item_ID"]. " - Name: " . $row["Item_Name"]. "Unit Price: " . $row["Unit_Price"]. "<br>";
                                        
                                        //echo ($_POST['id']);
                                        

                                   echo ("</tbody></table></div>");
                                   //if (array_key_exists('check_submit', $_POST)) {
                                   //echo ($_POST['qty'] );}
                        mysqli_close($conn);
                        ?>
                     <!-- End   -->
					 
					 
                        </div>
                        </div>
                        </div>
                </div>
                </div>
                </div>

                <!-- === START FOOTER === -->
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12  portfolio-item ">
                             
                              <?php include 'pagefooter.php'; ?>

                        </div>
                        </div>
                <!-- === END FOOTER === -->  
              
            <!-- === END CONTENT === --> 

        </div> <!--<div id="back"> -->
        </div> <!--<div id="container"> -->
        </div> <!--<div id="body-bg"> -->

</body>

</html>
