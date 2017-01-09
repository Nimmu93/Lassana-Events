<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "lassanaparty";
   
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
 