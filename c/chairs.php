<?php $con = mysqli_connect('localhost','root','','lassanaparty'); ?>
<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>Lassana Party | Chairs </title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- CSS Stylesheets-->
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/lassana.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=PT+Sans" type="text/css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
        
        <style>
            
        </style>
    </head>
    <body>
        <div id="body-bg">
            
            
            <div id="header">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html" title="">
                                <img src="assets/img/logo.png" alt="Logo" height= />
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>
                </div>
            </div>
            <!-- Top Menu -->
            <div id="hornav" class="container no-padding">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="text-center visible-lg">
                            <ul id="hornavmenu" class="nav navbar-nav">
                                <li>
                                    <a href="index.html" class="fa-home">Home</a>
                                </li>
                                <li>
                                    <span class="fa-table">Furniture</span>
                                    <ul>
                                        <li>
                                            <a href="chairs.php">Chairs</a>
                                        </li>
                                        <li>
                                            <a href="tables.html">Tables</a>
                                        </li>
                                        
                                        
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="tents.html"><span class="fa-flag">Tents</span></a>
                                    
                                </li>
                                
                                <li>
                                    <a href="catering.html"><span class="fa-spoon">Catering</span> </a>
                                    
                                </li>
                                
                                 <li>
                                    <span class="fa-gears">More Service</span>
                                    <ul>
                                        <li>
                                            <a href="cutlery.html">Cutlery</a>
                                        </li>
                                        <li>
                                            <a href="crockery.html">Crockery</a>
                                        </li>
                                        <li>
                                            <a href="glassware.html">Glassware</a>
                                        </li>
                                        <li>
                                            <a href="stage.html">Stage & Band Setup</a>
                                        </li>
                                        <li>
                                            <a href="dishes.html">Chaffing Dishes</a>
                                        </li>
                                        <li>
                                            <a href="bowls.html">Soup and Dessert Bowls</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                                <li>
                                    <span class="fa-camera">Gallery</span>
                                    <ul>
                                        <li>
                                            <a href="weddings.html">Wedding</a>
                                        </li>
                                        <li>
                                            <a href="parties.html">Party</a>
                                        </li>
                                        <li>
                                            <a href="Official.html">Official</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="contact.html"><span class="fa-phone">Contact</span></a>
                                    
                                </li>
                            
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Menu -->
        
            <!-- === END HEADER === -->
            
            
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Main Column -->
                        <div class="col-md-12"><center>
                            <!-- Main Content -->
                        <div class="headline" >
                                <h2>Reservation</h2>
                            </center>
                            <form> 
                            <table style="margin:0 0 1% 60%; width:40%;background-color: lightgrey; border-radius: 5px;color: #124a76;">
                                
                                <tr> 
                                    
                                    <th colspan="4" style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;text-align:center" >Item List 
                                    </td>
                                </tr>
                                    
                                <tr>
                                    <th style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">Item Amount 
                                    </th>
                                    
                                    <td class="form-control" style="padding-top: 2px;padding-bottom: 0;padding-right: 40px;padding-left: 40px;">
                                            </td> <!--using php session varibales show the selected number of items-->
                                    
                                    <th style="padding-top: 5px;padding-bottom: 5px;padding-right: 10px;padding-left: 10px;">Total Amount (Rs.) </th>
                                    
                                    <td class="form-control" style="padding-top: 2px;padding-bottom: 0;padding-right: 40px;padding-left: 40px;">
                                    </td> <!--using php session varibales show the amount to be paid for the selected number of items-->
                                </tr>
                                
                                
                            </table>
                            </form>
                            
                            <!-- Filter Buttons -->
                            <div class="portfolio-filter-container margin-top-20">
                                <ul class="portfolio-filter">
                                    <li >
                                        page:
                                    </li>
                                    <li>
                                        <a href="chairs.html" class="btnpages" data-filter="gallary.html/design" >1</a>
                                    </li>
                                    <li>
                                        <a href="chairs2.html" class="btnpages " data-filter="gallary2.html/design">2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btnpages " data-filter=".design">3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btnpages" data-filter=".design">4</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btnpages " data-filter=".design">5</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Filter Buttons -->
                        </div>
                    </div>
                    <div class="row">
                      
                            <!-- Portfolio Item -->
                            
                             <?php
                                            $sql = "SELECT * FROM stock";
                                            $res = mysqli_query($con,$sql);
                                            while($row = mysqli_fetch_assoc($res)){
                                                 $id = $row['Item_ID'];
                                                
                                                    
                                        ?>
                                        
                                        
                            <div class="col-md-4 portfolio-item margin-bottom-40 design">
                                <div>
                                    <a href="#">
                        
                                        <figure>
                                            <img id="myimg" src="<?php echo $row['location']; ?>" alt="chair1" width="60%" height="70%" style="margin-left:20%">
                                            
                                            <figcaption style="text-align:center">
                                                <h3 id="itemid"><?php echo $row['Item_Name']; ?></h3>
                                                <a href="check.php" class="btnreserve">Reserve </a><br>
                                                <span><br>Click on the image to zoom</span>
                                            </figcaption>
                                        </figure>
                                        
                                    </a>
                                </div>
                            </div>
                            
                            <?php } ?>
                            
                        
                    
            <!-- Zooming Items -->  
            <div id="myModal" class="modal">
                <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
                    
            <div id="myModal" class="modal">
                <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
            <!-- === END CONTENT === -->
            
             <!-- Filter Buttons -->
            <div class="row margin-vert-30">
                        <div class="col-md-12">
                            
                           
                            <div class="portfolio-filter-container margin-top-20" style="margin-left:75%">
                                <ul class="portfolio-filter">
                                    <li >
                                        page:
                                    </li>
                                    <li>
                                        <a href="chairs.html" class="btnpages" data-filter="gallary.html/design" >1</a>
                                    </li>
                                    <li>
                                        <a href="chairs2.html" class="btnpages " data-filter="gallary2.html/design">2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btnpages " data-filter=".design">3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btnpages" data-filter=".design">4</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btnpages " data-filter=".design">5</a>
                                    </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                <!-- End Filter Buttons -->
                </div>
            </div>
            <!-- Footer Menu -->
            <div id="footer">
                <div class="container">
                    <div class="row">
                        
                        <div id="copyright" class="col-md-12">
                            
                            <p style="text-align:center;color:#124a76">www.lassanaparty.com <span class="glyphicon glyphicon-copyright-mark"></span>   2016 | Designed by Root Fixers</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Menu -->
            <!-- JS -->
            
            <!--<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script> -->
            <script type="text/javascript" src="assets/js/jquery.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
            <script type="text/javascript" src="assets/js/scripts.js"></script>
            <!-- Isotope - Portfolio Sorting -->
            <script type="text/javascript" src="assets/js/jquery.isotope.js" type="text/javascript"></script>
            <!-- Mobile Menu - Slicknav -->
            <script type="text/javascript" src="assets/js/jquery.slicknav.js" type="text/javascript"></script>
            <!-- Animate on Scroll-->
            <script type="text/javascript" src="assets/js/jquery.visible.js" charset="utf-8"></script>
            <!-- Sticky Div -->
            <script type="text/javascript" src="assets/js/jquery.sticky.js" charset="utf-8"></script>
            <!-- Slimbox2-->
            <script type="text/javascript" src="assets/js/slimbox2.js" charset="utf-8"></script>
            <!-- this zooms the images-->
            <script type="text/javascript" src="assets/js/zooming.js" charset="utf-8"></script>
            <!-- End JS -->
    </body>
</html>
<!-- === END FOOTER === -->