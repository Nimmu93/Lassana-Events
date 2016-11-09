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
   
    <title>Orders</title>
  
</head>
    
    
<body>
    <div id="wrapper">
        <?php include '../config/clerkheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Reservation</h1>
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
         
            
                     <!-- End  -->
                </div>
                
            </div>
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        
    

    <?php include '../config/footer.php'; ?>
    <!-- /. FOOTER  -->

 
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    

</body>
</html>
