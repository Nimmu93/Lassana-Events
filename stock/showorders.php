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
    
   ?>

<!DOCTYPE html>

<head>
   
    <title>Order Details</title>

    
</head>
<body>
    <div id="wrapper">
        <?php include '../config/stockheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Order Details</h1>
                        

                    </div>

                </div>
                <!-- /. ROW  -->
               
         <br/>
         <br>
            <div class="row">
                <div class="col-md-8">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Order Description
                        </div>
                        <div class="panel-body">
                             <?php
                        include '../config/db_confg.php';

                            $id = $_POST["resid"];
                        
                            $select = "SELECT * FROM orders_new WHERE ResID='$id' ";
                            $result = mysqli_query($conn, $select);
                            
                                                       
                            if ( mysqli_num_rows($result) > 0) {

                                $row = mysqli_fetch_assoc($result);

                                
                             ?>

                            <p><b>Order_ID:</b>
<div class="fg">
<div class="alert alert-info" style="font-size:16"><?php echo $row['ResID']; ?></div>
</p> 
<p><b>Name: </b> 
<div class="fg">
<div class="alert alert-info" style="font-size:16"> <?php echo $row['CusName']; ?></div>
</p> 
<p><b>Phone Number:  </b>
<div class="fg">
<div class="alert alert-info" style="font-size:16">  <?php echo $row['ConNum']; ?></div>
</p>  
<p><b>Date: </b> 
<div class="fg">
<div class="alert alert-info" style="font-size:16">   <?php echo $row['ResDate']; ?></div>
</p>  
<p><b>City: </b> 

   <div class="alert alert-info" style="font-size:16">   <?php echo $row['District']; ?></div>
   </p> 
   <p><b>Address: </b> 
   <div class="fg">
      <div class="alert alert-info" style="font-size:16">   <?php echo $row['Location']; ?></div>
      </p> 
   </div>
   <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15844.245545803116!2d79.89128109999999!3d6.8832502!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1475756084952" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
   <div id="map"></div>
 
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<br>
            
<div class="panel panel-info">
<div class="panel-heading" >
Items of the Order
</div>
        <div class="panel-body">

<?php

//include '../config/db_confg.php';

$ResID = $_POST["resid"];
            $selectResItems = "SELECT * FROM temp_res_details WHERE ResID = $ResID";
            $resultResItems = mysqli_query($conn, $selectResItems);
$itemList = array();

//print items of reservation table
            if ( mysqli_num_rows($resultResItems) > 0) {
                            
            // print table heads//
                echo ('<div ><table border=1 class="table table-bordered" >
                    <thead >
                    <tr>

                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Item Type</th>
                        <th>Qty</th>
                        
                    </tr></thead>');
             
                    echo("<tbody>");
                    // output data from row by row
                    while($itemsRow = mysqli_fetch_assoc($resultResItems)) {
    $ItemID = $itemsRow["ItemID"];
    $selectItemDet = "SELECT * FROM stock WHERE Item_ID = '$ItemID'";
    $resultItemDet = mysqli_query($conn, $selectItemDet);
    $itemDetRow = mysqli_fetch_assoc($resultItemDet);
    array_push($itemList,$ItemID);
                        echo (
                        "<tr>
      <td>" . $itemsRow["ItemID"] . "</td>
      <td>" . $itemDetRow["Item_Name"] . "</td>
      <td>" . $itemDetRow["Item_Type"] . "</td>
      <td>" . $itemsRow["Qty"] . "</td>
        
                        </tr>");
                    }
                   echo ("</tbody></table></div>");
        }

        ?>
</div>
</div>
<form method="post" action="doneH.php" target="iiframe">
  <input name="done" type="hidden" value="done">
  <input name="ResID" type="hidden" value="<?php echo $ResID; ?>">
  <input class="delete1" name="doneButton" type="submit" value="DONE">
</form>
<iframe height="40" name="iiframe"></iframe>

<div class="col-md-4">
</div>

                                
                        <?php        
                        }
                        mysqli_close($conn);
                        ?>

                    
                        
                        
                     <!-- End  Kitchen Sink -->
               
                
            
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</div>

    <!-- /. WRAPPER  -->
     <?php include '../config/footer.php'; ?>
    <!-- /. FOOTER  -->

 
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    

</body>
</html>
