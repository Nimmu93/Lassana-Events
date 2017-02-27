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
                        <a href="orders.php"><i class="fa fa-dashboard "></i>Orders</a>
                    </li>
                    <li>
                        <a href="stock.php"><i class="fa fa-desktop "></i>Stock</a>
                         
                    </li>
                    <li>
                        <a href='../config/login.php'><i class="fa fa-flash "></i>Logout</a>
                    </li>
                </ul>

            </div>

        </nav>
        
</body>

</html>