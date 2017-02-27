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
    
    <title>Add New Items</title>

    
</head>
<body>
    <div id="wrapper">
        <?php include '../config/adminheader.php'; ?>
  
        <!-- Main content -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add New Items</h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				
				<div class="col-md-6 col-sm-6 col-xs-12" >
                  <div class="panel panel-info">
                        <div class="panel-heading">
                           Enter Details of the new item
                        </div>
                        <div class="panel-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Item ID</label>
                                    <input class="form-control" required type="text" name="item_id">
                                </div>
								<div class="form-group">
                                            <label>Item Type</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="type1" value="Chair">Chair
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="type1"  value="Tent">Tent
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="type1"  value="Table">Table
                                                </label>
                                            </div>
											<div class="radio">
                                                <label>
                                                    <input type="radio" name="type1" value="Other">Other
                                                </label>
                                            </div>
                                </div>
									
								<div class="form-group">
                                            <label>Item Name</label>
                                            <input class="form-control" required type="text" name="item_name">
                                    </div>

								<div class="form-group">
                                            <label>Item Color</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="color" value="Red">Red
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="color"  value="Yellow">Yellow
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="color"  value="Blue">Blue
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="color" value="Green">Green
                                                </label>
                                            </div>
                                </div>
									
								<div class="form-group">
                                            <label>Total Amount</label>
                                            <input class="form-control" required type="number"  name="total-amount">
                                    </div>
								<div class="form-group">
                                            <label>Unit Price</label>
                                            <input class="form-control" required type="number"  name="unit_price">
                                    </div>
									
								<div class="form-group">
                                            <label>Image</label> <br>
                                            <img id="uploadPreview"  height="30%" width="30%" src="../assets/img/upload.jpg" >
                                            <br>
                                            <br>
                                            <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" />
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
							
								 
                                 <button type="submit" class="btn btn-info" id="create" name="create">CREATE </button>

                             </form>
                            <?php

                            include '../config/db_confg.php';

                            if(isset($_POST['create'])){

                               $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                               $image_name = addslashes($_FILES['image']['name']);
                               $image_size = getimagesize($_FILES['image']['tmp_name']);
                        
                               move_uploaded_file($_FILES["image"]["tmp_name"], "../assets/img/website/stock/".$image_name);
                               echo $image_name;
                               $location = "../assets/img/website/stock/" . $_FILES["image"]["name"];
            
                                $id = $_POST['item_id'];
                                $type = $_POST['type1'];
                                $name = $_POST['item_name'];
                                $color = $_POST['color'];
                                $amount = $_POST['total-amount'];
                                $uprice = $_POST['unit_price'];

                                $additem = "insert into stock(Item_ID,Item_Name,Item_Type,Unit_Price,location,color,Total_Stock) values ('$id','$name','$type','$uprice','$location','$color','$amount')";
                                $result1=mysqli_query($conn, $additem);


                                echo    "<script type='text/javascript' language='javascript'>

                                            alert('A new Item has been added');
   
                                        </script>";




                            ?>
                            <script>
                                window.location = 'additems.php';
                            </script>
                            <?php
                            }
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
