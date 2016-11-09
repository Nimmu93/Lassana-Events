<html> 
    <head>
        
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="../assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    
    <style>
        body{
            font-family: 'Questrial', sans-serif;
        }
    </style>
    
    </head>

<body>
    <nav class="navbar navbar-cls-top " role="navigation" >
            
            <img  src="../assets/img/logo.png" style="margin:5px " >
            
    </nav>
    <!-- Left navigation with user details  -->
        <nav class="navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <?php
                        include '../config/db_confg.php';
                        $query = $conn->query("select * from users1 where uid='$uid'");
                        while($row = mysqli_fetch_assoc($query)){
                        ?>
                        
                        <div class="user-img-div">
                            <img class="photo" src="<?php echo $row['location']; ?>" >
                            <?php } ?>
                            <br><br>
                            
                            <div class="inner-text">
                               <?php echo $user->get_fullname($uid); ?>
                                                     
                            </div>
                        </div>

                    </li>


                    <li>
                        <a class="active-menu" href="orders.php"><i class="fa fa-tasks "></i>Orders</a>
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
                        <a  href="#"><i class="fa fa-database "></i>Items </a>
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
                        <a href="inbox.php"><i class="fa fa-inbox "></i>Inbox</a>
                         
                    </li>    
                    <li>
                        <a href='../login.php'><i class="fa fa-flash "></i>Logout</a>
                    </li>
                </ul>

            </div>

        </nav>
        
</body>

</html>