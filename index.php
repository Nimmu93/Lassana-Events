<?php include "config/db_confg.php"; ?>
<?php   session_start();    ?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
        
        <title >Lassana Events | Home </title>

    </head>

    <body>
        <div id="body-bg">
            
            <?php include 'c/indexheader.php'; ?>



            
            
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
                                                <?php include 'c/slider.php'; ?>
                                    
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

                                    <p id=homeicons style="text-align: right;"> <span class="fa-home"> </span> 
                                        
                                    <p>
                                    

                                 
                            
                             </div>
                             <div class="col-xs-10 col-sm-10 col-md-3  portfolio-item ">

                                 <!--.fa-shopping-cart .fa-credit-card .fa-magic .fa-star-half-full .fa-home -->

                                    <p id=homeicons style="border-right: 1px solid #939598;">  
                                        One-Stop-Shop
                                    </p>
                                    

                                   
                            
                             </div>
                             <div class="col-xs-2 col-sm-2 col-md-1  portfolio-item ">

                                 <!--.fa-shopping-cart .fa-credit-card .fa-magic .fa-star-half-full .fa-home -->

                                    <p id=homeicons style="text-align: right;"> <span class="fa-credit-card"> </span> 
                                        
                                    <p>
                                    
  
                            
                             </div>
                             <div class="col-xs-10 col-sm-10 col-md-3  portfolio-item ">

                                 <!--.fa-shopping-cart .fa-credit-card .fa-magic .fa-star-half-full .fa-home -->

                                    <p id=homeicons style="border-right: 1px solid #939598;">  
                                        Online Reservation
                                    </p>
                                    

                                   
                            
                             </div>
                             <div class="col-xs-2 col-sm-2 col-md-1  portfolio-item ">

                                 <!--.fa-shopping-cart .fa-credit-card .fa-magic .fa-star-half-full .fa-home -->

                                    <p id=homeicons style="text-align: right;"> <span class="fa-phone-square"> </span> 
                                        
                                    <p>
                                    
  
                            
                             </div>
                             <div class="col-xs-10 col-sm-10 col-md-3  portfolio-item ">

                                 <!--.fa-shopping-cart .fa-credit-card .fa-magic .fa-star-half-full .fa-home -->

                                    <p id=homeicons>  
                                         011 5 623131
                                    </p>
                                    

                                   
                            
                             </div>
                             
                    </div>
                    
                    <!-- End website description -->


                    <!-- === start items content === -->
                    <div class="row">
                        <!--<div class="col-md-12 portfolio-group no-padding">
                            <!-- chairs -->
                            <div class="col-xs-12 col-sm-12 col-md-4  portfolio-item ">
                                
                                    <a href="chairs.php">
                                        <div class="item">
                                        <img src="assets/img/website/index/chair.jpg" alt="" class="bg_img" />
                                        <div class="text_wrapper">
                                        <img id="hole" src="assets/img/website/index/circle.png">
                                        <div class="text_position">
                                        <h2 id="topic">Chairs</h2>
                                        
                                        </div>
                                        </div>
                                        </div>
                                    </a>
                                    
                                    
                            </div>
                            <!-- End chairs -->
                            <!-- Tables-->
                            <div class="col-xs-12 col-sm-12 col-md-4  portfolio-item ">
                                
                                    <a href="tables.php">
                                        <div class="item">
                                        <img src="assets/img/website/index/table.jpg" alt="" class="bg_img" />
                                        <div class="text_wrapper">
                                        <img id="hole" src="assets/img/website/index/circle.png">
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
                            <div class="col-xs-12 col-sm-12 col-md-4  portfolio-item ">
                                
                                    <a href="marquees.php">
                                        <div class="item">
                                        <img src="assets/img/website/index/marquee.jpg" alt="" class="bg_img" />
                                        <div class="text_wrapper">
                                        <img id="hole" src="assets/img/website/index/circle.png">
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

                        <!-- start offers -->
                        <div class="row">
                        
                            <div id="borderbottom">

                            <div class="col-xs-12 col-sm-12 col-md-4  portfolio-item ">

                                <div id="offer">
                                    <div>
                                        <img  src="assets/img/website/index/pink.jpg" class="offerback">

                                    </div>

                                    <img id="hole" src="assets/img/website/index/circle.png">
                                        <div class="text_position">
                                        <div class ="offer" >
                                        
                                        <?php 
                                        $sql = "SELECT title,details FROM offers WHERE id = '1'"; 
                                        $result = mysqli_query ($conn,$sql); //run the query
                                        $row = mysqli_fetch_row($result);
                                        echo "<h3>".$row[0]."</h3>"."<p>".$row[1]."</p>";?>  
                                        
                                        </div>
                                        </div>
                                </div>

                            </div> 

                            <div class="col-xs-12 col-sm-12 col-md-4  portfolio-item ">

                                <div id="offer">
                                    <div>
                                        <img  src="assets/img/website/index/green.jpg" class="offerback">
                                    </div>

                                    <img id="hole" src="assets/img/website/index/circle.png">
                                        <div class="text_position">
                                        <div class ="offer">
                                        
                                        <?php 
                                        $sql = "SELECT title,details FROM offers WHERE id = '2'"; 
                                        $result = mysqli_query ($conn,$sql); //run the query
                                        $row = mysqli_fetch_row($result);
                                        echo "<h3>".$row[0]."</h3>"."<p>".$row[1]."</p>";?>  
                                        
                                        </div>
                                        </div>
                                </div>
                                
                            </div> 

                            <div class="col-xs-12 col-sm-12 col-md-4  portfolio-item ">

                                <div id="offer">
                                    <div>
                                        <img  src="assets/img/website/index/orange.jpg" class="offerback">
                                    </div>

                                    <img id="hole" src="assets/img/website/index/circle.png">
                                        <div class="text_position">
                                        <div class ="offer">
                                        
                                        <?php 
                                        $sql = "SELECT title,details FROM offers WHERE id = '3'"; 
                                        $result = mysqli_query ($conn,$sql); //run the query
                                        $row = mysqli_fetch_row($result);
                                        echo "<h3>".$row[0]."</h3>"."<p>".$row[1]."</p>";?>  
                                        
                                        </div>
                                        </div>
                                </div>
                                
                            </div> 
                            </div> 

                            

                        </div>
            
                    <!-- End offers -->

                    <!-- === Start Testimonials content === -->
                        <div class="row">

                            <div class="col-xs-12 col-sm-4 col-md-4  portfolio-item " >
                                <div style="margin-bottom: 100%">

                                <img src="assets/img/website/index/michael.jpg" alt=""  class="testback"/>

                                <img id="hole" src="assets/img/website/index/circle.png">

                                </div>
                                    
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8  portfolio-item ">

                                        <h3 id="testimonials">Michael Wijeysooriya <br>Fashion Designer</h3> 
                                        <p id="testdes">"My number one choice for marquees and other event requirements is Lassana Party. They have set a new benchmark for high quality party items and their service is outstanding. "</p>
                                       
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xs-12 col-sm-4 col-md-4  portfolio-item " >
                                <div style="margin-bottom: 100%">

                                <img src="assets/img/website/index/michael.jpg" alt="" class="testback" />
                                
                                <img id="hole" src="assets/img/website/index/circle.png">

                                </div>

                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8  portfolio-item ">

                                        <h3 id="testimonials">S.Walpola <br>MD Web company</h3> 
                                        <p id="testdes">"I was absolutely amazed by the professionalism and reliability of Lassana Party Services. They took care of everything perfectly and most importantly my family was very happy"</p>
                                       
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xs-12 col-sm-4 col-md-4  portfolio-item ">
                                <div style="margin-bottom: 100%">

                                <img src="assets/img/website/index/michael.jpg" alt="" class="testback" />

                                    <img id="hole" src="assets/img/website/index/circle.png">

                                </div>
                                    
                            </div>
                            <div class="col-xs-12 col-sm-8 col-md-8  portfolio-item ">

                                        <h3 id="testimonials">M.V.Sampath Priyankara <br>MD Event Media</h3> 
                                        <p id="testdes">"Very well trained and experienced event coordinators. They went above and beyond to provide my requirement to the last minute details.. Perfect."</p>
                                       
                            </div>

                            
                        </div>
       
                   <!-- === END Testimonials content === -->



                   <!-- === start mission vision content === -->
                    <!--    <div class="row">
                        <!--<div class="col-md-12 portfolio-group no-padding">
                            <!-- m and v-->
                           <!-- <div class="col-xs-12 col-sm-12 col-md-12  portfolio-item ">
                                
                                    <div id="mvbox">
                                        
                                        <h2 id=mvtitle >Vision</h2>
                                        <p id=mv>
                                        Lassana Party aims to ensure that your special occasions are memorable, unique and stress free. We deliver the highest quality products and services, ensuring that each event we handle far exceeds expectations.</p>
                                        
                                        
                                    </div>
                                    
                                    
                            </div>
                            <!-- End m and v -->
                        <!--</div>
                        <!-- === End mission vision content === --> 

                <!-- === start footer content === -->
                        <div class="row">
                        <!--<div class="col-md-12 portfolio-group no-padding">-->
                            
                            <div class="col-xs-12 col-sm-12 col-md-12  portfolio-item ">
                             
                              <?php include 'c/indexfooter.php'; ?>

                            </div>
                            
                        </div>
                        <!-- === End footer content === -->    
            
            
            <!-- === END ITEMS content === --> 


            
                    
           

        </div> <!-- this div closes the space that makes all the content fall under same alignment /<div class="container ">-->

    </div> <!--<div id="content"> -->

</div> <!--<div id="body-bg"> -->

</body>

</html>
