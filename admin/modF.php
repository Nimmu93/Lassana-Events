<?php
 include '../config/db_confg.php';

  $empID=$_POST['empID'];
  $empType = $_POST['empType'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  //$password = $_POST['password'];
  $contact = $_POST['contact'];
  $nic = $_POST['nic'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $image = $_POST['image'];

  //$sql="UPDATE employee SET Name='$name',NIC='$nic',Address='$address',Telephone='phone' WHERE Emp_No LIKE '%".$empNo."%'; ";
  $sql="UPDATE users1 SET uid='$empID',employee_type='$empType',uname='$fname',fullname='$lname',contact='$contact',Address='$address',uemail='$email',location='$image' WHERE uid LIKE '%".$empID."%'; ";
  $result = mysqli_query($conn, $sql);

  if ($result){
    header("Location:viewacc.php");
  }else{
    echo "Error ".mysqli_error($conn);
  }  

?>