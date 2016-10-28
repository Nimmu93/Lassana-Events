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
    <title>Reservation</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!--WIZARD STYLES-->
    <link href="assets/css/wizard/normalize.css" rel="stylesheet" />
    <link href="assets/css/wizard/wizardMain.css" rel="stylesheet" />
    <link href="assets/css/wizard/jquery.steps.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
    <style>
        th,td {
            padding: 10px 20px 10px 20px;
        }
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
                <!-- /. NAV side  -->
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
                        <h1 class="page-head-line">Reservation </h1>
                        

                    </div>
                </div>
                <!-- /. ROW  -->
               <div class="row">
                  <div class="col-md-12">                     
         <div class="panel panel-default">
                        <div class="panel-heading">
                            Reservation Process
                        </div>
                        <div class="panel-body">
                             <div id="wizard">
                <h2>Check Availability</h2>
                <section>
                    <center>
                         <table>

                            <form method="post" action=""> 
                                <tr>
                                    <th>Item Type </th>
                                    <td><input class="form-control" type="text" name="item_type"></td> <!--using php session varibales show the selected item type as in chair/tent/table -->
                                </tr>
                                
                                <tr>
                                    <th>Item Name </th>
                                    <td><input class="form-control" type="text" name="item"></td> <!--using php session varibales show the selected item name as in square/circular/ -->
                                </tr>
                                
                                <tr>
                                    <th >Color <span class="color-red">*</span></th>
                                    <td ><select class="form-control" name="colors"><option value="white">White</option> </select></td><!--derive drop down list based on the item chosen in the previous page-->
                                </tr>
                                
                                <tr>
                                    <th >Quantity <span class="color-red">*</span></th>
                                    <td > <input class="form-control" type="text" name="quantity"></td> 
                                </tr>
                                <tr>
                                    <th>Date <span class="color-red">*</span></th>
                                    <td> <input class="form-control" type="date" name="date"></td> 
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td> <center><input type="reset"></center> </td>
                                </tr>
                                
                                <tr>
                                    <td><p></p></td>
                                    <td></td>
                                </tr>
                                
                                <tr>
                                    <td><button type="submit" name="ava" id="ava" class="btn btn-panel" style="width:100%" >Check Availability</button>

    <!-- Algorithm to check availability of an item-->
                                    <?php
                                        include 'db_confg.php';

                                       

                                        if(isset($_POST['ava'])){
                                            $date= $_POST['date'];
                                            $item= $_POST['item'];
                                            $quantity= $_POST['quantity'];

                                            $date2 = mysqli_query($conn,"SELECT Date FROM item");
                                            $row =mysqli_fetch_assoc($date2);
                                            $result2= $row['Date'];

                                            $item2 = mysqli_query($conn,"SELECT Item_Name FROM item");
                                            $row2=mysqli_fetch_assoc($item2);
                                            $result3= $row2['Item_Name'];

                                            $item3 = mysqli_query($conn,"SELECT Item_Name FROM stock");
                                            $row3=mysqli_fetch_assoc($item3);
                                            $result6= $row3['Item_Name'];

                                            $stock = mysqli_query($conn,"SELECT Stock_In FROM item");
                                            $row3=mysqli_fetch_assoc($stock);
                                            $result4= $row3['Stock_In'];

                                            $stock2= mysqli_query($conn,"SELECT Total_Stock FROM stock");
                                            $row4=mysqli_fetch_assoc($stock2);
                                            $result5= $row4['Total_Stock'];

                                            
                                                if ($result2==$date && $result3==$item){
                                                    if($result4>=$quantity){
                                                        echo "<script type='text/javascript' language='javascript'>
                                                            alert('You can not order' );
    
                                                            </script>";
                                                    }
                                                    else{
                                                    echo "<script type='text/javascript' language='javascript'>
                                                            alert('You can not order');
    
                                                            </script>";
                                                    }
                                                }else if($result5>=$quantity && $result6 == $item ){

                                                    echo "<script type='text/javascript' language='javascript'>
                                                            alert('You can order');
    
                                                            </script>";
                                                }else{
                                                    echo "<script type='text/javascript' language='javascript'>
                                                            alert('You can not order');
    
                                                            </script>";
                                                }
                                            
                                        }
                                                                                 
                                    
                                    ?>
<!--end of the algorithm-->
                                    </td>
                                    

                                </tr>                        
                            
                            </form>
                            </table>
                        </center>
                </section>

                <h2>Check Cost</h2>
                <section>
                    
                </section>

                <h2>Customer Details</h2>
                <section>
                    
                </section>

                <h2>Make Payment</h2>
                <section>
                    
                </section>
            </div>
                             
                        </div>
                    </div>
                 </div>
                </div>
                   <!-- /. ROW  -->
                
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- WIZARD SCRIPTS -->
    <script src="assets/js/wizard/modernizr-2.6.2.min.js"></script>
    <script src="assets/js/wizard/jquery.cookie-1.3.1.js"></script>
    <script src="assets/js/wizard/jquery.steps.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>   
</body>
</html>
