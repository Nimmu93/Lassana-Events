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
    <title>Orders</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    
    <style>
        body{
            font-family: 'Questrial', sans-serif;
        }
    </style>
    
</head>
    
    
<body>
    <div id="wrapper">
        <nav class="navbar navbar-cls-top " role="navigation" >
            
            <img  src="../assets/img/logo.png" style="margin:5px " >
            
        </nav>
        <!-- Left navigation with user details  -->
        <nav class="navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <?php
                        include '../config/db_confg.php';
                        $query = $conn->query("select * from users1 where uid='$uid'");
                        while($row = mysqli_fetch_assoc($query)){
                        ?>
                        
                        <div class="user-img-div">
                            <img class="photo" src="<?php echo $row['location']; ?>" >
                            <?php } ?>
                            <br><br>
                            
                            <div class="inner-text">
                               <?php echo $user->get_fullname($uid); ?>
                                                     
                            </div>
                        </div>

                    </li>


                    <li>
                        <a id="active-menu" href="orders.php"><i class="fa fa-dashboard "></i>Orders</a>
                    </li>
                    <li>
                        <a href="reservation.php"><i class="fa fa-desktop "></i>Reservation</a>
                         
                    </li>
                    
                    <li>
                        <a href='../login.php?q=logout'><i class="fa fa-flash "></i>Logout</a>
                    </li>
                </ul>

            </div>

        </nav>
        
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
            <form  method="post" action="searchorder.php">
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
            <div  class="row">
                <div class="col-md-12">
                  <!--   search orders -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Orders to be delivered
                        </div>
                        <div class="panel-body">
                             <?php
                        include '../config/db_confg.php';
                        
                            $select = "SELECT * FROM orders ";
                            $result = mysqli_query($conn, $select);
                            
                                                       
                            if ( mysqli_num_rows($result) > 0) {
                                            
                            // print table heads//
                                
                                echo ('<div ><table border=1 class="table table-bordered" >
                                    <thead >
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
                                            <form method=\"post\" action=\"showorders.php\">
                                                <td>" . $row["order_id"] . "</td>
                                                <td>" . $row["date"] . "</td>
                                                <td>" . $row["cname"] . "</td>
                                                <td>" . $row["cnumber"] . "</td>
                                                <td>" . $row["city"] . "</td>
                                                <td>
                                                <input name=\"resid\" type=\"hidden\" id=\"resid\" value=\"".$row["order_id"]."\"\>
                                                <input class=\"delete1\" name=\"show\" type=\"submit\" id=\"show\" value=\"View Details\">
                                                </td>
                                                                                    
                                              
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
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>


</body>
</html>
