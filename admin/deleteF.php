<<<<<<< HEAD


<?php
 include '../config/db_confg.php';
 
  
  $empID=$_GET['id'];

$sql="DELETE  FROM users1 WHERE uid='$empID'";
  $result = mysqli_query($conn, $sql);

  if ($result){ 
           $select = "SELECT * FROM users1 ";
                          $result = mysqli_query($conn, $select);

                          if ( mysqli_num_rows($result) > 0) {
                            // print table heads//
                                echo ('<div class="table-responsive"><table border=1 class="table table-bordered" >
                                <thead style="background-color:#656565;color:#ffffff;">
                                  <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Type</th>
                                    <th>Employee Name</th>
                                    <th></th>
                                  </tr>
                                </thead>');

                                    echo("<tbody>");
                                    // output data from row by row
                                    while($row = mysqli_fetch_array($result)) {                                       
                                      echo (
                                        "<tr>
                                            <td>" . $row[0] . "</td>
                                            <td>" . $row[6] . "</td>
                                            <td>" . $row[3]. "</td>
                                            <td>
                                              <a href='#' id='$row[0]' class='deleteuser'><button value=''>delete</button></a>
                                            </td>
                                         
                                        </tr>");
                                        
                                    }

                                   echo ("</tbody></table></div>");
                                
                        }


  }else{
    return false;
  }  

?>
=======
<?php
 include '../config/db_confg.php';

  $empID=$_GET['id'];
  

  $sql="DELETE  FROM employee WHERE Employee_ID='$empID'";
  $result = mysqli_query($conn, $sql);

  if ($result){
    header("Location:viewacc.php");
  }else{
    echo "Error ".mysqli_error($conn);
  }  

?>
>>>>>>> origin/master
