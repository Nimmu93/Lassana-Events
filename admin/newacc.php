<?php
   session_start();
   include_once '../config/class.user.php';
   $page = "addAccount";
   $user = new User(); 
   $uid = $_SESSION['uid'];
   if (!$user->get_session()){
    header("location:home.php");
   }
   
   if (isset($_GET['q'])){
    $user->user_logout();
    header("location:home.php");
    }


    $row_cnt=0;
    if ($result = mysqli_query($conn, "SELECT uid FROM users1 ORDER BY uid")) {

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

    /* close result set */
    mysqli_free_result($result);
    }
    $row_cnt=$row_cnt+1



   ?>

<!DOCTYPE html>
<head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript"><!--
        function checkPass()
        {
            //Store the password field objects into variables ...
            var pass1 = document.getElementById('password');
            var pass2 = document.getElementById('rpassword');
            //Store the Confimation Message Object ...
            var message = document.getElementById('confirmMessage');
            //Set the colors we will be using ...
            var goodColor = "#66cc66";
            var badColor = "#ff6666";
            //Compare the values in the password field 
            //and the confirmation field
            if(pass1.value == pass2.value){
                //The passwords match. 
                //Set the color to the good color and inform
                //the user that they have entered the correct password 
                pass2.style.backgroundColor = goodColor;
                message.style.color = goodColor;
                message.innerHTML = "Passwords Match!"
            }else{
                //The passwords do not match.
                //Set the color to the bad color and
                //notify the user.
                pass2.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "Passwords Do Not Match!"
            }
        }  
    //--></script>
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
                            <form onsubmit="return confirm('Do you really want to create this Account?');" action="insertDB.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Employee ID</label>
                                    <input id="empID" name="empID" class="form-control" type="text" required="required" <?php echo "value='".$row_cnt."'>";?>
                                </div>
								<div class="form-group">
                                    <label>Employee Type</label>
                                    <input id="empType" name="empType" class="form-control" type="text" required="required">
                                </div>
								<div class="form-group">
                                    <label>User Name</label>
                                    <input id="uname" name="uname" class="form-control" type="text" required="required">
                                </div>
								<div class="form-group">
                                    <label>Fullname Name</label>
                                    <input id="fname" name="fname" class="form-control" type="text" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Enter Password</label>
                                    <input id="password" name="password" class="form-control" type="password" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Re Type Password </label>
                                    <input id="rpassword" name="rpassword" class="form-control" type="password" required="required" onkeyup="checkPass(); return false;">
                                    <span id="confirmMessage" class="confirmMessage"></span>
                                </div>
								<div class="form-group">
                                    <label>Contact Number</label>
                                    <input id="contact" name="contact" class="form-control" minlength="10" maxlength="10" type="text" required="required">
                                </div>
								<div class="form-group">
                                    <label>NIC Number</label>
                                    <input id="nic" name="nic" class="form-control" type="text" minlength="10" maxlength="10" required="required">
                                </div>
								<div class="form-group">
                                    <label>Address</label>
                                    <input id="address" name="address" class="form-control" type="text" required="required">
                                </div>
								<div class="form-group">
                                    <label>E-mail Address</label>
                                    <input id="email" name="email" class="form-control" type="text" required="required">
                                </div>
								<div class="form-group">
                                    <label>Image</label>
                                    <img id="uploadPreview"  height="50%" width="50%" src="assets/img/demoUpload.jpg" required="required">
                                    <br>
                                    <br>
                                    <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" />
                                    <script type="text/javascript">
                                        function PreviewImage() {
                                            var oFReader = new FileReader();
                                            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
                                            oFReader.onload = function (oFREvent) {
                                                document.getElementById("uploadPreview").src = oFREvent.target.result;
                                            };
                                        };
                                    </script>
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
