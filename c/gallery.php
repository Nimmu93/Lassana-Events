<?php include "../config/db_confg.php"; ?>
<?php   session_start();    ?>

<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title >Lassana Events | Gallery </title>
    </head>

    <body>
        <div id="body-bg">
            
            <!-- === HEADER  === -->
            <?php include 'pageheader.php'; ?>

            <!-- === START CONTENT === -->   
            <div class="container ">
            <div id="back">
       
            <div class="row">

                    <!-- php pagination function -->
                    
                    <?php $num_rec_per_page=6;
                    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
                    $start_from = ($page-1) * $num_rec_per_page; 
                    $sql = "SELECT * FROM gallery WHERE `Gallery_ID` like 'g%' LIMIT $start_from, $num_rec_per_page"; 
                    $rs_result = mysqli_query ($conn,$sql); //run the query
                    ?> 
                    
                    <?php 
                    while ($row = mysqli_fetch_assoc($rs_result)) { 
                        $id = $row['Gallery_ID'];
                    ?> 
                        <div class="col-xs-12 col-sm-12 col-md-4 portfolio-item margin-bottom-40 design">
                            <div id="block">
                                
                                    <div class="gal">
                                    
                                        <img src="<?php echo $row['image']; ?>">
                                        <div class="item-overlay top"></div>
                                    
                                    </div>   

                                    <div style="z-index: 4;position: relative;">             
                                        <h3 id="itemid"><?php echo $row['Title']; ?></h3>
                                        <h6 id="itemid"><?php echo $row['Description']; ?></h6>
                                    </div>

                                                 
                           </div>                   
                        </div>
                    
                    <?php }; ?> 

            </div>

            <!--START FILTER -->
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12  portfolio-item ">    
            <div class="portfolio-filter-container margin-top-20">
                <ul class="pag">


                   
                    <?php 
                        $sql = "SELECT * FROM gallery"; 
                        $rs_result = mysqli_query($conn,$sql); //run the query
                        $total_records = mysqli_num_rows($rs_result);  //count number of records
                        $total_pages = ceil($total_records / $num_rec_per_page); 
                        echo "<li><a href='gallery.php?page=1'> |< </a> </li>"; // Goto 1st page  
                        for ($i=1; $i<=$total_pages; $i++) { 
                            echo "<li><a href='gallery.php?page=".$i."'>".$i."</a> </li>"; 
                        }; 
                        echo "<li><a href='gallery.php?page=$total_pages'>".'>|'."</a></li> "; // Goto last page
                    ?>

                <ul class="pag">
            </div>
            </div>
            </div>
            <!--END FILTER -->
  
            <!-- === START FOOTER === -->
                        <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12  portfolio-item ">
                             
                              <?php include 'pagefooter.php'; ?>

                        </div>
                        </div>
            <!-- === END FOOTER === -->   
            
            <!-- === END CONTENT === --> 

    </div> <!--<div id="back"> -->      
    </div> <!--<div id="container"> -->
    </div> <!--<div id="body-bg"> -->

</body>

</html>
