<?php
	include '../config/db_confg.php'; 
	session_start();    

//Labour Charge update Button 
{	if( isset($_POST['labCharge']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$sql = "UPDATE temp_res SET Labour_Charge=".$_POST['labCharge']." WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Labour Charge updated successfully as ".$_POST['labCharge']."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}		}

//Delivery Charge update Button 
{	if( isset($_POST['delCharge']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$sql = "UPDATE temp_res SET Delivery_Charge=".$_POST['delCharge']." WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Delivery Charge updated successfully as ".$_POST['delCharge']."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	}		}
	
//Discount
{	if( isset($_POST['discount']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		if($_POST['discount']<100 && $_POST['discount']>0){
			$netAmount=$_POST['totalServiceCharge']-( $_POST['totalServiceCharge']*$_POST['discount']/100 );
			$discount = ( $_POST['totalServiceCharge']*$_POST['discount']/100 );
		}elseif($_POST['discount']>=100){
			$netAmount=$_POST['totalServiceCharge']-$_POST['discount'];
			$discount = $_POST['discount'];
		}else{
			$netAmount = $_POST['totalServiceCharge'];
			$discount = 0;
		}
		//echo "Net amount".$netAmount."NAend";
		
		$sql = "UPDATE temp_res SET Discount=".$discount." WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Discount updated successfully as ".$discount."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		//$sql $netAmount= "UPDATE temp_res SET Advance_Fee=".$_POST['advFee']." WHERE ResID=".$_POST['ResID'];
		//$result = mysqli_query($conn, $sql);
		
		
	}		}
	
//Advance Fee update Button 
{	if( isset($_POST['advFee']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$sql = "UPDATE temp_res SET Advance_Fee=".$_POST['advFee']." WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Advance Fee updated successfully as ".$_POST['advFee']."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}		}
	
//Confirm Button 
{	if( isset($_POST['confirm']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$conCan = $_POST['confirm'];
		$sql = "UPDATE temp_res SET Confirm='$conCan' WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Reservation Set as $conCan."."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}		}
	
//Not decided Button 
{	if( isset($_POST['notDecide']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$sql = "UPDATE temp_res SET Confirm='Not Decided' WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Reservation Set as Confirmed."."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}		}
	
//Cancel Button 
{	if( isset($_POST['cancel']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$sql = "UPDATE temp_res SET Confirm='Cancelled' WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Reservation Set as Cancelled."."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}		}
	
//Not Confirm Button 
{	if( isset($_POST['notConfirm']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$sql = "UPDATE temp_res SET Confirm='not' WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Reservation Set as Not Confirmed."."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}		}
	
//Paid Button 
{	if( isset($_POST['paid']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$paid = $_POST['paid'];
		$sql = "UPDATE temp_res SET Paid='$paid' WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
			if($paid == "not" ){
				echo "Reservation Set as Not paid."."<br>";
			}else{
				echo "Reservation Set as $paid."."<br>";
			}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}		}
	
//Not Paid Button 
{	if( isset($_POST['notPaid']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$sql = "UPDATE temp_res SET Paid='not' WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Reservation Set as Not Paid."."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}		}	
	

	
//Not Cancel Button 
{	if( isset($_POST['notCancel']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$sql = "UPDATE temp_res SET Cancelled='not' WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Reservation Set as Not Cancelled."."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}		}
	
//Add to Order list Button 
{	if( isset($_POST['orderList']) && isset($_POST['ResID']) ) {
		echo "Successfully added to Order list"."<br>";
		
		$id = $_POST["ResID"];
        
	//adding to orders and orders_new table
		$select = "SELECT * FROM temp_res WHERE ResID=$id ";
		$result = mysqli_query($conn, $select);
		if ( mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			
			$ResID = $row['ResID'];
			$CusName = $row['CusName'];
			$Email = $row['Email'];
			$ConNum = $row['ConNum'];
			$ResDate = $row["ResDate"];
			$Duration = $row['Duration'];
			$District = $row['District'];
			$Location = $row['Location'];
			$TotalCost = $row['TotalCost'];
			$Labour_Charge;
			$Delivery_Charge;
			$Advance_Fee;
			$AddToOrder = $row['AddToOrder'];
			
			if($row['Labour_Charge']==""){ $Labour_Charge=NULL; }
			else{$Labour_Charge = $row['Labour_Charge']; }
			
			if($row['Delivery_Charge']==""){ $Delivery_Charge=NULL; }
			else{$Delivery_Charge = $row['Delivery_Charge']; }
			
			if($row['Advance_Fee']==""){ $Advance_Fee=NULL; }
			else{$Advance_Fee = $row['Advance_Fee']; }
			
			//echo $Labour_Charge,$Delivery_Charge,$Advance_Fee;
			
			
			$insert = "INSERT INTO orders_new (ResID,CusName,Email,ConNum,ResDate,Duration,District,Location,TotalCost,Labour_Charge,Delivery_Charge,Advance_Fee) 
			VALUES ($ResID,'$CusName','$Email',$ConNum,'$ResDate',$Duration,'$District','$Location',$TotalCost,$Labour_Charge,$Delivery_Charge,$Advance_Fee)";
			$result = mysqli_query($conn,$insert);
			if ($result) {
			//echo "Successfully insert into orders_new Table"."<br>";
			} else {
				//echo "Error: " . $insert . "<br>" . mysqli_error($conn);
			}
			
			
			$insert = "INSERT INTO orders (order_id,cname,cnumber,date,city,address) 
			VALUES ($ResID,'$CusName',$ConNum,'$ResDate','$District','$Location')";
			$result = mysqli_query($conn,$insert);
			if ($result) {
			//echo "Successfully insert into orders Table";
			} else {
				//echo "Error: " . $insert . "<br>" . mysqli_error($conn);
			}
			
		}
	//end adding to orders and orders_new table	
	
	//adding to order_item table
		$ResID = $_POST["ResID"];
		$selectResItems = "SELECT * FROM temp_res_details WHERE ResID = $ResID";
		$resultResItems = mysqli_query($conn, $selectResItems);
		
		if ( mysqli_num_rows($resultResItems) > 0) {
			while($itemsRow = mysqli_fetch_assoc($resultResItems)) {
				$ResID = $itemsRow["ResID"];
				$ItemID = $itemsRow["ItemID"];
				$Qty = $itemsRow["Qty"];
				$UnitPrize = $itemsRow["UnitPrize"];
				$SubTotal = $itemsRow["SubTotal"];
				$ResDate = $itemsRow["ResDate"];
				
				$insert = "INSERT INTO order_item (Order_ID,Item_ID,Qty,UnitPrize,SubTotal,Res_Date) 
					VALUES ($ResID,'$ItemID',$Qty,$UnitPrize,$SubTotal,'$ResDate')";
				$result = mysqli_query($conn,$insert);
				
				if ($result) {
				//echo "Items added to order_item table Succesfully";
				} else {
					//echo "Error: " . $insert . "<br>" . mysqli_error($conn);
				}
			}
		}
	//End adding to order_item table
	
	//Update status
		$sql = "UPDATE temp_res SET AddToOrder='Yes' WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		//echo "and Order List updated as Yes";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	
	//
	
	//update month summary table
		$tolValue = $row['TotalCost']+$row['Labour_Charge']+$row['Delivery_Charge'];
		$_month = $row["ResDate"];
		$month = substr($_month, 0,7);
		echo ($AddToOrder);
		$select = "SELECT * FROM month_summary WHERE month = '$month'";
		$result = mysqli_query($conn, $select);
		
		if ( mysqli_num_rows($result) > 0) {
			if($AddToOrder == "No"){
				//echo "1 row";
				$row = mysqli_fetch_assoc($result);
				$newSales = $row['total_sales'] + $tolValue;
				$newNum = $row['number_of_orders'] + 1;
				
				$update = "UPDATE month_summary SET total_sales=$newSales, number_of_orders = $newNum WHERE month='".$month."'";
				$resultUpdate = mysqli_query($conn, $update);
				
			}
		}else{
			//echo "no row";
			$insert = "INSERT INTO month_summary (month, number_of_orders, total_sales) 
						VALUES ('$month', 1, $tolValue)";
			$result = mysqli_query($conn, $insert);
		}
	//End update month summary table
	
	//update Year summary table
		//$tolValue = $row['TotalCost']+$row['Labour_Charge']+$row['Delivery_Charge'];
		//$_year = $row["ResDate"];
		$year = substr($month, 0,4);
		//echo ($AddToOrder);
		$select = "SELECT * FROM year_summary WHERE year = $year";
		$result = mysqli_query($conn, $select);
		
		if ( mysqli_num_rows($result) > 0) {
			if($AddToOrder == "No"){
				//echo "1 row";
				$row = mysqli_fetch_assoc($result);
				$newSales = $row['total_sales'] + $tolValue;
				$newNum = $row['number_of_orders'] + 1;
				
				$update = "UPDATE year_summary SET total_sales=$newSales, number_of_orders = $newNum WHERE year=".$year;
				$resultUpdate = mysqli_query($conn, $update);
				
			}
		}else{
			//echo "no row";
			$insert = "INSERT INTO year_summary (year, number_of_orders, total_sales) 
						VALUES ($year, 1, $tolValue)";
			$result = mysqli_query($conn, $insert);
		}
	//End update Year summary table
		
		
	}		}

	
//Delete Button 
{	if( isset($_POST['delete']) && isset($_POST['ResID']) ) {
		//echo "Delete";
		
		$sql = "DELETE FROM temp_res WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		if ($result) {
		echo "Successfully deleted from temp_res  table"."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		$sql = "DELETE FROM temp_res_details WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		if ($result) {
		echo "Successfully deleted from temp_res_details table"."<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
		
	}		}	
?>
