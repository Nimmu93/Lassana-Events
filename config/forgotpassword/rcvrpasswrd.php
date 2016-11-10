<!DOCTYPE>
<html>
   <head>
      <title>Password Recovery</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
     
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     
      <!-- Latest compiled JavaScript -->
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
     
   </head>
   <body style="background-color: #E2E2E2;">
      
      <div class="container">
         <div class="row">
		 
            <!-- Password Recovery form starts-->
			
            <div class="col-md-3"></div>
            <div class="col-md-6">
               <h3>Forgot Your Password ?</h3>
               <hr noshade>
               <div class="panel panel-info" >
                  <div class="panel-heading">Forgot Your Password ?</div>
                  <div class="panel-body">
                     <form  name="myform" action="rcvrpasswrd1.php" method="post" >
                        <div class="form-group">
                           <label >Full Name:</label>
                           <input type="text" name="name"  class="form-control" id="usr" required style="background-color: #E2E2E2;">
                        </div>
                        <div class="form-group">
                           <label >Email:</label>
                           <input type="text" name="email"  class="form-control" id="usr" required style="background-color: #E2E2E2;">
                        </div>
                        <button type="submit" name="update" class="btn btn-info">Verify</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-3"></div>
      </div>
      </div>
	  
      <!--form ends-->
	  
   </body>
</html>