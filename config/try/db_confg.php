<?php
   $servername = "localhost";
   $username = "id425802_lassana";
   $password = "lassana123";
   $dbname = "id425802_lassanaevents";
   
   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   
   // Check connection
   if (!$conn) {
       
   	header('Location: sql_error.php');
   }
   else {
   	//echo ("successfully connected<br>");
   }
  ?>
 