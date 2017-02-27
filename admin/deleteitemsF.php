<?php
	include '../config/db_confg.php';
  	$itemID=$_GET['id'];
  	$sql="DELETE  FROM stock WHERE Item_ID='$itemID'";
  	$result = mysqli_query($conn, $sql);

  	if ($result){
    	$select = "SELECT * FROM stock ";
                  $result = mysqli_query($conn, $select);
                  if ( mysqli_num_rows($result) > 0) {
                    // print table heads//
                    echo ('<div class="table-responsive"><table border=1 class="table table-bordered" >
                      <thead style="background-color:#656565;color:#ffffff;">
                      <tr>
                        <th>Item ID</th>
                        <th>Item Type</th>
                        <th>Item Name</th>
                        <th>Item Color</th>
                        <th></th>    
                      </tr></thead>');
                      echo("<tbody>");
                      // output data from row by row
                      while($row = mysqli_fetch_array($result)) {
                        echo (
                          "<tr>
                              <td> " . $row[0] . " </td>
                              <td> " . $row[2] . " </td>
                              <td>" . $row[1] . "</td>
                              <td>" . $row[5] . "</td>
                              <td>
                                <a href='#' id='$row[0]' class='deleteitem'><button value=''>delete</button></a>
                              </td>
                          </tr>");    
                      }
                      echo ("</tbody></table></div>");
                    }
  	}else{
    	return false;
  	} 
?>

