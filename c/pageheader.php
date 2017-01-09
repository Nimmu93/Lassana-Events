
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.css" rel="stylesheet">
        
        <!-- CSS Stylesheets-->
        <link rel="stylesheet" href="../assets/css/web/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/web/lassana.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/web/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/web/imgres.css" rel="stylesheet">

        

        <!-- Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet"> 

        <style>
            a{

            }
        </style>

<!-- === Start HEADER === -->
            <div id="header">
                <div class="container no-padding">
                    <div class="row">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html" title="">
                                <img src="../assets/img/logo.png" alt="Logo" height= />
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>
                </div>
            </div>
            <!-- Top Menu -->

            <div id="hornav" class="container no-padding ">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 no-padding">
                        
                            <ul id="hornavmenu" class="topnav" >
                                <li>
                                    <a href="../index.php" ">Home</a>
                                </li>
                                
                                <li>
                                     <a href="chairs.php">Chairs</a>
                                </li>
                                
                                <li>
                                    <a href="tables.php"><span >Tables</span></a>
                                    
                                </li>
                                
                                <li>
                                    <a href="marquees.php"><span >Marquees</span> </a>
                                    
                                </li>
                                
                                 <li>
                                     <a href="more.php">More services</a>
                                </li>
                                
                                <li>
                                    <a href="gallery.php">Gallery</a>
                                </li>
                                
                                <li>
                                    <a href="contact.php">Contact </a>
                                </li>

                                <li>
                                    <a href="cart.php"><span class="fa fa-shopping-cart" >
                                    <?php
                                    
                                    $Total = 0;
                                    $cartSesID=3574;
                                    foreach ($_SESSION as $value) {////if start
                                        if($value[0] == $cartSesID){
                                            $Total += 1;
                                        }//end if
                                    }
                                    echo " "." <b>".$Total."</b> ";
                                    ?>
                                     </span> Items</a>
                                    
                                </li>


                                <li class="icon">
                                    <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
                                </li>
                            
                                
                            </ul>
                        
                    </div>
                </div>
            </div>
            <!-- End Top Menu -->

            
            <div id="post_header" class="container" style="height:0px">
            </div>


            <script>
            function myFunction() {
                var x = document.getElementById("hornavmenu");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
                }
            </script>
            <!-- === END HEADER === -->