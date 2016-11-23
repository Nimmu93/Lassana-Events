<?php $con = mysqli_connect('localhost','root','','lassanaparty'); ?>
<?php   session_start();    ?>
<!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<html lang="en">
    
    <head>
        <!-- Title -->
        <title >Lassana Eventa | Home </title>

    </head>

    <body>
        <div id="body-bg">
            
            <?php include '../config/cheader.php'; ?>



            
            
            <!-- === BEGIN CONTENT === -->
           
            
            <div id="content">

                
                <div class="container ">
                <div id="back">
                    <!-- Start welcome headline -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 portfolio-group no-padding">
                            <!-- Portfolio Item -->
                            <div class="col-xs-12 col-sm-12 col-md-12 portfolio-item margin-bottom-0 filer-code">
                                
                                <div id="slider">  
                                                <?php include 'slider.php'; ?>
                                    
                                 </div> 
                            </div>
                        </div>
                    </div>
                    <!-- End welcome headline -->
                    
                
                    
            <!-- === start content after SLIDER === -->        
            <div id="content">
                
                    <!-- Start website description -->
                    <div class="row">
                        
                            
                            <div class="col-xs-2 col-sm-2 col-md-1  portfolio-item ">

                                <!--.fa-shopping-cart .fa-credit-card .fa-magic .fa-star-half-full .fa-home -->

                                    <p id=homeicons> <span class="fa-home"> </span> 
                                        
                                    <p>
                                    

                                 
                            
                             </div>
                             <div class="col-xs-10 col-sm-10 col-md-5  portfolio-item ">

                                 <!--.fa-shopping-cart .fa-credit-card .fa-magic .fa-star-half-full .fa-home -->

                                    <p id=homeicons style="border-right: 1px solid #939598;">  
                                        One-Stop-Shop
                                    </p>
                                    

                                   
                            
                             </div>
                             <div class="col-xs-2 col-sm-2 col-md-1  portfolio-item ">

                                 <!--.fa-shopping-cart .fa-credit-card .fa-magic .fa-star-half-full .fa-home -->

                                    <p id=homeicons> <span class="fa-credit-card"> </span> 
                                        
                                    <p>
                                    
  
                            
                             </div>
                             <div class="col-xs-10 col-sm-10 col-md-5  portfolio-item ">

                                 <!--.fa-shopping-cart .fa-credit-card .fa-magic .fa-star-half-full .fa-home -->

                                    <p id=homeicons>  
                                        Online Reservation
                                    </p>
                                    

                                   
                            
                             </div>
                             
                    </div>
                    
                    <!-- End website description -->


                    <!-- === start items content === -->
                    <div class="row">
                        <!--<div class="col-md-12 portfolio-group no-padding">
                            <!-- chairs -->
                            <div class="col-xs-12 col-sm-6 col-md-4  portfolio-item ">
                                
                                    <a href="chairs.html">
                                        <div class="item">
                                        <img src="../assets/img/website/slider/dummy1.jpg" alt="" class="bg_img" />
                                        <div class="text_wrapper">
                                        <div class="text_position">
                                        <h2 id="topic">Chairs</h2>
                                        
                                        </div>
                                        </div>
                                        </div>
                                    </a>
                                    
                                    
                            </div>
                            <!-- End chairs -->
                            <!-- Tables-->
                            <div class="col-xs-12 col-sm-6 col-md-4  portfolio-item ">
                                
                                    <a href="Tables.html">
                                        <div class="item">
                                        <img src="../assets/img/website/slider/dummy2.jpg" alt="" class="bg_img" />
                                        <div class="text_wrapper">
                                        <div class="text_position">
                                        <h2 id="topic">Tables</h2>
                                        
                                        </div>
                                        </div>
                                        </div>
                                    </a>
                                    
                                    
                            </div>
                            <!-- End Portfolio Item -->
                            <!-- Portfolio Item -->
                            <!-- Marquee-->
                            <div class="col-xs-12 col-sm-6 col-md-4  portfolio-item ">
                                
                                    <a href="chairs.html">
                                        <div class="item">
                                        <img src="../assets/img/website/slider/dummy2.jpg" alt="" class="bg_img" />
                                        <div class="text_wrapper">
                                        <div class="text_position">
                                        <h2 id="topic">Marquees</h2>
                                        
                                        </div>
                                        </div>
                                        </div>
                                    </a>
                                    
                                    
                            </div>
                            <!-- End Marquee -->
                            
                        </div>
                        <!-- === END items content === -->



                        <!-- === start mission vision content === -->
                        <div class="row">
                        <!--<div class="col-md-12 portfolio-group no-padding">
                            <!-- m and v-->
                            <div class="col-xs-12 col-sm-12 col-md-12  portfolio-item ">
                                
                                    
                                        
                                        <h2 id=mvtitle >Vision</h2>
                                        <p id=mv>
                                        Lassana Party aims to ensure that your special occasions are memorable, unique and stress free. We deliver the highest quality products and services, ensuring that each event we handle far exceeds expectations.</p>
                                        
                                        
                                    
                                    
                                    
                            </div>
                            <!-- End m and v -->
                        </div>
                        <!-- === End mission vision content === -->    
                            
                        

                        <!-- === Start Testimonials content === -->
                        <div class="row">
                        <!--<div class="col-md-12 portfolio-group no-padding">
                            <!-- michael -->
                            <div class="col-xs-12 col-sm-6 col-md-4  portfolio-item ">
                                
                                    <a href="chairs.html">
                                        <div class="item">
                                        <img src="../assets/img/website/index/m.jpg" alt="" class="bg_img" />
                                        
                                        <div class="text_wrapper">
                                        <img src="../assets/img/website/index/michael.jpg" alt="" class="testimage" />
                                        
                                        </div>
                                        </div>
                                    </a>
                                    
                            </div>
                            <!-- End micael -->
                            <!-- walpola-->
                            <div class="col-xs-12 col-sm-6 col-md-4  portfolio-item ">
                                
                                    <a href="chairs.html">
                                        <div class="item">
                                        <img src="../assets/img/website/index/s.jpg" alt="" class="bg_img" />
                                        
                                        <div class="text_wrapper">
                                        <img src="../assets/img/website/index/walpola.jpg" alt="" class="testimage" />
                                        
                                        </div>
                                        </div>
                                    </a>
                                    
                            </div>
                            <!-- End walpola -->
                            <!-- Portfolio Item -->
                            <!-- sampath-->
                            <div class="col-xs-12 col-sm-6 col-md-4  portfolio-item ">
                                
                                    <a href="chairs.html">
                                        <div class="item">
                                        <img src="../assets/img/website/index/p.jpg" alt="" class="bg_img" />
                                        
                                        <div class="text_wrapper">
                                        <img src="../assets/img/website/index/priyankara.jpg" alt="" class="testimage" />
                                        
                                        </div>
                                        </div>
                                    </a>
                            </div>
                        </div>
                            <!-- End sampath -->
                   <!-- === END Testimonials content === -->

                <!-- === start footer content === -->
                        <div class="row">
                        <!--<div class="col-md-12 portfolio-group no-padding">-->
                            
                            <div class="col-xs-12 col-sm-12 col-md-12  portfolio-item ">
                             
                              <?php include '../config/cfooter.php'; ?>

                            </div>
                            
                        </div>
                        <!-- === End footer content === -->    
            
            
            <!-- === END ITEMS content === --> 


            
                    
           

        </div> <!-- this div closes the space that makes all the content fall under same alignment /<div class="container ">-->

    </div> <!--<div id="content"> -->

</div> <!--<div id="body-bg"> -->

</body>

</html>
