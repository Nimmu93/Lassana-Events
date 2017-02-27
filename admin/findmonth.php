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
                        <div class="panel-heading">
                            <form action="findmonth.php" method="POST" class="form-horizontal form-label-left" novalidate>
                              <div class="title_left">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                  <div class="input-group">
                                    <input id="month" name="month" type="text" class="form-control" placeholder="Month">
                                    <span class="input-group-btn">
                                      <button id="month" name="month" type="submit" class="btn btn-default" value="search">Search</button>
                                    </span>
                                  </div>
                                </div>
                              </div>
                          </form>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php
                                  include '../config/db_confg.php';
                                  $month=$_POST['month'];
                                 
                                  $sql="SELECT * FROM month_summary WHERE month='$month';";
                                  $result = mysqli_query($conn, $sql);
                                  if ( mysqli_num_rows($result) > 0) {
                                    // print table heads//
                                    echo ('<div class="table-responsive"><table border=1 class="table table-bordered" >
                                          <thead style="background-color:#656565;color:#ffffff;">
                                          <tr>
                                            <th>Month</th>
                                            <th>No of Orders</th>
                                            <th>Total Sales</th>
                                          </tr></thead>');
                                          echo("<tbody>");
                                            // output data from row by row
                                            while($row = mysqli_fetch_assoc($result)) {
                                              echo (
                                                "<tr>
                                                  <form method=\"post\" action=\"findmonth.php\">
                                                    <td> " . $row["month"]. "  </td>
                                                    <td>" . $row["number_of_orders"] . "</td>
                                                    <td>" . $row["total_sales"]." </td>
                                                  </form>
                                                </tr>");
                                            }
                                            echo ("</tbody></table></div>");
                                    }
                                    mysqli_close($conn);
                                ?>
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
