<?php
 include '../config/db_confg.php';

  $empID=$_GET['id'];
  

  $sql="DELETE  FROM employee WHERE Employee_ID='$empID'";
  $result = mysqli_query($conn, $sql);

  if ($result){
    header("Location:viewacc.php");
  }else{
    echo "Error ".mysqli_error($conn);
  }  

?>