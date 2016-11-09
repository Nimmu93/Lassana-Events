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
    
    <title>Summary By Month</title>

   
<body>
    <div id="wrapper">
        <?php include '../config/adminheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">SUMMARY BY MONTH</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				
				<div class="col-md-9">
                     <!--   Summary Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <center> Summary Of Sales </center>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table" >
                                    <thead>
                                        <tr>
                                            <th>Month</th>
                                            <th>Item Type</th>
                                            <th>Number of Orders Placed</th>
                                            <th>Sales</th>
											<th>Total Sales</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>July</td>
                                            <td>Chair</td>
                                            <td>xx</td>
                                            <td>xxxx</td>
											<th></th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Tent</td>
                                            <td>xx</td>
                                            <td>xxx</td>
											<th></th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Table</td>
                                            <td>xx</td>
                                            <td>xxx</td>
											<th></a></th>
                                        </tr>
										<tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
											<th>xxxxxxxx</th>
                                        </tr>
										
                                    </tbody>
                                </table>
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
