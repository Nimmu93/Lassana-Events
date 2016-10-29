<!----------------------------------------------------------------------------------------------------------------------->
<!-----------------------------------------------------PHP CODING FOR LOGIN---------------------------------------------->
<!----------------------------------------------------------------------------------------------------------------------->
<?php
   session_start();
    include_once 'class.user.php';
    $user = new User();
    if (isset($_REQUEST['submit'])) {
        extract($_REQUEST);
        $login = $user->check_login($emailusername, $password);
        if ($login == 'admin') {
            /* Registration Success*/
        header("location:admin/orders.php");
        }else if($login == 'stock') {
            header("location:stock/home.php");
        }else if($login =='clerk'){
            header("location:clerk/home.php");
        }else{echo    "<script type='text/javascript' language='javascript'>
                        alert('wrong username or password');</script>";
        }
    }
?>
<!----------------------------------------------------------------------------------------------------------------------->
<!-----------------------------------------------------END PHP CODING FOR LOGIN------------------------------------------>
<!----------------------------------------------------------------------------------------------------------------------->
<head>
    <title> Login</title>
    <!-- Basic employee styles in basic css-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    
</head>


<body class="login" style="font-family: 'Questrial', sans-serif;">
    
    <div class="container" >
        
        <div class="row text-center " style="padding-top:100px;">
            
            <div class="col-md-12">
                
                <img src="logo.png" />
                
            </div>
            
        </div>
        
         
        <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel-body">
                        <form role="form" method="post">
                            <hr />
                                <h4>Enter details to log in</h4>
                                    <br />
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                                <input type="text" class="form-control"  id="exampleInputEmail1" required name="emailusername" placeholder="User name">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                           <input type="password" class="form-control" name="password" required id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="col-lg-4 text-right" >
                                            <button class="login"  type="submit" name="submit">Sign in</button>
                                        </div>

                                            <h4  style="margin-top:10px; ">
                                                <a class="login" href="forgotpasswrd/rcvrpasswrd.php"> Forgot your password?</a>
                                            </h4>
                                                <hr />
                        </form>
                    </div>
                </div>
            </div>
    </div>


</body>



</html>
