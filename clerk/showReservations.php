<?php
   include 'dateCal.php';
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
    
    <title> Reservation Details</title>

    
</head>
<body>
    <div id="wrapper">
        <?php include '../config/clerkheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Reservation Details</h1>
                        

                    </div>

                </div>
                <!-- /. ROW  -->
               
         <br/>
         <br>
            <div class="row">
                <div class="col-md-8">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-info">

                        <div class="panel-body">
                             <?php
                        include '../config/db_confg.php';

                            $id = $_POST["ResID"];
                        
                            $select = "SELECT * FROM temp_res WHERE ResID=$id ";
                            $result = mysqli_query($conn, $select);
							
							
                            if ( mysqli_num_rows($result) > 0) {
							   
							$id = $_POST["ResID"];
                            $select = "SELECT * FROM temp_res WHERE ResID=$id ";
                            $result = mysqli_query($conn, $select);
							$row = mysqli_fetch_assoc($result);
							$ResID = $row["ResID"];
							
							$totalServiceCharge = $row["TotalCost"] + $row["Labour_Charge"] + $row["Delivery_Charge"];
							$residualPayment = $totalServiceCharge - $row["Discount"] - $row["Advance_Fee"];

                            echo ('
							<div ><table border=1 class="table table-bordered" >
								<tr>
									<th>Reservation ID</th>	<td>'.$row["ResID"].'</td> </tr>
								<tr>
									<th>Customer Name</th>	<td>'.$row["CusName"].'</td> </tr>
								<tr>
									<th>E-mail</th>	<td>'. $row["Email"] .'</td> </tr>
								<tr>
									<th>Contact Number</th>	<td>'. $row["ConNum"] .'</td> </tr>
								<tr>
									<th>Reservation Date</th>	<td>'. $row["ResDate"] .'</td> </tr>
								<tr>
									<th>Duration</th>	<td>'. $row["Duration"] .'</td> </tr>
								<tr>
									<th>District</th>	<td>'. $row["District"] .'</td> </tr>
								<tr>
									<th>Location</th>	<td>'. $row["Location"] .'</td> </tr>
								<tr>
									<th>Total Cost</th>	<td>'. $row["TotalCost"] .'</td> </tr>
								<tr>
									<th>Labour Charge</th>	<td>'. $row["Labour_Charge"] .'</td> 
									<form action="reservationUpdates.php" method="post" target="resiFrame">
									<td><input type="number" id="labCharge" name="labCharge" min="0" value="'.$row["Labour_Charge"].'">
										<input name="ResID" type="hidden" id="ResID" value="'.$row["ResID"].'"> </td> 
									
									 </tr>
								<tr>
									<th>Delivery Charge</th>	<td>'. $row["Delivery_Charge"] .'</td>
									<td><input type="number" id="delCharge" name="delCharge" min="0" value="'.$row["Delivery_Charge"].'"></td> 
									 </tr>
									 
								<tr>
									<th>Total Service Charge &nbsp &nbsp</th>	<td><b>'. $totalServiceCharge .'</b></td>
									<input type="number" style="display:none" id="totalServiceCharge" name="totalServiceCharge" min="0" value="'.$totalServiceCharge.'"required>
									 </tr>	 
									
								<tr>
									<th>Discount</th>	<td>'. $row["Discount"] .'</td>
									<td><input type="number" id="discount" name="discount" min="0" value="'.$row["Discount"].'"></td> 
									 </tr>
									 
								<tr>
									<th>Advance Fee</th>	<td>'. $row["Advance_Fee"] .'</td>
									<td><input type="number" id="advFee" name="advFee" min="0" value="'.$row["Advance_Fee"].'"></td> 
									 </tr>	 
									 
								<tr>
									<th>Residual Payment &nbsp &nbsp</th>	<td><b>'. $residualPayment .'</b></td>
									 </tr>
									
								</table>
								<table border=1 class="table table-bordered"> 
								<tr>
									<th>Confirm ? Cancel ? </th>	<td>'. $row["Confirm"] .'</td>
									<td ><input type="radio" name="confirm" value="Confirmed" >Confirm</td>
									<td id="reservation"><input type="radio" name="confirm" value="Not Decided"> Not Decided</td>
									<td ><input type="radio" name="confirm" value="Cancelled" > Cancel</td>
									</tr>
									
								<tr>
									<th>Paid ?</th>	<td>'. $row["Paid"] .'</td>
									<td><input id="paid" type="radio" name="paid" value="Paid" > Paid</td>
									<td><input type="radio" name="paid" value="not"> Not Paid</td>
									</tr>
								<tr>
									<th>Added to Order List ? </th>	<td>'. $row["AddToOrder"] .'</td>
									</tr>

								<tr>
									<td colspan=5 style="text-align:right"> <button class="btn btn-success" type="submit">Update</button>  </td>
									</tr>
									
									</table>
									
									</form>
									</div>
									');
                             ?>
							 <iframe style="display" height="120" width="100%" name="resiFrame"></iframe>
							 
							 <table width="100%"><tr><td>
							 <form action="reservationUpdates.php" method="post" target="resiFrame">
								<?php echo '<input name="ResID" type="hidden" id="ResID" value="'.$row["ResID"].'">'; ?>
								<input name="orderList" type="hidden">
								<button id="AddToOrder" type="submit" class="btn btn-success">Add to Order List</button>
							</form></td>
							<td>
							<form action="reservationUpdates.php" method="post" target="resiFrame">
								<?php echo '<input name="ResID" type="hidden" id="ResID" value="'.$row["ResID"].'">'; ?>
								<input name="delete" type="hidden">
								<button id="DeleteRes" type="submit" class="btn btn-danger">Delete Reservation from Databese</button>
							</form></td>
							
							<script>
							if(!("<?php echo $row["Confirm"]; ?>" == "Confirmed" && "<?php echo $row["Paid"]; ?>" == "Paid")){
								document.getElementById("AddToOrder").disabled = false;
							}
							if(!("<?php echo $row["Confirm"]; ?>" == "Cancelled" && "<?php echo $row["Paid"]; ?>" == "not")){
								document.getElementById("DeleteRes").disabled = true;
							}
							if( !("<?php echo $row["Confirm"]; ?>" == "Confirmed") ){
								document.getElementById("paid").disabled = true;
							}
							</script>
							
							<td>
							<form action="invoiceGen.php" method="post" target="_blank">
								<?php echo '<input name="ResID" type="hidden" id="ResID" value="'.$row["ResID"].'">'; ?>
								<button type="submit" class="btn btn-info">Generate Invoice</button>
							</form>
							</td>

							</tr>

							</table>
						</div>
						</div>
						
						<!--out of la alu backgroung--> 						
						
						
										<div class="col-md-4">
										</div>

                                
                        <?php        
                        }
						
						
                        mysqli_close($conn);
                        ?>
						
						<br>
						
						<div class="panel panel-info">
						<div class="panel-heading" >
							Items of the Reservation
						</div>
                        <div class="panel-body">
						
						<?php
							
							include '../config/db_confg.php';
							
							$ResID = $_POST["ResID"];
                            $selectResItems = "SELECT * FROM temp_res_details WHERE ResID = $ResID";
                            $resultResItems = mysqli_query($conn, $selectResItems);
							$itemList = array();
							
							//print items of reservation table
                            if ( mysqli_num_rows($resultResItems) > 0) {
                                            
                            // print table heads//
                                echo ('<div ><table border=1 class="table table-bordered" >
                                    <thead >
                                    <tr>

                                        <th>Item ID</th>
										<th>Item Name</th>
										<th>Item Type</th>
                                        <th>Qty</th>
                                        <th>Unit Prize</th>
                                        <th>Sub Total</th>
                                        
                                    </tr></thead>');
                             
                                    echo("<tbody>");
                                    // output data from row by row
                                    while($itemsRow = mysqli_fetch_assoc($resultResItems)) {
										$ItemID = $itemsRow["ItemID"];
										$selectItemDet = "SELECT * FROM stock WHERE Item_ID = '$ItemID'";
										$resultItemDet = mysqli_query($conn, $selectItemDet);
										$itemDetRow = mysqli_fetch_assoc($resultItemDet);
										array_push($itemList,$ItemID);
                                        echo (
                                        "<tr>
											<td>" . $itemsRow["ItemID"] . "</td>
											<td>" . $itemDetRow["Item_Name"] . "</td>
											<td>" . $itemDetRow["Item_Type"] . "</td>
											<td>" . $itemsRow["Qty"] . "</td>
											<td>" . $itemsRow["UnitPrize"] . "</td>
											<td>" . $itemsRow["SubTotal"] . "</td>
												
                                        </tr>");
                                    }
                                   echo ("</tbody></table></div>");
								   //print_r($itemList);
								   //end items of reservation table
								   
								   //echo preDay($row["ResDate"]);
                        }
						mysqli_close($conn);
                        ?>
						</div>
						</div>
						
						<br>
						<!--
						<div class="panel panel-info">
						<div class="panel-heading" >
							Previous Day Reserved Items
						</div>
                        <div class="panel-body">
						
						<?php
							
							//include '../config/db_confg.php';
							
							//$prevoiusDay = preDay($row["ResDate"]);
							
							//echo $prevoiusDay;
                            // print table heads//
                                //echo ('<div ><table border=1 class="table table-bordered" >
                                 //   <thead >
                                   // <tr>

                                   //     <th>Item ID</th>
                                    //    <th>Qty</th>
                                        
                                   // </tr></thead>');
                             
                                  //  echo("<tbody>");
                                    
									 /*
									$i = 0;
									while($i < sizeof($itemList)){
										
										$selectPreDay = "SELECT SUM(Qty) AS tol_qty FROM order_item WHERE Item_ID='ch002' and Res_Date='2017-01-31'";
										$resultPreDay = mysqli_query($conn, $selectPreDay);
										$itemPreDay = mysqli_fetch_assoc($resultPreDay);
										if($itemPreDay["tol_qty"] != ""){
										echo (
                                        "<tr>
												<td>" . $itemList[$i] . "</td>
												<td>" . $itemPreDay["tol_qty"] . "</td>
                                        </tr>");
										$i+=1;
										}
									} 
                                     */   
                                    
                                  // echo ("</tbody></table></div>");
								   //print_r($itemList);
								   //end items of reservation table
								   
								   //echo preDay($row["ResDate"]);
                        
						//mysqli_close($conn);
                        ?>
						</div>
						</div>
						
						

                    
                        
                        
                   
               
                
            
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</div>

    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2016 Lassana Party | Design By : <a href="http://www.binarytheme.com/" target="_blank">Root Fixers</a>
    </div>

    
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>


</body>
</html>
