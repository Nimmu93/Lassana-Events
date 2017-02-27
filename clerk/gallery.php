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
    
    <title>Gallery Update</title>

    
</head>
<body>
    <div id="wrapper">
        <?php include '../config/clerkheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Update Gallery</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
        
        <div class="col-md-6 col-sm-6 col-xs-12" >
                  <div class="panel panel-info">
                        
                        <div class="panel-body">
                        
                              <form action="" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                    <label>Description for image</label>
                                    <input class="form-control" required type="text" name="title" required>
                              </div>
                              <div class="form-group">
                                    <label>Select image to upload:</label>
                                    <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" required>
                                    <img id="uploadPreview"  height="30%" width="30%" src="../assets/img/upload.png" >
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
                              <input type="submit" value="Upload Image" name="submit">
                              </form> 
                               
                          <?php

                          include '../config/db_confg.php';

                            if (empty($_POST['submit'])){
                              echo "No image is uploaded yet!";
                            }
                            else {

                            //for checking errors using uploadOk variable
                            $target_dir = "../assets/img/website/gallery/";
                            $target_file = $target_dir . basename($_FILES["image"]["name"]);
                            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                            $uploadOk = 1;

                               // Check if file already exists
                              if (file_exists($target_file)) {
                                echo "<script type='text/javascript' language='javascript'>

                                            alert('Image already exists!');
   
                                        </script>" ;
                                $uploadOk = 0;}

                              // Allow certain file formats
                              if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg" ) {
                                echo "<script type='text/javascript' language='javascript'>

                                            alert('Only Jpg or JPEG or PNG files are allowed!');
   
                                        </script>" ;
                                $uploadOk = 0;}

                                if ($uploadOk == 0) {
                                  echo "Sorry, your file was not uploaded.";

                                // if everything is ok, try to upload file
                                } else {

                              //to find tha path of the image
                               $image_name = addslashes($_FILES['image']['name']);

                               move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/img/website/gallery/".$image_name);
  
                               $location = "../assets/img/website/gallery/" . $_FILES["image"]["name"];
                               $title = $_POST['title'];
                               $updategallery = "insert into gallery(Title,image) values ('$title','$location')";
                               $result1=mysqli_query($conn, $updategallery);


                                echo    "<script type='text/javascript' language='javascript'>

                                            alert('Image is added to gallery');
   
                                        </script>";}

                            ?>
                            <script>
                                window.location = 'gallery.php';
                            </script>
                            <?php
                            }
                            ?>


                        </div> <!-- class="panel-body"-->
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

 
    
    

</body>
</html>
