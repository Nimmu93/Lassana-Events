<?php	
session_start();	
	include 'db_confg.php';
	
	$cartSesID=3574;
if (  isset($_POST['id']) & isset($_POST['qty']) & isset($_POST['res_date']) ) {
	
	// Sum of the reserved quentity of given item
	$sum=0;
	$id = intval($_POST['id']);
	$date = $_POST['res_date'];
	$sql = "SELECT SUM(Qty) AS tol_qty FROM order_item WHERE Item_ID=$id and Res_Date='$date'";	
	$result = mysqli_query($conn,$sql); 
	$row = mysqli_fetch_assoc($result); 
	//$sum = $row[0]['tol_qty'];
	//echo $sum."<br>";
	if($row['tol_qty'] == null){
		$sum=0;
		//echo "Null";
	}else{
		//echo ($row['tol_qty']);
		$sum=$row['tol_qty'];
	}
	//echo "Sum: ".$sum."<br>";
	
	//get total stock of given item
	$total_stock =0;
	$sql2 = "SELECT Total_Stock FROM stock where Item_ID=$id";
	$result2 = mysqli_query($conn,$sql2);
	$row2 = mysqli_fetch_assoc($result2); 
	$total_stock=$row2['Total_Stock'];
	//print_r($row2);
	//echo $total_stock;
	
	
	//Needed qty of given item
	$qty = $_POST['qty'];
	
	if($total_stock - $sum >= $qty){ //check available qty and add to cart
	
//Delete previous items when date is changed. 	
	if (array_key_exists("res_date",$_SESSION))
	  {
		//echo "Key exists!";
		if($_SESSION["res_date"][1]!=$_POST['res_date']){
			foreach($_SESSION as $key){
				if($key[0]==3574){ unset($_SESSION[$key[1]]); }
			}
			//session_unset(); 
			echo '<script> alert("Your previous items removed from the Cart. Since you canged the reservation date.") </script>';
		}
	  }
	
	$_SESSION[$_POST['id']] = array($cartSesID,$_POST['id'],$_POST['qty']);
	$_SESSION["res_date"]=array("dateID147",$_POST['res_date']);
	//echo "<br>".$_POST['res_date']."<br>";
	//echo $_POST['id']."<br>";
	//echo count($_SESSION)."<br>";
	foreach ($_SESSION as $value) {
    //echo "$value[0] <br>";
	}
		echo '<script> alert("Successfully added") </script>';
	}else{
		echo '<script> alert("No available quantity for this item") </script>';
	}
	
	
}
?>
