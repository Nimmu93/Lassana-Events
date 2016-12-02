<?php $con = mysqli_connect('localhost','root','','lassanaparty'); ?>
<?php   session_start();    ?>

<!DOCTYPE html>

<html lang="en">
    
    <head>
        
        <title >Lassana Events | Chairs </title>

        <style type="text/css">
                
        </style>

    </head>

    <body>
        <div id="body-bg">
            
            <?php include '../config/cheader.php'; ?>

            <!-- === BEGIN CONTENT === -->
           
            
            <div id="content">

                
            <div class="container ">
            <div id="back">
           
            <!-- === start content  === -->        
            <div id="content">
                
                    
                    <!-- === start items content === -->
                    <div class="row">

                    <!-- php pagination function -->
                    
                    <?php $num_rec_per_page=6;
                    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
                    $start_from = ($page-1) * $num_rec_per_page; 
                    $sql = "SELECT * FROM stock LIMIT $start_from, $num_rec_per_page"; 
                    $rs_result = mysqli_query ($con,$sql); //run the query
                    ?> 
                    
                    <?php 
                    while ($row = mysqli_fetch_assoc($rs_result)) { 
                        $id = $row['Item_ID'];
                    ?> 
                        <div class="col-xs-12 col-sm-12 col-md-4 portfolio-item margin-bottom-40 design">
                            <div id="block">
                            <a>
                            <div>
                            <img id="hole" src="../assets/img/website/items/circle.png">
                            </div>
                            <div>
                            <img id="myimg" src="<?php echo $row['location']; ?>" alt="chair1" width="60%" height="60%" style="margin-left:20%;margin-top: 8%">
                            </div>  
                            <div style="z-index: 4;position: relative;">             
                            <h3 id="itemid"><?php echo $row['Item_Name']; ?></h3>
                            <span><br>Click on the image to zoom</span>
                            </div>

                            <!--starts cart -->   
                            <?php
                                echo (
                                    '<form action="../config/cartSes.php" method="post" target="frame">
                                    Qty: 
                                    <input style="color:black" type="number" name="qty" min="1" max="500" required>
                                    <input type="radio" style="display:none" name="id" value="'.$id.'" checked>
                                    <input class="btn btn-sm btn-default" type="submit" Value="Add to Cart" name="s">
                                    </form>

                                    <iframe style="display:none;" name="frame"></iframe>'
                                    );
                            ?>
                            <!--ends cart --> 
                            </a>                   
                           </div>                   
                        </div>
                    
                    <?php }; ?> 

                    </div>

                    <!--start Filter Buttons -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12  portfolio-item ">    
                            <div class="portfolio-filter-container margin-top-20">
                                <ul class="pag">


                   
                    <?php 
                        $sql = "SELECT * FROM stock"; 
                        $rs_result = mysqli_query($con,$sql); //run the query
                        $total_records = mysqli_num_rows($rs_result);  //count number of records
                        $total_pages = ceil($total_records / $num_rec_per_page); 
                        echo "<li><a href='chairs.php?page=1'> |< </a> </li>"; // Goto 1st page  
                        for ($i=1; $i<=$total_pages; $i++) { 
                            echo "<li><a href='chairs.php?page=".$i."'>".$i."</a> </li>"; 
                        }; 
                        echo "<li><a href='chairs.php?page=$total_pages'>".'>|'."</a></li> "; // Goto last page
                    ?>

                                    <ul class="pag">
                                </div>
                            </div>
                        </div>
                    <!--end Filter Buttons -->

                    </div>
                    <!-- === END items content === -->

                    
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
