<?php include '../config/db_confg.php'; ?>
<?php   session_start();    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title >Lassana Events | Cart </title>

        <style>

        td{
            text-align: center;
            padding-right:20px;
            padding-left:20px;
            color: #ffffff;
            font-size: 16px;
        }

        .btn-block{
            background-color: #939598;
            color: red;
            font-weight: bold;
        }

        th{
            text-align: center;
        }

        #itemprice{
            color: red;
            background-color: #ffffff;
            font-weight: bold;
            font-size: 20px;
        }
        #fillform{
            color: #22313F;
            font-size: 20px;
            background-color: #c1d82f;
        }
        #detailshead{
            color: #22313F;
            font-size: 16px;
            background-color:  #939598;
        }

        </style>
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
                    $cartSesID=3574;
                    // print table heads//
                    echo ('<div ><table border=2 class="table table-bordered" >
                                    <thead style="background-color:#656565;color:#ffffff;">
                                    <tr>
                                        <th>Item</th>
                                        <th>Item Name</th>
                                        <th>Unit Prize</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr></thead>');
                             
                             
                                    echo("<tbody>");
                                    
                                    //if (array_key_exists('check_submit', $_POST)) {}
									if(array_key_exists("res_date",$_SESSION)){
												echo '<p><b>Reservation date is'.":  ".$_SESSION["res_date"][1].'</b></p>';
											}
                                    foreach ($_SESSION as $value) {////if start
                                        if($value[0] == $cartSesID){
                                        $type = $value[1];
                                        $qut = $value[2];
                                        //echo "$id <br> $qut";
                                    
                                        $sql = "SELECT Item_ID, Item_Name, Unit_Price, location FROM stock WHERE Item_ID ='".$type."'";
                                        $result = mysqli_query($conn, $sql);
                                        
										
											
									
										
                                        if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
												
                                                echo(
                                                    "<tr>
                                                    
                                                        <td style=\"width:9%\">".'<img src="'.$row["location"].'" alt="Mountain View" >'."</td>
                                                        <td>".$row["Item_Name"]."</td>
                                                        <td>".$row["Unit_Price"]."</td>
                                                        <td>". $qut ."</td>
                                                        <td>".($row["Unit_Price"]*$qut)."</td>
                                                        <td>
                                                        <iframe style=\"display:none\" name=\"iframe\"></iframe>
                                                        <form method=\"post\" action=\"cart.php\">
                                                            <input name=\"type\" type=\"hidden\" id=\"type\" value=\"".$type."\"\>
                                                            <input name=\"remove\" style=\"padding:10px 20px\" class=\"btn-block\" type=\"submit\" id=\"remove\" value=\"Remove\">
                                                        </form>
                                                        </td>
                                                    </tr>"
                                                
                                                );
                                            }
                                        }
                                        }//if end
                                    }
                                    $Total = 0;
                                    foreach ($_SESSION as $value) {////if start
                                        if($value[0] == $cartSesID){
                                        $type = $value[1];
                                        $qut = $value[2];
                                        //echo "$id <br> $qut";
                                    
                                        $sql = "SELECT Item_ID, Item_Name, Unit_Price, location FROM stock WHERE Item_ID ='".$type."'";
                                        $result = mysqli_query($conn, $sql);
                                        //static $Total = 0;
                                        if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $Total += ($row["Unit_Price"]*$qut);
                                            }
                                        }
                                        }//end if
                                    }
                                    if($Total > 0){
                                        echo(
                                                "<tr>
                                                    <td colspan=5>"."Total price for items only :</td> <td id=itemprice> ".$Total."</td>
                                                   
                                                </tr>"
                                                
                                            );
                                    }
                                    $Total = 0;

                                        
                                        //$row = mysqli_fetch_assoc($rs);
                                        //echo "id: " . $row["Item_ID"]. " - Name: " . $row["Item_Name"]. "Unit Price: " . $row["Unit_Price"]. "<br>";
                                        
                                        //echo ($_POST['id']);
                                        

                                   echo ("</tbody></table></div>");
                                   //if (array_key_exists('check_submit', $_POST)) {
                                   //echo ($_POST['qty'] );}
                        mysqli_close($conn);
                        ?>
                        <?php
                            if (  isset($_POST['type']) ) {
                                unset($_SESSION[$_POST['type']]);
                                }
                            
                        ?>
                     <!-- End   -->
				<div class="row">
				
				<div class="col-xs-12 col-sm-2 col-md-2">
                </div> 
				<div class="col-xs-12 col-sm-8 col-md-8">
                <center><div id="fillform"><br>Fill folowing details to carryout the reservation <br><br></div></center>
                <div class="panel panel-info">
                        
                        <div class="panel-body">
                            <form id="resForm" role="form" action="resHandle.php" method="post" target="resIframe">
										<div class="panel-heading" align="center" id="detailshead">
										   RESERVATION DETAILS
										</div>
                                        <div class="form-group">
                                            <label><p style="color: red;text-align: left">* Reservation can only be requested for 1 day </p></label>
											<p> &nbsp &nbsp &nbsp </p>
                                            <input style="display:none" id="duration" name="duration" class="form-control" type="number" min="1" value="1" required>
                                        </div>
										<div class="form-group">
                                            <label>District</label>
                                            <select id="district" name="district" class="form-control" required>
												<option disabled selected value> -- select a District -- </option>
												<option>	Ampara	</option>
												<option>	Anuradhapura	</option>
												<option>	Badulla	</option>
												<option>	Batticaloa	</option>
												<option>	Colombo	</option>
												<option>	Galle	</option>
												<option>	Gampaha	</option>
												<option>	Hambantota	</option>
												<option>	Jaffna	</option>
												<option>	Kalutara	</option>
												<option>	Kandy	</option>
												<option>	Kegalle	</option>
												<option>	Kilinochchi	</option>
												<option>	Kurunegala	</option>
												<option>	Mannar	</option>
												<option>	Matale	</option>
												<option>	Matara	</option>
												<option>	Moneragala	</option>
												<option>	Mullaitivu	</option>
												<option>	Nuwara Eliya	</option>
												<option>	Polonnaruwa	</option>
												<option>	Puttalam	</option>
												<option>	Ratnapura	</option>
												<option>	Trincomalee	</option>
												<option>	Vavuniya	</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Location (Delivery Address)</label>
                                            <textarea id="location" name="location" class="form-control" rows="4" required></textarea>
                                        </div>
										<div class="panel-heading" align="center" id="detailshead">
										   CUSTOMER DETAILS
										</div>
										<div class="form-group">
                                            <label>Name</label>
                                            <input id="name" name="name" class="form-control" type="text" required>
                                        </div>
										<div class="form-group">
                                            <label>E-mail</label>
                                            <input id="email" name="email" class="form-control" type="text" required>
                                        </div>
										<div class="form-group">
                                            <label>Contact Number</label>
                                            <input id="conNum" name="conNum" class="form-control" type="number" required>
                                        </div>
                                 
                                        <button type="button" onclick="submitForm()" class="btn btn-info">Request Reservation </button>

                                    </form>
									<iframe style="display:;" width="0"  height="0" frameBorder="0" name="resIframe"></iframe>

									<script>
										function submitForm() {
											if ("<?php 
												$Total = 0;
												foreach ($_SESSION as $value) {////if start
													if($value[0] == $cartSesID){
													$Total += 1;
													}//end if
												}
												echo $Total;
											?>" == 0) {
												alert("Please add one or more items to the Cart.");
											}else{
												
												bool = true;
												var duration = document.getElementById("duration").value;
												var district = document.getElementById("district").value;
												var location = document.getElementById("location").value;
												var name = document.getElementById("name").value;
												var email = document.getElementById("email").value;
												var conNum = document.getElementById("conNum").value;
												
												if(duration == ""){ bool = false;
												
												
												}
												else if(district == ""){ bool = false;}
												else if(location == ""){ bool = false;}
												else if(name == ""){ bool = false;}
												else if(email == ""){ bool = false;}
												else if(conNum == ""){ bool = false;}
												else{bool = true;}
												if(bool){
													document.getElementById("resForm").submit();
												}else{
													alert("Please fill all fields.");
												}
											}
										}
									</script>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2"></div> 
                </div> <!--close row for form -->
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
