<?php include '../config/db_confg.php'; ?>
<?php   session_start();    ?>

<?php

if (  isset($_POST['duration']) && isset($_POST['district']) && isset($_POST['location']) && 
		isset($_POST['name']) && isset($_POST['email']) && isset($_POST['conNum']) ) {
	
	print_r($_POST);
	//fill temp_res table
	{
	$CusName = $_POST['name'];
	$Email = $_POST['email'];
	$ConNum = $_POST['conNum'];
	$ResDate = $_SESSION["res_date"][1];
	$Duration = $_POST['duration'];
	$District = $_POST['district'];
	$Location = $_POST['location'];
	$TotalCost = 0;
	

	$insertT1 = "INSERT INTO temp_res (CusName,Email,ConNum,ResDate,Duration,District,Location,TotalCost) 
	VALUES ('$CusName','$Email',$ConNum,'$ResDate',$Duration,'$District','$Location',$TotalCost)";
	$result = mysqli_query($conn,$insertT1);
	
	if ($result) {
    echo "New record created successfully";
	} else {
		echo "Error: " . $insertT1 . "<br>" . mysqli_error($conn);
	}
	
	}//end filling temp_res table
	
	
	
	$ResID;
	$sql = "SELECT MAX(ResID) AS res_id FROM temp_res";	
	$result = mysqli_query($conn,$sql); 
	$row = mysqli_fetch_assoc($result); 
	if($row['res_id'] == null){
		$ResID=NULL;
	}else{
		//echo ($row['res_id']);
		$ResID=$row['res_id'];
	}
	//echo "<br>".$ResID."<br>";
	
	
	//Filing temp_res_details table
	{
	$cartSesID=3574;
	$Total = 0;
	foreach ($_SESSION as $value) {////if start
		if($value[0] == $cartSesID){
		$ItemID = $value[1];
		$Qty = $value[2];
	
		$sql = "SELECT Item_ID, Item_Name, Unit_Price, location FROM stock WHERE Item_ID ='".$ItemID."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		
		$UnitPrize = $row["Unit_Price"];
		$SubTotal = $Qty * $UnitPrize;
		$Total = $Total + $SubTotal;
		
		$insertT2 = "INSERT INTO temp_res_details (ResID,ItemID,Qty,UnitPrize,SubTotal,ResDate) 
			VALUES ($ResID,'$ItemID',$Qty,$UnitPrize,$SubTotal,'$ResDate')";
		$result = mysqli_query($conn,$insertT2);
		
		if ($result) {
		echo "New record created successfully";
		} else {
			echo "Error: " . $insertT2 . "<br>" . mysqli_error($conn);
		}
		
		//echo $ResID."	".$ItemID."	".$Qty."	".$UnitPrize."	".$SubTotal."	".$Total."<br>"; 
		}//end if
	}
	
	}//End Filling temp_res_table
	
	echo "total".$Total;
	
	$sql = "UPDATE temp_res SET TotalCost=$Total WHERE ResID=$ResID";	
	$result = mysqli_query($conn,$sql);
	
	if ($result) {
		echo "Updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	echo '<p style="color:red"><b>Reservation has made Successfully.</b></p>';	
	echo '<script>alert("Reservation has made Successfully.")</script>';
	
	}else{
		//echo "<br>"."There is unfilled field"."<br>";
	}


?>

