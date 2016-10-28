<?php
   session_start();
   include_once 'class.user.php';
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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stock</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Lassana Party</a>
            </div>

            <div class="header-right">
                
                <h3 style="float:left;color:#b5b9bc"> Stock Keeper</h3>

              <a style="margin-left:50px;margin-top:10px" href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <?php

                    include 'db_confg.php';

                     $query = $conn->query("select * from users1 where uid='$uid'");
                     while($row = mysqli_fetch_assoc($query)){
                     
                    
                     ?>
                        <div class="user-img-div">
                            <img class="photo" src="<?php echo $row['location']; ?>" width="100" height="180">
                    <?php } ?>
                    <br>
                    <br/>
                            <div class="inner-text">
                               <?php echo $user->get_fullname($uid); ?>
                                                     
                            </div>
                        </div>

                    </li>


                    <li>
                        <a  href="home.php"><i class="fa fa-dashboard "></i>Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="stock.php"><i class="fa fa-desktop "></i>Stock</a>
                         
                    </li>
                     <li>
                        <a href="orders.php"><i class="fa fa-yelp "></i>Orders </a>
                                                
                    </li>
                       
                    <li>
                        <a href='login.php?q=logout'><i class="fa fa-flash "></i>Logout</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
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
                        include 'db_confg.php';
                        
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
                        include 'db_confg.php';
                        
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

                include 'db_confg.php';

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
   <div id="footer-sec">
        &copy; 2016 Lassana Party | Design By : <a href="http://www.binarytheme.com/" target="_blank">Root Fixers</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
