<?php
 include '../config/db_confg.php';

  $itemID=$_POST['itemID'];
  $itemName = $_POST['itemName'];
  $itemQun = $_POST['amount'];
  $itemUP = $_POST['unit_price'];

  $current_Qun="SELECT Total_Stock FROM stock WHERE Item_ID='$itemID';";

  $itemQun=$itemQun+$current_Qun;

  $sql="UPDATE stock SET Unit_Price='$itemUP',Total_Stock='$itemQun' WHERE Item_ID='$itemID';";
  $result = mysqli_query($conn, $sql);

  if ($result){
    header("Location:edititems.php");
  }else{
    echo "Error ".mysqli_error($conn);
  }  

?>