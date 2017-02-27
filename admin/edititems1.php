<?php
   session_start();
   include_once '../config/class.user.php';
   $user = new User(); 
   $uid = $_SESSION['uid'];
   if (!$user->get_session()){
    header("location:home.php");
   }
   
   if (isset($_GET['q'])){
    $user->user_logout();
    header("location:home.php");
    }

    $itemID=$_POST['itemID'];
    $itemName ='';
    $itemQun = '';
    $itemUP = '';
    $sql="SELECT Item_Name FROM stock WHERE Item_ID='$itemID';";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
      // output data of each row
        $row = mysqli_fetch_assoc($result);
        $itemName = $row["Item_Name"];
        //header("Location:editacc1.php");
    }else{
        echo "Error ".mysqli_error($conn);
    }  
    
   ?>

<!DOCTYPE html>

<head>
    
    <title>Add New Items</title>

    
</head>
<body>
    <div id="wrapper">
        <?php include '../config/adminheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add New Items</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				
				<div class="col-md-6 col-sm-6 col-xs-12" >
                  <div class="panel panel-info">
                        <div class="panel-heading">
                           Enter Details of the new item
                        </div>
                        <div class="panel-body">
                            <form method="post" action="moditem.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Item ID</label>
                                    <input class="form-control" required type="text" name="itemID" id="itemID" readonly="readonly" <?php echo "value='".$itemID."'>";?>
                                </div>
								<div class="form-group">
                                    <label>Item Name</label>
                                    <input class="form-control" required type="text" name="itemName" id="itemName" readonly="readonly" <?php echo "value='".$itemName."'>";?>
                                </div>
								<div class="form-group">
                                    <label>Adding Quantity</label>
                                    <input class="form-control" required type="number"  name="amount" id="amount">
                                </div>
								<div class="form-group">
                                    <label>Unit Price</label>
                                    <input class="form-control" required type="number"  name="unit_price" id="unit_price">
                                </div>
                                <button type="submit" class="btn btn-info" id="create" name="create">Update</button>
                            </form>
                         </div>
                     </div>
                 </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <?php include '../config/footer.php'; ?>
    <!-- /. FOOTER  -->

 
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    

</body>
</html>
