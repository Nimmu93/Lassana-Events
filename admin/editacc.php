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
    
    <title>Edit Account</title>

    
</head>
<body>
    <div id="wrapper">
        <?php include '../config/adminheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit Account</h1>
                    </div>
                    <div class="panel-heading">
                           <form action="editacc1.php" method="POST" class="form-horizontal form-label-left" novalidate>
                              <div class="title_left">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                  <div class="input-group">
                                    <input id="empID" name="empID" type="text" class="form-control" placeholder="Emp ID">
                                    <span class="input-group-btn">
                                      <button id="search" name="search" type="submit" class="btn btn-default" value="search">Search</button>
                                    </span>
                                  </div>
                                </div>
                              </div>
                          </form>
                        </div>
                </div>
                <!-- /. ROW  -->
				
				<div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-info">
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
                                          
                                                <td> " . $row["uid"]. "  </td>
                                                <td>" . $row["employee_type"] . "</td>
                                                <td>" . $row["fullname"]." </td>
                                           
                                        </tr>");
                                    }
                                   echo ("</tbody></table></div>");
                        }
                        mysqli_close($conn);
                        ?>
                         </div>
                     </div>
                 </div>

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
