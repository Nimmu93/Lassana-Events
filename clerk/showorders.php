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
    <title> Order Details</title>

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
    
    <style>
        p{ color:#124a76;}
    </style>
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
                
                <h3 style="float:left;color:#b5b9bc"> Executive</h3>

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
                        <a  href="reservation.php"><i class="fa fa-desktop "></i>Make Reservation</a>
                         
                    </li>
                     <li>
                        <a class="active-menu" href="orders.php"><i class="fa fa-tasks "></i>Orders </a>
                                                
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
                        include 'db_confg.php';

                            $id = $_POST["resid"];
                        
                            $select = "SELECT * FROM orders WHERE order_id='$id' ";
                            $result = mysqli_query($conn, $select);
                            
                                                       
                            if ( mysqli_num_rows($result) > 0) {

                                $row = mysqli_fetch_assoc($result);

                                
                             ?>

                            <p><b>Order_ID:</b>
<div class="fg">
<div class="alert alert-info" style="font-size:16"><?php echo $row['order_id']; ?></div>
</p> 
<p><b>Name: </b> 
<div class="fg">
<div class="alert alert-info" style="font-size:16"> <?php echo $row['cname']; ?></div>
</p> 
<p><b>Phone Number:  </b>
<div class="fg">
<div class="alert alert-info" style="font-size:16">  <?php echo $row['cnumber']; ?></div>
</p> 
<p><b>Items:  </b>
<div class="fg">
<div  class="alert alert-info"tyle="font-size:16">   <?php echo $row['items']; ?></div>
</p> 
<p><b>Date: </b> 
<div class="fg">
<div class="alert alert-info" style="font-size:16">   <?php echo $row['date']; ?></div>
</p> 
<p><b>Time: </b> 
<div class="fg">
<div class="alert alert-info" style="font-size:16">   <?php echo $row['time']; ?></div>
</p> 
<p><b>City: </b> 

   <div class="alert alert-info" style="font-size:16">   <?php echo $row['city']; ?></div>
   </p> 
   <p><b>Address: </b> 
   <div class="fg">
      <div class="alert alert-info" style="font-size:16">   <?php echo $row['address']; ?></div>
      </p> 
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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
