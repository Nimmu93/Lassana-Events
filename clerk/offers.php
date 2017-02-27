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
    
    
<body id="orders">
    <div id="wrapper">
    	<?php include '../config/clerkheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">

                    <div class="col-md-12">
                        <h1 class="page-head-line">Offers</h1>
                    </div>

                </div>
                
         
            <div  class="row">
                <div class="col-md-6 col-sm-6 col-xs-12" >
                  <div class="panel panel-info">
                        <div class="panel-heading">
                           Enter details of the offers 
                        </div>
                        <div class="panel-body">
                            <form method="post" action="" >

                                  <div class="form-group">
                                            <label>Offer number</label>
                                            <div class="radio" required>
                                                <label>
                                                    <input type="radio" name="offer" value="1" required>Offer 1
                                                </label>
                                            
                                           
                                                <label>
                                                    <input type="radio" name="offer"  value="2">Offer 2
                                                </label>
                                            
                                            
                                                <label>
                                                    <input type="radio" name="offer"  value="3">Offer 3
                                                </label>
                                            </div>
                                  </div>
                                        
                                  <div class="form-group">
                                            <label>Title of the offer- 1 </label>
                                            <input class="form-control" required type="text" name="offer_title" required>
                                  </div>
                                  <div class="form-group">
                                            <label>Description of the offer</label>
                                            <input class="form-control" required type="text" name="offer_details" required>
                                  </div>
                                  <button type="submit" class="btn btn-info"  name="update">Update offer </button>
                            </form>
                        </div>        
              
                            <?php

                            include '../config/db_confg.php';

                            if(isset($_POST['update'])){

                                $number = $_POST['offer'];
                                $title = $_POST['offer_title'];
                                $details = $_POST['offer_details'];
                                

                                $sql = "UPDATE offers SET title='$title',details='$details' WHERE id ='$number'";
                                $result=mysqli_query($conn, $sql);


                                echo    "<script type='text/javascript' language='javascript'>

                                            alert('Offer 1 is updated successfully!');
   
                                        </script>";
                                        




                            ?>


                            <script>
                                window.location = 'offers.php';
                            </script>
                            <?php
                            }
                            ?>



                               
                               
                           
                         </div>
                     </div>
                 </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
            </div>
    <!-- /. WRAPPER  -->
    

    <?php include '../config/footer.php'; ?>
    <!-- /. FOOTER  -->

</body>
</html>
