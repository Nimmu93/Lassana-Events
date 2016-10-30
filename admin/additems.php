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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Items</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>
		
		$('#cat').click(function(){
			$('#uploadPreview').attr('src', "../assets/img/demoUpload.jpg");
			});
		
		</script>
	
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">COMPANY NAME</a>
            </div>

            <div class="header-right">
                
                <h3 style="float:left;color:#b5b9bc"> Administrator</h3>

              <a style="margin-left:50px;margin-top:10px" href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                

            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <?php

                    include '../config/db_confg.php';

                     $query = $conn->query("select * from users1 where uid='$uid'");
                     while($row = mysqli_fetch_assoc($query)){
                     
                    
                     ?>
                        <div class="user-img-div">
                            <img class="photo" src="<?php echo $row['location']; ?>" width="100" height="180">
                    <?php } ?>
                    <br>
                    <br/>
                            <div class="inner-text">
                               <?php echo $user->get_fullname($uid); ?>
                                                     
                            </div>
                        </div>

                    </li>


                    <li>
                        <a  href="orders.php"><i class="fa fa-tasks "></i>Orders</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user "></i>Accounts</a>
                        <ul>
                            <li><a href="newacc.php"><i class="fa fa-plus "></i>  Add Accounts</a></li>
                                
                            <li><a href="editacc.php"><i class="fa fa-gears "></i> Edit Accounts</a></li>
                                
                            <li><a href="deleteacc.php"><i class="fa fa-minus "></i>  Delete Accounts</a></li>
                                
                        </ul>
                         
                    </li>
                     <li>
                        <a class="active-menu" href="#"><i class="fa fa-database "></i>Items </a>
                         <ul>
                             <li><a href="additems.php"><i class="fa fa-plus "></i>  Add Items</a></li>
                                
                             <li><a href="edititems.php"><i class="fa fa-gears "></i> Edit Items</a></li>
                                
                             <li><a href="deleteitems.php"><i class="fa fa-minus "></i>  Delete Items</a></li>
                                
                        </ul>
                                                
                    </li>
                    <li>
                        <a  href="#"><i class="fa fa-file-text"></i>Summary </a>
                        <ul>
                            <li><a href="sumyear.php"><i class="fa fa-calendar-o "></i> Year</a></li>
                                
                            <li><a href="summonth.php"><i class="fa fa-calendar-o "></i> Month </a></li>
                                
                            
                                
                        </ul>
                                                
                    </li>
                      
                    <li>
                        <a href='../login.php?q=logout'><i class="fa fa-flash "></i>Logout</a>
                    </li>
					
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
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
                                            <img id="uploadPreview"  height="50%" width="50%" src="assets/img/demoUpload.jpg" >
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
                        
                               move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $_FILES["image"]["name"]);
                               $location = "images/" . $_FILES["image"]["name"];
            
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
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>


</body>
</html>
