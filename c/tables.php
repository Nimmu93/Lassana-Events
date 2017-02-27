<?php include "../config/db_confg.php"; ?>
<?php   session_start();    ?>

<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title >Lassana Events | Chairs </title>

        <style>
            
        </style>
    </head>

    <body>
        <div id="body-bg">
            
            <!-- === HEADER  === -->
            <?php include 'pageheader.php'; ?>

            <!-- === START CONTENT === -->   
            
                
                
            <div class="container ">
            <div id="back">

            <div class="row">

                <div class="col-xs-12 col-sm-4 col-md-4  portfolio-item ">

                </div>

                <div class="col-xs-12 col-sm-4 col-md-4  portfolio-item ">

                <input type="date" class="btn btn-block" name="res_date" id="res_date2" value="<?php
                        if(array_key_exists("res_date",$_SESSION)){
                            echo $_SESSION["res_date"][1];
                        }
                    ?>" required>
                
                <p id="para" value="cat"></p>
                <input type="button" style="background-color: #c1d82f;" class="btn btn-block" onclick=setDate() value="Confirm Date">
                <br><br>
                <center><h3> Select the date</h3></center>
                <p align="right"><b>Your Reservation date</b></p> 
                <center><p id="para1" ></p></center>
                
                <script>
                    function setDate() {
                        var x = document.getElementsByClassName('iDate');
                        for (i = 0; i < x.length; i++) {
                            x[i].value = document.getElementById('res_date2').value;
                        }
                        document.getElementById('para1').innerHTML =  document.getElementById('res_date2').value;
                    }
                </script>

                </div>
                <div class="col-xs-12 col-sm-4 col-md-4  portfolio-item ">

                </div>


            </div>
            
            <div class="row">
                    
                    <!-- php pagination function -->
                    
                    <?php $num_rec_per_page=6;
                    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
                    $start_from = ($page-1) * $num_rec_per_page; 
                    $sql = "SELECT * FROM stock WHERE `Item_ID` like 't%' LIMIT $start_from, $num_rec_per_page"; 
                    $rs_result = mysqli_query ($conn,$sql); //run the query
                    ?> 
                    
                    <?php 
                    while ($row = mysqli_fetch_assoc($rs_result)) { 
                        $id = $row['Item_ID'];
                        
                    ?> 
                        <div class="col-xs-12 col-sm-12 col-md-4 ">
                            <div id="boxblock">
                                <a>
                                    <div>
                                        <img id="circle" src="../assets/img/website/items/circle.png">
                                    </div>

                                    <div div class="products">
                                    <center>
                                        <img  src="<?php echo $row['location']; ?>" >
                                    </center>
                                    </div>
                                    
                                    <div>             
                                        <h3 id="itemid"><?php echo $row['Item_Name']; ?></h3>
                                    </div>

                            <!--starts cart -->   
                            <?php
                                echo (
                                    '<form action="../config/cartSes.php" class="iForm" id="itemForm" method="post" target="frame">
                                    <p>Qty: 
                                    <input type="number" name="qty" min="1" max="'.$row['Total_Stock'].'" required>
                                    <input type="radio" style="display:none" name="id" value="'.$id.'" checked>
                                    <input type="date" style="display:none" class="iDate" name="res_date" id="res_date" required>
                                    <input class="btn btn-sm btn-default" type="submit" onclick="checkDate()" Value="Add to Cart" name="s">
                                    </form>
                                    <p><b>Max Qty: &nbsp</b>'.$row['Total_Stock'].'</p>

                                    <iframe style="display:;" width="90%"  height="20" frameBorder="0" name="frame"></iframe>'
                                    );
                            ?>
                            
                            <script>
                                var x = document.getElementsByClassName('iDate');
                                for (i = 0; i < x.length; i++) {
                                    x[i].value = document.getElementById('res_date2').value;
                                }
                                document.getElementById('para1').innerHTML =  document.getElementById('res_date2').value;
                                
                                function checkDate(){
                                    var date = document.getElementById('res_date').value;
                                    if(date == ""){
                                        alert("Plese confirm a Date");
                                    
                                    }
                                    
                                }
                            </script>
                            <!--ends cart --> 

                            </a>                   
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
                        $sql = "SELECT * FROM stock WHERE `Item_ID` like 'c%'"; 
                        $rs_result = mysqli_query($conn,$sql); //run the query
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
