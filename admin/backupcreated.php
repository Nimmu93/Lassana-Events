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
    <title>Backup!</title>
    <style type="text/css">
  
    </style>
<body>
    <div id="wrapper">
        <?php include '../config/adminheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">create BACKUP</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				
				<div class="col-md-5">
                     <!--   Summary Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Need to save or copy the database in case of emergency?
                        </div>
                        <div class="panel-body">
                            <div >
                              <form action="../config/backup1.php" method="POST" class="form-horizontal form-label-left" novalidate>
                                <div class="title_left">
                                  <div class="col-md-5 col-sm-5 col-xs-8">
                                    <div class="input-group" style="color: red;font-size: 24px">
                                      <p>Backup created!</p>
                                      </div>
                                    </div>
                                    
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>                     
                </div> <!-- End  Summary Table  -->
				
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
