<?php
 include '../config/db_confg.php';
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
  $password = md5 ($_POST['password']);
  $nic = $_POST['nic'];
  $address = $_POST['address'];

  $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
  $image_name = addslashes($_FILES['image']['name']);
  $image_size = getimagesize($_FILES['image']['tmp_name']);
                        
  move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/img/users/".$image_name);
  echo $image_name;
  $location = "../assets/img/users/" . $_FILES["image"]["name"];

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

  $sql="INSERT INTO users1 VALUES ('$empID','$empType','$password','$uname','$fname','$contact','$nic','$address','$email','$location')";
  $result = mysqli_query($conn, $sql);

  if ($result){
    header("Location:viewacc.php");
  }else{
    echo "Error ".mysqli_error($conn);
  }  

?>