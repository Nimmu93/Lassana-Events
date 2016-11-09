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
    
    <title>Stock</title>

    
</head>
<body>
    <div id="wrapper">
        <?php include '../config/stockheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Upcoming Stock</h1>
                        

                    </div>

                </div>
                <!-- /. ROW  -->
               
         <div class="row">
                <div class="col-md-12">
                  <!--   Stock Details -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Stock Details
                        </div>
                        <div class="panel-body">
                             <?php
                        include '../config/db_confg.php';
                        
                            $select = "SELECT * FROM stock ,item where stock.Item_ID=item.Item_ID ";
                            $result = mysqli_query($conn, $select);
                            
                                                       
                            if ( mysqli_num_rows($result) > 0) {
                                            
                            // print table heads//
                                
                                echo ('<div class="table-responsive"><table border=1 class="table table-bordered" >
                                    <thead style="background-color:     #D3D3D3;">
                                    <tr>

                                        <th>Item ID</th>
                                        <th>Item</th>
                                        <th>Date</th>
                                        <th>Stock_In</th>
                                        <th>Stock_Out</th>
                                        <th>Total_Stock</th>
                                        
                                    </tr></thead>');
                             
                             
                                    echo("<tbody>");
                                    // output data from row by row
                                    while($row = mysqli_fetch_assoc($result)) {
                                       
                                        echo (
                                        "<tr>
                                            <form method=\"post\" action=\"showorders.php\">
                                                <td>" . $row["Item_ID"] . "</td>
                                                <td>" . $row["Item_Name"] . "</td>
                                                <td>" . $row["Date"] . "</td>
                                                <td>" . $row["Stock_In"] . "</td>
                                                <td>" . $row["Stock_Out"] . "</td>
                                                <td>" . $row["Total_Stock"] . "</td>
                                                                       
                                              
                                            </form>
                                        </tr>");
                                        
                                    }

                                   echo ("</tbody></table></div>");
                                
                        }
                        mysqli_close($conn);
                        
                        
                        ?>
                     <!-- end Stock Details -->
                </div>
                
            </div>
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
            
                <!-- /. ROW  -->
                <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Total Stock</h1>
                        
                            <div class="row">
                <div class="col-md-12">
                  <!--   Total Stock -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Stock Details
                        </div>
                        <div class="panel-body">
                             <?php
                        include '../config/db_confg.php';
                        
                            $select = "SELECT * FROM stock ";
                            $result = mysqli_query($conn, $select);
                            
                                                       
                            if ( mysqli_num_rows($result) > 0) {
                                            
                            // print table heads//
                                
                                echo ('<div class="table-responsive"><table border=1 class="table table-bordered" >
                                    <thead style="background-color:     #D3D3D3;">
                                    <tr>

                                        <th>Item ID</th>
                                        <th>Total_Stock</th>
                                        
                                    </tr></thead>');
                             
                             
                                    echo("<tbody>");
                                    // output data from row by row
                                    while($row = mysqli_fetch_assoc($result)) {
                                       
                                        echo (
                                        "<tr>
                                            <form method=\"post\" action=\"showorders.php\">
                                                <td>" . $row["Item_ID"] . "</td>
                                                <td>" . $row["Total_Stock"] . "</td>
                                                                       
                                              
                                            </form>
                                        </tr>");
                                        
                                    }

                                   echo ("</tbody></table></div>");


                                
                        }
                        mysqli_close($conn);
                        
                        
                        ?>
                     <!-- End  Total Stock -->
                </div>
                </div>
                </div>
                </div>
                        
            <!-- Update Stock -->
                 <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Update Stock</h1>
                        
                            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form method="post" action="">
                                Item ID:<br>
                                <input type="text" name="item_ID" ><br>
                                Quantity:<br>
                                <input type="integer" name="quantity" ><br><br>
                                <button type="submit" name="add" id="add" onclick="return confirm('Are you sure?')">ADD</button>
                                <button type="submit" name="rmv" id="rmv" onclick="return confirm('Are you sure?')">REMOVE</button>
                            </form>
                        </div>
                    </div>
                            
                </div>

                <?php

                include '../config/db_confg.php';

                if(isset($_POST['add'])){
                   
                    $item_ID = $_POST['item_ID'];
                    $qu = $_POST['quantity'];

                    $abc = "UPDATE stock SET Total_Stock = Total_Stock + '$qu' WHERE Item_ID = '$item_ID'";      
                    
                    $result2 = mysqli_query($conn, $abc);

                    $xyz = "SELECT Total_Stock from stock WHERE Item_ID = '$item_ID' ";
                    $result1 = mysqli_query($conn, $xyz);
                    
                    $row =mysqli_fetch_assoc($result1);
                    $Stock= $row['Total_Stock'];


                    echo    "<script type='text/javascript' language='javascript'>

                                    alert('Stock Updated Successfully. New Stock is $Stock');
   
                                </script>";
                    

                }
                else if(isset($_POST['rmv'])){

                    
                    $item_ID = $_POST['item_ID'];
                    $qu = $_POST['quantity'];

                    $abc = "UPDATE stock SET Total_Stock = Total_Stock - '$qu' WHERE Item_ID = '$item_ID'";      
                    
                    $result2 = mysqli_query($conn, $abc);

                    $xyz = "SELECT Total_Stock from stock WHERE Item_ID = '$item_ID' ";
                    $result1 = mysqli_query($conn, $xyz);
                    
                    $row =mysqli_fetch_assoc($result1);
                    $Stock= $row['Total_Stock'];


                    echo    "<script type='text/javascript' language='javascript'>

                                            alert('Stock Updated Successfully. New Stock is $Stock');
   
                                        </script>";;


                }

                ?>
                    </div>

                </div>
                </div>

            </div>
                        
             <!-- Update Stock -->
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
