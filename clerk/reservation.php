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



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reservation</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
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
                
                <h3 style="float:left;color:#b5b9bc"> Executive</h3>

              <a style="margin-left:50px;margin-top:10px" href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                

            </div>
        </nav>
        <!-- /. NAV side  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <?php

                    include '../config/db_confg.php';

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
                        <a class="active-menu" href="reservation.php"><i class="fa fa-desktop "></i>Make Reservation</a>
                         <ul>
                            <li><a href="chairs.php"><i class="fa fa-table "></i>  Chairs</a></li>
                                
                            <li><a href="tables.php"><i class="fa fa-table "></i> Tables</a></li>
                                
                            <li><a href="tents.php"><i class="fa fa-flag-o "></i>  Tents</a></li>
                             
                             <li><a href="others.php"><i class="fa fa-gears "></i> Other Services</a></li>
                                
                            <li><a href="gallery.php"><i class="fa fa-photo "></i>  Gallery</a></li>
                                
                        </ul>
                    </li>
                     <li>
                        <a href="orders.php"><i class="fa fa-tasks "></i>Orders </a>
                                                
                    </li>
                    
                     
                              
                    <li>
                        <a href='../login.php?q=logout'><i class="fa fa-flash "></i>Logout</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        
        
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Reservation</h1>
                    </div>       

                </div>
                
                <div class="row">
                
                    <div class="col-md-4">
                        <a href="chairs.php" ><button class="btn btn-lg btn-primary" style="font-size:24px"><i class="glyphicon glyphicon-th-list"></i>Chairs</button></a>
                        
                    </div>
                    <div class="col-md-4">
                        <a href="tables.php" ><button class="btn btn-lg btn-primary" style="font-size:24px"><i class="glyphicon glyphicon-th-list"></i>Tables </button></a>
                    </div>
                    <div class="col-md-4">
                        <a href="tents.php" ><button class="btn btn-lg btn-primary" style="font-size:24px"><i class="glyphicon glyphicon-flag"></i>Tents</button></a>
                    </div>
                </div>
                <br>
                <div class="row">
                
                    <div class="col-md-4">
                        <a href="catering.php" ><button class="btn btn-lg btn-primary" style="font-size:24px"><i class="glyphicon glyphicon-cutlery"></i>Catering</button></a>
                    </div>
                    <div class="col-md-4">
                        <a href="others.php" ><button class="btn btn-lg btn-primary" style="font-size:24px"><i class="glyphicon glyphicon-cog"></i>Other </button></a>
                    </div>
                    <div class="col-md-4">
                        <a href="gallery.php" ><button class="btn btn-lg btn-primary" style="font-size:24px"><i class="glyphicon glyphicon-picture"></i>Gallery</button></a>
                    </div>
                </div>
                
                
                <!-- /. ROW  -->
                
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
               
                
               
                   
           

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
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    


</body>
</html>
