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
    <title>Search Orders</title>

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
                
                <h3 style="float:left;color:#b5b9bc"> Administrator</h3>

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
                        <a class="active-menu" href="orders.php"><i class="fa fa-tasks "></i>Orders</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user "></i>Accounts</a>
                        <ul>
                            <li><a href="newacc.php"><i class="fa fa-plus "></i>  Add Accounts</a></li>
                                
                            <li><a href="editacc.php"><i class="fa fa-gears "></i> Edit Accounts</a></li>
                                
                            <li><a href="deleteacc.php"><i class="fa fa-minus "></i>  Delete Accounts</a></li>
                                
                        </ul>
                         
                    </li>
                     <li>
                        <a  href="#"><i class="fa fa-database "></i>Items </a>
                         <ul>
                             <li><a href="additems.php"><i class="fa fa-plus "></i>  Add Items</a></li>
                                
                             <li><a href="edititems.php"><i class="fa fa-gears "></i> Edit Items</a></li>
                                
                             <li><a href="deleteitems.php"><i class="fa fa-minus "></i>  Delete Items</a></li>
                                
                        </ul>
                                                
                    </li>
                    <li>
                        <a  href="#"><i class="fa fa-file-text"></i>Summary </a>
                        <ul>
                            <li><a href="sumyear.php"><i class="fa fa-calendar-o "></i> Year</a></li>
                                
                            <li><a href="summonth.php"><i class="fa fa-calendar-o "></i> Month </a></li>
                                
                            
                                
                        </ul>
                                                
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
                        include 'db_confg.php';

                        
                        
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
