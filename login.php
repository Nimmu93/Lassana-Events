<?php
   session_start();
    include_once 'class.user.php';
    $user = new User();
   
    if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
        $login = $user->check_login($emailusername, $password);
        if ($login) {
            /* Registration Success*/
           header("location:home.php");
        } 
        else {
            /*registration failed*/
            echo    "<script type='text/javascript' language='javascript'>
                        alert('wrong username or password');
   
                    </script>";
            /*header("location:home1.php");*/
        }
    }

?>





<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stock Manager Login</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo.png" />
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form role="form">
                                    <hr />
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                           <input type="text" class="form-control" id="exampleInputEmail1" required name="emailusername" placeholder="User name">
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                           <input type="password" class="form-control" name="password" required id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                    
                                     <div class="col-lg-4 text-right" >
                                        <button class="btn btn-action" style="background-color:#9ACD32;" type="submit" name="submit">Sign in</button>
                                    </div>

                                    <p class="change_link" style="margin-top:10px;">
                                        <a href="forgotpasswrd/rcvrpasswrd.php" class="to_register">Forgot Your Password?</a>
                                    </p>
                                    <hr />
                                   
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
