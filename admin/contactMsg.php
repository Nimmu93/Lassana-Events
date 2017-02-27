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
   
    <title>Feedback</title>
  
</head>
    
    
<body id="orders">
    <div id="wrapper">
    	<?php include '../config/adminheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Feedbacks</h1>
                    </div>

                </div>
                <!-- /. ROW  -->
         <br/>
         <br>
            <div  class="row">
                <div class="col-md-12">
                  <!--   search orders -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Feedbacks from Customers
                        </div>
                        <div class="panel-body">
                             <?php
                        include '../config/db_confg.php';
                        
                            $select = "SELECT * FROM contact ";
                            $result = mysqli_query($conn, $select);
                            
                                                       
                            if ( mysqli_num_rows($result) > 0) {
                                            
                            // print table heads//
                                
                                echo ('<div ><table border=1 class="table table-bordered" >
                                    <thead >
                                    <tr>

                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        
                                        
                                    </tr></thead>');
                             
                             
                                    echo("<tbody>");
                                    // output data from row by row
                                    while($row = mysqli_fetch_assoc($result)) {
                                       
                                        echo (
                                        "<tr>
                                            <form method=\"post\" action=\"showorders.php\" target=\"_blank\">
                                                <td>" . $row["Name"] . "</td>
                                                <td>" . $row["Email"] . "</td>
                                                <td>" . $row["subject"] . "</td>
                                                <td>" . $row["Comments"] . "</td>
                                           
                                              
                                            </form>
                                        </tr>");
                                        
                                    }

                                   echo ("</tbody></table></div>");
                                
                        }
                        mysqli_close($conn);
                        
                        
                        ?>
                     <!-- End  -->
                </div>
                
            </div>
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

    <!-- Navigation SCRIPTS -->
    <script src="../assets/js/active.js" > </script>
    

</body>
</html>
