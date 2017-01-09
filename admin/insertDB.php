<?php
 include '../config/db_confg.php';

  $empID=$_POST['empID'];
  $empType = $_POST['empType'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $password = $_POST['password'];
  $contact = $_POST['contact'];
  $nic = $_POST['nic'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $image = $_POST['image'];

  $sql="INSERT INTO users1 VALUES ('$empID','$empType','$password','$fname','$lname','$contact','$nic','$address','$email','$image')";
  $result = mysqli_query($conn, $sql);

  if ($result){
    header("Location:viewacc.php");
  }else{
    echo "Error ".mysqli_error($conn);
  }  

?>