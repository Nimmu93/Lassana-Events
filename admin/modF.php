<?php
 include '../config/db_confg.php';

<<<<<<< HEAD
 $boolean = TRUE;
 $nameErr = $emailErr = $contactErr =  "";

 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST["fname"])){$fname = test_input($_POST["fname"]);}
if(isset($_POST["email"])){$email = test_input($_POST["email"]);}
if(isset($_POST["contact"])){$contact = test_input($_POST["contact"]);}
  
  $empID=$_POST['empID'];
  $empType = $_POST['empType'];
  $uname = $_POST['uname'];
  //$password = $_POST['password'];
  $nic = $_POST['nic'];
  $address = $_POST['address'];
  $image = $_POST['image'];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
    $boolean = FALSE;
  }elseif(!preg_match("/^[a-zA-Z ]*$/",$fname)) {
    $nameErr = "Only letters and white space are allowed";
    $boolean = FALSE;
  }else{
    $fname = test_input($_POST["fname"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $boolean = FALSE;
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
    $boolean = FALSE;
  }else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["contact"])) {
    $contactErr = "subject is required";
    $boolean = FALSE;
  }elseif(!preg_match("/^[0-9]*$/",$contact)) {
    $contactErr = "Only letters and white spaces are allowed";
    $boolean = FALSE;
  } else {
    $contact = test_input($_POST["contact"]);
  }
  
}
  $sql="UPDATE users1 SET uid='$empID',employee_type='$empType',uname='$uname',fullname='$fname',contact='$contact',Address='$address',uemail='$email',location='$image' WHERE uid LIKE '%".$empID."%'; ";
=======
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
>>>>>>> origin/master
  $result = mysqli_query($conn, $sql);

  if ($result){
    header("Location:viewacc.php");
  }else{
    echo "Error ".mysqli_error($conn);
  }  

?>