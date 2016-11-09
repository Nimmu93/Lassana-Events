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
                    </div>
                </div>
                <!-- /. ROW  -->
				
				<div class="col-md-6 col-sm-6 col-xs-12" >
                  <div class="panel panel-info">
                        <div class="panel-heading">
                           Enter Details of the new item
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                        
                                 <div class="form-group">
                                            <label>Item ID</label>
                                            <input class="form-control" type="text">
                                    </div>
								<div class="form-group">
                                            <label>Item Type</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">Chair
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Tent
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Table
                                                </label>
                                            </div>
											<div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Other
                                                </label>
                                            </div>
                                        </div>
									
								<div class="form-group">
                                            <label>Item Name</label>
                                            <input class="form-control" type="text">
                                    </div>

								<div class="form-group">
                                            <label>Colors</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Red
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Blue
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Yellow
                                                </label>
                                            </div>
                                  <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Green
                                                </label>
                                            </div>
                                        </div>
									
								<div class="form-group">
                                            <label>Total Amount</label>
                                            <input class="form-control" type="number" max="11">
                                    </div>
								<div class="form-group">
                                            <label>Unit Price</label>
                                            <input class="form-control" type="number" max="11">
                                    </div>
									
								<div class="form-group">
                                            <label>Image</label> <br>
                                            <img id="uploadPreview"  height="50%" width="50%" src="assets/img/demoUpload.jpg" >
											<br>
											<br>
											<input id="uploadImage" type="file" name="myPhoto" onchange="PreviewImage();" />
											<!-- <button id="cat" >Remove</button> -->
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
								 
                                 <button type="submit" class="btn btn-info">UPDATE </button>

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
