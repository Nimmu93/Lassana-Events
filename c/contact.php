<?php include "../config/db_confg.php"; ?>
<?php   session_start();    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title >Lassana Events | Contact </title>
    </head>

    <body>
        <div id="body-bg">
            
            <!-- === HEADER  === -->
            <?php include 'pageheader.php'; ?>

            <!-- === START CONTENT === -->    
            <div class="container ">
            <div id="back">
                    <?php
                      $boolean = TRUE;
                      $nameErr = $emailErr = $subjectErr =  "";
                      
                      function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                      }

                      //validation
                      //if ($_SERVER["REQUEST_METHOD"] == "POST") {
                      if(isset($_POST["name"])){$name = test_input($_POST["name"]);}
                      if(isset($_POST["email"])){$email = test_input($_POST["email"]);}
                      if(isset($_POST["subject"])){$subject = test_input($_POST["subject"]);}
                      //}

                      if ($_SERVER["REQUEST_METHOD"] == "POST") {
                      if (empty($_POST["name"])) {
                        $nameErr = "Name is required";
                        $boolean = FALSE;
                      }elseif(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                        $nameErr = "Only letters and white space are allowed";
                        $boolean = FALSE;
                      } else {
                        $name = test_input($_POST["name"]);
                      }
                      if (empty($_POST["email"])) {
                        $emailErr = "Email is required";
                        $boolean = FALSE;
                      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                        $boolean = FALSE;
                      }else {
                        $email = test_input($_POST["email"]);
                      }

                      if (empty($_POST["subject"])) {
                        $subjectErr = "subject is required";
                        $boolean = FALSE;
                      }elseif(!preg_match("/^[a-zA-Z ]*$/",$subject)) {
                        $subjectErr = "Only letters and white spaces are allowed";
                        $boolean = FALSE;
                      } else {
                        $subject = test_input($_POST["subject"]);
                      }
                      $comments = $_POST["comments"];
                    }

                  ?>
      
          <div class="container ">
          <div class="row margin-vert-30"><!-- start row-->
          <!-- === START FORM === -->
          <div class="col-md-8">
              <div>
                <h2 id="contacth">Contact us</h2>
              </div>
              <br>
              <form id = 'lassana' name="lassana"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method=post />

                  <label for="name">Your Name<span class="color-red">*</label>
                  <br>
                  <input type="text" placeholder="Full Name"   name="name" id="name" class="form-control" required>
                  <br>
         
                  <label for="email">E-mail<span class="color-red">*</label>
                  <br>
                  <input type="email" placeholder=""   name="email" id="email" class="form-control" required>
                  <br>
        
                  <label for="subject">Subject<span class="color-red">*</label>
                  <br>
                  <input type="text" placeholder=""   name="subject" id="subject" class="form-control" required>
                  <br>
                
                  <label for="comments">Your message</label>
                  <br>
                  <textarea name="comments" id="comments" rows="8" cols="60" name="comments" class="form-control" ></textarea >
                  <br>
            
                   <input class="btn"  type="submit" name=submit value=SUBMIT  id="buttonSubmit" onsubmit="validate()" />
                  <input class="btn"  type="reset" name=cancel value=CANCEL id="buttonResett"  />                  
                                        
              </form>
          </div>
          <!-- === END FORM === -->
          <!-- === START CONTACT DETAILS === -->
          <div class="col-md-4">   
          <div style="margin-left: 20%">
            <h3 class="margin-bottom-10" id="contacth" style="text-align:center">Contact Details</h3> 
            <br>
            <p id="contact">
              <span class="fa-phone">Hotline:</span>0777 256298/ 0777 360150
              <br>
              <span class="fa-phone">Telephone:</span>(+94)115 623 131
              <br>
              <span class="fa-phone">Fax:</span>(+94)114 402 221
              <br>
            </p>
                        
            <p id="contact">
              <span class="fa-envelope">Email:</span>
              <a href="mailto:info@joomla51.com">info[at]lassanaparty.com</a>
              <br>
              <span class="fa-home">Address:</span>
              279,Nawala Road,Nawala,Rajagiriya,Sri Lanka.
              <br>
              <span class="fa-link">Website:</span>
              <a href="http://www.joomla51.com">www.lassanaparty.com</a>
            </p>
          </div>
          </div>
          <!-- === END CONTACT DETAILS === -->
          </div><!-- end row-->
          </div><!-- end container-->

          <?php
            if (isset($_POST["submit"])){
              if($boolean==TRUE){
                
                // Perform Database Query
                $sql = "INSERT INTO contact(Name,Email,subject,Comments) VALUES ('$name','$email','$subject','$comments' ) ";
                $result = mysqli_query($conn,$sql);
                
                // User Returned Database
                if(!$result){
                  die("Error Query" .mysqli_error($conn));
                }else{
                  echo '<script language="javascript">';
                  echo 'alert("Your event was added successfully")';
                  echo '</script>';
                }
              }

              // Close Connection
              mysqli_close($conn);
            }
          ?>
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
