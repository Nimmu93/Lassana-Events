<?php
   session_start();
   include_once '../config/class.user.php';
   $user = new User(); 
   $uid = $_SESSION['uid'];
   if (!$user->get_session()){
    header("location:home.php");
   }
   
   if (isset($_GET['q'])){
    $user->user_logout();
    header("location:home.php");
    }
    
   ?>

<!DOCTYPE html>

<head>
   
    <title>Reservations</title>
    <style type="text/css">
    	.mala{

    	}
    </style>
  
</head>
    
    
<body>
    <div id="wrapper">
        <?php include '../config/clerkheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Reservations</h1>
                    </div>

                </div>
                <!-- /. ROW  -->
               <div class="col-sm-3 col-md-3 pull-right">
                    <form  method="post" action="searchorder.php">
                    <div class="input-group">
                     <input type="text" class="form-control" placeholder="Search" name="srch" id="srch-term">
                    <div class="input-group-btn">
                     <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                    </div>
                    </form>
                </div>
         
            <!--Start Table-->
			
		<div  class="row">
            <div class="col-md-12">
                  <!--   search orders -->
            <div class="panel panel-info">
                        <div class="panel-heading">
                            Reservations to be accepted
                        </div>
                <div class="panel-body">
					<?php
					include '../config/db_confg.php';
					
						$select = "SELECT * FROM temp_res ";
						$result = mysqli_query($conn, $select);
						
												   
						if ( mysqli_num_rows($result) > 0) {
										
						// print table heads//
							
							echo ('<div ><table class="table table-bordered"  >
								<thead >
								<tr>

									<th>Res ID</th>
									<th>Customer Name</th>
									<th>Reservation Date</th>
									<th>Total Cost</th>
									<th>Confirm / Cancel</th>
									<th>Paid</th>
									<th>Add to Order</th>
									<th></th>
									
									
								</tr></thead>');
						 
						 
								echo("<tbody>");
								// output data from row by row
								while($row = mysqli_fetch_assoc($result)) {
								   
									echo (
									"<tr >
										<form method=\"post\" action=\"showReservations.php\" target=\"_blank\">
											<td>" . $row["ResID"] . "</td>
											<td>" . $row["CusName"] . "</td>
											<td>" . $row["ResDate"] . "</td>
											<td>" . $row["TotalCost"] . "</td>
											<td>" . $row["Confirm"] . "</td>
											<td>" . $row["Paid"] . "</td>
											<td>" . $row["AddToOrder"] . "</td>
											<td>
											<input name=\"ResID\" type=\"hidden\" id=\"ResID\" value=\"".$row["ResID"]."\"\>
											<input class=\"delete1\" name=\"show\" type=\"submit\" id=\"show\" value=\"View Details\">
											</td>
										
										  
										</form>
									</tr>");
									
								}

							   echo ("</tbody></table></div>");
							
					}
					mysqli_close($conn);
					
					
					?>
                     <!-- End  -->
                </div>
                
            </div>
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
			
			<!--End Table-->
                     <!-- End  -->
                </div>
                
            </div>
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        
    

    <?php include '../config/footer.php'; ?>
    <!-- /. FOOTER  -->

 
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    

</body>
</html>
