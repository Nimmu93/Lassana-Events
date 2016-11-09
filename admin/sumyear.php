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
    
    <title>Summary By Year</title>


</head>
<body>
    <div id="wrapper">
        <?php include '../config/adminheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">SUMMARY BY YEAR</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				
				<div class="col-md-9" >
                     <!--   Summary Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <center> Summary Of Sales </center>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive" >
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Year</th>
                                            <th>Month</th>
                                            <th>Number of Transactions</th>
                                            <th>Value (Rs.)</th>
											<th>                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2016</td>
                                            <td>January</td>
                                            <td>xx</td>
                                            <td>xxxxx</td>
											<th><a href="#more_info">View More Details</a></th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>February</td>
                                            <td>xx</td>
                                            <td>xxxxx</td>
											<th><a href="#more_info">View More Details</a></th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>March</td>
                                            <td>xx</td>
                                            <td>xxxxx</td>
											<th><a href="#more_info">View More Details</a></th>
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
