<?php
	include '../config/db_confg.php'; 

//Labour Charge update Button 
{	if( isset($_POST['done']) && isset($_POST['ResID']) ) {
		//echo "Charge and ID Set";
		$sql = "UPDATE orders_new SET Done='Yes' WHERE ResID=".$_POST['ResID'];
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
		echo "Update as Done <br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}		}
	
?>