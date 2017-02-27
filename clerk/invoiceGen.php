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
   
    <title>Invoice</title>
  
</head>
    
    
<body>
    <div id="wrapper">
        <?php include '../config/clerkheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner" >
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Invoice</h1>
                    </div>

                </div>
                <!-- /. ROW  -->
				

				<br><br>
			<center>	
			<div class="panel panel-info" style="width: 80%;">
			<?php
			if( isset($_POST['ResID']) ) { 
				//echo $_POST['ResID'].'<br>'; 
				
				$id = $_POST["ResID"];
                        
				$select = "SELECT * FROM temp_res WHERE ResID=$id ";
				$result = mysqli_query($conn, $select);
				if ( mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					//print_r($row);
				}
			
			}
			?>
			<div class="panel-heading"> <center><h3>
				Reservation at Lassana Events </h3> <br>
				<img  src="../assets/img/logo.png" style="margin:5px " ></center>
			</div>

			<div class="panel-heading">
				Reservation Details
			</div>

			<div class="panel-body">
			<table width="60%">
				<tr><th>Invoice Number: </th> <td> <?php echo $row["ResID"];?> </td> </tr>
				<tr><th>Reservation Date: </th> <td> <?php echo $row["ResDate"];?> </td> </tr>
				<tr><th>Duration(days)</th> <td> <?php echo $row["Duration"];?> </td> </tr>
				<tr><th>District:</th> <td> <?php echo $row["District"];?> </td> </tr>
				<tr><th>Delivery Address (Location):</th> <td> <?php echo $row["Location"];?> </td> </tr>
				</table>
			</div>
			
			<div class="panel-heading">
				Customer Details
			</div>
			<div class="panel-body">
			<table width="60%">
				<tr><th>Customer Name: </th> <td> <?php echo $row["CusName"];?> </td> </tr>
				<tr><th>E-mail: </th> <td> <?php echo $row["Email"];?> </td> </tr>
				<tr><th>Contact Number:</th> <td> <?php echo $row["ConNum"];?></td> </tr>
			</table>			
			</div>
			
			<div class="panel-heading">
				Ordered items and Charges
			</div>
			<div class="panel-body">
				<?php
				
				$ResID = $_POST["ResID"];
				$selectResItems = "SELECT * FROM temp_res_details WHERE ResID = $ResID";
				$resultResItems = mysqli_query($conn, $selectResItems);
				$itemList = array();
				
				//print items of reservation table
				if ( mysqli_num_rows($resultResItems) > 0) {
								
				// print table heads//
					echo ('<div ><table border=1 class="table table-bordered">
						<thead >
						<tr>

							<th>Item ID</th>
							<th>Item Name</th>
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
								<td>" . $itemsRow["Qty"] . "</td>
								<td>" . $itemsRow["UnitPrize"] . "</td>
								<td>" . $itemsRow["SubTotal"] . "</td>
									
							</tr>");
						}
						echo ('<tr>
							
							<th colspan="5" style="text-align:right;color:#28a139">'.$row["TotalCost"]." (total)".'</th>

						</tr>');
						$totalFee = $row["TotalCost"]+$row["Labour_Charge"]+$row["Delivery_Charge"];
						//echo $totalFee;
						$amountToPay = $totalFee - $row["Advance_Fee"] - $row["Discount"];
						
					   echo ("</tbody></table></div>");
					   echo ('<table cellpadding="40" cellspacing="40">
						<tr> <td ><b>Charge for Items:</b></td> <td align="right">'.$row["TotalCost"].'</td> </tr>
						<tr> <td><b>Labour Charge:</b></td> <td align="right">'.$row["Labour_Charge"].'</td> </tr>
						<tr> <td><b>Delivery Charge:</b></td> <td align="right">'.$row["Delivery_Charge"].'</td> </tr>
						<tr> <td><b>Total Charge for Service: &nbsp &nbsp </b></td> <td align="right"><b>'.$totalFee.'</b></td> </tr>
						<tr> <td><b>Discount:</b></td> <td align="right">'."-".$row["Discount"].'</td> </tr>
						<tr> <td><b>Advance Fee:</b></td> <td align="right">'."-".$row["Advance_Fee"].'</td> </tr>
						<tr> <td><b>Residual Payment:</b></td> <td align="right" style="text-align:right;color:red"><b>'.$amountToPay.'</b></td> </tr>
						
						</table>');
					   //print_r($itemList);
					   //end items of reservation table
					   
					   //echo preDay($row["ResDate"]);
				}
				?>	
				<br>
				<div class="panel panel-danger">
				<div class="panel-heading">Warning!</div>
				<div class="panel-body">Your reservation will be successfull only if you pay the due amount within 2 days</div>
				</div>
				<button type="button" class="btn btn-success" value="">Send Invoice to Customer</button>
					
						
			</div>
            </div>
            </center>
            
                     <!-- End  -->
                </div>
                
            </div>
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        
		<?php  mysqli_close($conn); ?>

    <?php include '../config/footer.php'; ?>
    <!-- /. FOOTER  -->

 
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    

</body>
</html>
