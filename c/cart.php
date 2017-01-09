<?php include '../config/db_confg.php'; ?>
<?php   session_start();    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title >Lassana Events | Cart </title>
    </head>

    <body>
        <div id="body-bg">

            <!-- === HEADER  === -->
            <?php include 'pageheader.php'; ?>   
            <div class="container ">
            <div id="back">

            <!-- === START CONTENT  === -->        
                <div style="margin-top:15px;" class="row">
                <div class="col-md-12">
                <div class="panel-body">
                <?php
                    $cartSesID=3574;
                    // print table heads//
                    echo ('<div class="table-responsive"><table border=1 class="table table-bordered" >
                                    <thead style="background-color:#656565;color:#ffffff;">
                                    <tr>
                                        <th>Item</th>
                                        <th>Item Name</th>
                                        <th>Unit Prize</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr></thead>');
                             
                             
                                    echo("<tbody>");
                                    
                                    //if (array_key_exists('check_submit', $_POST)) {}
                                    foreach ($_SESSION as $value) {////if start
                                        if($value[0] == $cartSesID){
                                        $type = $value[1];
                                        $qut = $value[2];
                                        //echo "$id <br> $qut";
                                    
                                        $sql = "SELECT Item_ID, Item_Name, Unit_Price, location FROM stock WHERE Item_ID ='".$type."'";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                echo(
                                                    "<tr>
                                                    
                                                        <td style=\"width:9%\">".'<img src="'.$row["location"].'" alt="Mountain View" >'."</td>
                                                        <td>".$row["Item_Name"]."</td>
                                                        <td>".$row["Unit_Price"]."</td>
                                                        <td>". $qut ."</td>
                                                        <td>".($row["Unit_Price"]*$qut)."</td>
                                                        <td>
                                                        <iframe style=\"display:none\" name=\"iframe\"></iframe>
                                                        <form method=\"post\" action=\"cart.php\">
                                                            <input name=\"type\" type=\"hidden\" id=\"type\" value=\"".$type."\"\>
                                                            <input name=\"remove\" type=\"submit\" id=\"remove\" value=\"Remove\">
                                                        </form>
                                                        </td>
                                                    </tr>"
                                                
                                                );
                                            }
                                        }
                                        }//if end
                                    }
                                    $Total = 0;
                                    foreach ($_SESSION as $value) {////if start
                                        if($value[0] == $cartSesID){
                                        $type = $value[1];
                                        $qut = $value[2];
                                        //echo "$id <br> $qut";
                                    
                                        $sql = "SELECT Item_ID, Item_Name, Unit_Price, location FROM stock WHERE Item_ID ='".$type."'";
                                        $result = mysqli_query($conn, $sql);
                                        //static $Total = 0;
                                        if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $Total += ($row["Unit_Price"]*$qut);
                                            }
                                        }
                                        }//end if
                                    }
                                    if($Total > 0){
                                        echo(
                                                "<tr>
                                                
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>"."Total : ".$Total."</td>
                                                    <td></td>
                                                </tr>"
                                                
                                            );
                                    }
                                    $Total = 0;

                                        
                                        //$row = mysqli_fetch_assoc($rs);
                                        //echo "id: " . $row["Item_ID"]. " - Name: " . $row["Item_Name"]. "Unit Price: " . $row["Unit_Price"]. "<br>";
                                        
                                        //echo ($_POST['id']);
                                        

                                   echo ("</tbody></table></div>");
                                   //if (array_key_exists('check_submit', $_POST)) {
                                   //echo ($_POST['qty'] );}
                        mysqli_close($conn);
                        ?>
                        <?php
                            if (  isset($_POST['type']) ) {
                                unset($_SESSION[$_POST['type']]);
                                }
                            
                        ?>
                     <!-- End   -->
                </div>
                </div>
                </div>

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
