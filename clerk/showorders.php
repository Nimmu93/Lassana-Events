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
    
    <title> Order Details</title>

    
</head>
<body>
    <div id="wrapper">
        <?php include '../config/clerkheader.php'; ?>
  
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
                        
                            $select = "SELECT * FROM temp_res WHERE ResID=$id ";
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
<p><b>E-mail: </b> 
<div class="fg">
<div class="alert alert-info" style="font-size:16"> <?php echo $row['Email']; ?></div>
</p> 
<p><b>Phone Number:  </b>
<div class="fg">
<div class="alert alert-info" style="font-size:16">  <?php echo $row['ConNum']; ?></div>
</p>
<p><b>Date: </b> 
<div class="fg">
<div class="alert alert-info" style="font-size:16">   <?php echo $row['ResDate']; ?></div>
</p>
<p><b>Duration: </b> 
   <div class="alert alert-info" style="font-size:16">   <?php echo $row['Duration']; ?></div>
   </p> 
<p><b>City: </b> 
   <div class="alert alert-info" style="font-size:16">   <?php echo $row['District']; ?></div>
   </p> 
   
<p><b>Address: </b> 
   <div class="fg">
      <div class="alert alert-info" style="font-size:16">   <?php echo $row['Location']; ?></div>
      </p> 
   </div>
<p><b>Total Cost: </b> 
   <div class="alert alert-info" style="font-size:16">   <?php echo $row['TotalCost']; ?></div>
   </p>
<p><b>Labour Charge: </b> 
   <div class="alert alert-info" style="font-size:16">   <?php echo $row['Labour_Charge']; ?></div>
   </p> 
<p><b>Delivery Charge: </b> 
   <div class="alert alert-info" style="font-size:16">   <?php echo $row['Delivery_Charge']; ?></div>
   </p> 
<p><b>Advance Fee: </b> 
   <div class="alert alert-info" style="font-size:16">   <?php echo $row['Advance_Fee']; ?></div>
   </p> 
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
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>


</body>
</html>
