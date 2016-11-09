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
    
    <title>Create New Account</title>

</head>
<body>
    <div id="wrapper">
        <?php include '../config/adminheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Create New Account</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				
				<div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="panel panel-info">
                        <div class="panel-heading">
                           NEW ACCOUNT FORM
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                        
                                 <div class="form-group">
                                            <label>Employee ID</label>
                                            <input class="form-control" type="text">
                                    </div>
								<div class="form-group">
                                            <label>Employee Type</label>
                                            <input class="form-control" type="text">
                                    </div>
								<div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" type="text">
                                    </div>
								<div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" type="text">
                                    </div>
                                 <div class="form-group">
                                            <label>Enter Password</label>
                                            <input class="form-control" type="password">
                                     </div>
                                <div class="form-group">
                                            <label>Re Type Password </label>
                                            <input class="form-control" type="password">
                                      </div>
								<div class="form-group">
                                            <label>Contact Number</label>
                                            <input class="form-control" type="number" min="10" max="10">
                                    </div>
								<div class="form-group">
                                            <label>NIC Number</label>
                                            <input class="form-control" type="text" maxlength="10">
                                    </div>
								<div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" type="text">
                                    </div>
								<div class="form-group">
                                            <label>E-mail Address</label>
                                            <input class="form-control" type="text">
                                    </div>
								<div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="pic" accept="image/*">
                                    </div>	
									
								<!-- <div class="form-group">
									<label class="control-label col-lg-4">Image Upload</label>
									<div class="">
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
											<div>
												<span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file"></span>
												<a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
											</div>
										</div>
									</div>
								</div>	 -->
								 
                                 <button type="submit" class="btn btn-info">CREATE </button>

                             </form>
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
