<?php
  session_start();
  include '../config/class.user.php';

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
  <title>View Accounts</title>
</head>
<body>
  <div id="wrapper">
    <?php 
      include '../config/adminheader.php'; ?>
      <!-- Main content -->
      <div id="page-wrapper">
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
              <h1 class="page-head-line">View Account</h1>
            </div>
          </div>
          <!-- /. ROW  -->
          <div class="col-sm-3 col-md-3 pull-right">
            <form style="margin-top:15px;" method="post" action="searchacc.php">
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
          <div style="margin-top:15px;" class="row">
            <div class="col-md-12">
              <!--   search orders -->
              <div class="panel panel-info">
                <div class="panel-heading">
                  Existing Accounts
                </div>
                <div class="panel-body">
                  <?php
                    include '../config/db_confg.php';
                    $select = "SELECT * FROM users1 ";
                    $result = mysqli_query($conn, $select);
                    if ( mysqli_num_rows($result) > 0) {
                      // print table heads//
                      echo ('<div class="table-responsive"><table border=1 class="table table-bordered" >
                            <thead style="background-color:#656565;color:#ffffff;">
                            <tr>
                              <th>Employee ID</th>
                              <th>Employee Type</th>
                              <th>Employee Name</th>
                            </tr></thead>');
                            echo("<tbody>");
                              // output data from row by row
                              while($row = mysqli_fetch_assoc($result)) {
                                echo (
                                  "<tr>
                                    <form method=\"post\" action=\"searchacc.php\">
                                      <td> " . $row["uid"]. "  </td>
                                      <td>" . $row["employee_type"] . "</td>
                                      <td>" . $row["fullname"]." </td>
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
        <!-- /. WRAPPER  -->
        <?php include '../config/footer.php'; ?>
        <!-- /. FOOTER  -->
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="../assets/js/bootstrap.js"></script>   
  </body>
</html>
