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
        <?php include '../config/adminheader.php'; ?>
  
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
    <?php include '../config/footer.php'; ?>
    <!-- /. FOOTER  -->

 
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    

</body>
</html>
