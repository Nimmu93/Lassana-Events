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
    
    <title>Search Orders</title>

    
</head>
<body>
    <div id="wrapper">
        <?php include '../config/stockheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Orders</h1>
                        

                    </div>

                </div>
                <!-- /. ROW  -->
               <div class="col-sm-3 col-md-3 pull-right">
            <form style="margin-top:15px;" method="post" action="searchorder.php">
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search" name="srch" id="srch-term">
                  <div class="input-group-btn">
                     <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
               </div>
            </form>
         </div>
         <br/>
         <br>
            <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div style="margin-top:15px;" class="panel panel-info">
                        <div class="panel-heading">
                            Order Details
                        </div>
                        <div class="panel-body">
                             <?php
                        include '../config/db_confg.php';

                        
                        
                        $search=$_POST['srch'];
                        
                           //display reservations details in a table//
                        
                           // Select all data , display them in a table//
                           $select = "SELECT * FROM orders WHERE `order_id` = '$search' OR cname='$search' OR date='$search' OR city='$search'  ";
                           $result = mysqli_query($conn, $select);
                        
                           
                            
                                                       
                            if ( mysqli_num_rows($result) > 0) {
                                            
                            // print table heads//
                                
                                echo ('<div class="table-responsive"><table border=1 class="table table-bordered" >
                                    <thead style="background-color:     #D3D3D3;">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Customer Number</th>
                                        <th>City</th>
                                        <th></th>
                                        
                                        
                                    </tr></thead>');
                             
                             
                                    echo("<tbody>");
                                    // output data from row by row
                                    while($row = mysqli_fetch_assoc($result)) {
                                       
                                        echo (
                                        "<tr>
                                            <form>
                                                <td>" . $row["order_id"] . "</td>
                                                <td>" . $row["date"] . "</td>
                                                <td>" . $row["cname"] . "</td>
                                                <td>" . $row["cnumber"] . "</td>
                                                <td>" . $row["city"] . "</td>
                                                <td><a href=\"add_borrower.php?id={$row['order_id']}\">View More Details</a></td>
                                                                                    
                                              
                                            </form>
                                        </tr>");
                                        
                                    }

                                   echo ("</tbody></table></div>");
                                
                        }
                        mysqli_close($conn);
                        
                        
                        ?>
                     <!-- End  Kitchen Sink -->
                </div>
                
            </div>
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
