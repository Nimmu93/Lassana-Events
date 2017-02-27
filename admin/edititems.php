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
    
    <title>Edit Items</title>

</head>
<body>
    <div id="wrapper">
        <?php include '../config/adminheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit Items</h1>
                        <form action="edititems1.php" method="POST" class="form-horizontal form-label-left" novalidate>
                              <div class="title_left">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                  <div class="input-group">
                                    <input id="itemID" name="itemID" type="text" class="form-control" placeholder="Item ID">
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
				
				<div class="col-md-6 col-sm-6 col-xs-12" >
                  <div class="panel panel-info">
                        <div class="panel-heading">
                           Enter Details of the new item
                        </div>
                        <div class="panel-body">
                            <?php
                            include '../config/db_confg.php';
                            $select = "SELECT * FROM stock ";
                            $result = mysqli_query($conn, $select);
                            if ( mysqli_num_rows($result) > 0) {
                            // print table heads//
                                echo ('<div class="table-responsive"><table border=1 class="table table-bordered" >
                                    <thead style="background-color:#656565;color:#ffffff;">
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Item Name</th>
                                        <th>Item Type</th>
                                        <th>Total Stock</th>
                                        <th>Unit Price</th>
                                    </tr></thead>');
                                    echo("<tbody>");
                                    // output data from row by row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo (
                                        "<tr>
                                            <form method=\"post\" action=\"edititems.php\">
                                                <td> " . $row["Item_ID"]. "  </td>
                                                <td>" . $row["Item_Name"] . "</td>
                                                <td>" . $row["Item_Type"]." </td>
                                                <td>" . $row["Total_Stock"]." </td>
                                                <td>" . $row["Unit_Price"]." </td>
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
