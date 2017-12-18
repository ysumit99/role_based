<?php

	require('config.php');
	session_start();
  if(isset($_POST['login_admin']))
  {
    $username = strip_tags($_POST['user_id']);
    $password = strip_tags($_POST['password']);
    //$password = md5($password);
    $_SESSION['user_id'] = $username;

    if($password == "admin" && $username == "admin")
      header("Location: welcome_admin.php");
  	else
  	{
  		echo "Incorrect userid or password! Please try again..";
  	}
   }

   if(isset($_POST['login_manager']))
  {
    $username = strip_tags($_POST['user_id']);
    $password = strip_tags($_POST['password']);
    $password = md5($password);
    $_SESSION['user_id'] = $username;

    $check_user = mysqli_query($con,"SELECT * FROM manager WHERE user_id = '$username' AND password = '$password' ");
    if(mysqli_num_rows($check_user) > 0)
    {
    	header("Location: welcome_manager.php");
    }
  	else
  	{
  		echo "Incorrect userid or password! Please try again..";
  	}
   }



  
  

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    	

  
  		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  		
	
</head>
<body>
		<nav class="navbar navbar-default">
			<div class = "container">
			  <div class = "navbar-header ">
			  	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target = "div1">
			          <span class="sr-only">Toggle navigation</span>
			          <span class="icon-bar"></span>
			          <span class="icon-bar"></span>
			          <span class="icon-bar"></span>
			        </button>
			    <a href = "#" class = "navbar-brand" style="color: blue;"> <i class=" fa fa-id-card-o " style="font-size:32px; color: green;" aria-hidden="true"></i>&nbsp; Role based system </a>
			  </div>

			
			</div>
		</nav>
		<div class="col-md-6 col-md-offset-3">
			<div class="row">
				<center><h1>Login, based on your Role!</h1><i class="fa fa-hand-o-down" style="font-size:48px;" aria-hidden="true"></i></center>
			</div>
			<br><br><br>
		</div>
		<div class="col-md-4 col-md-offset-4">
			


			<div class="row">
				
					<table class="table">
	  					<thead>
					      <tr>

					        <th>
					        	<center>
					        		<button type="button" class="btn btn-success  btn-block mod1" data-toggle="modal" data-target="#adminModal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Admin</button>
					        		<br>
					        	</center>
					        </th>

					        
					      </tr>

					      <tr>

					        <th>
					        	<center>
					        		<button type="button" class="btn btn-primary  btn-block mod1" data-toggle="modal" data-target="#managerModal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Manager</button>
					        		<br>
					        	</center>
					        </th>

					        
					      </tr>

					      <tr>

					        <th>
					        	<center>
					        		<button type="button" class="btn btn-warning btn-block mod1" data-toggle="modal" data-target="#userModal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;User</button>
					        		<br>
					        	</center>
					        </th>

					        
					      </tr>
					    </thead>
					</table>
				
				
			</div>
		</div>

		<div class="modal fade" id="adminModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">
		          	Enter your Credentials (Admin)   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		          	
		          </h4>
		        </div>
		        <div class="modal-body">

		          <form method="POST">
		        	
					 <input type="text" class="form-control" placeholder="Username" name="user_id" required>
						
					 <br>
					
					 <input type="password" class="form-control" placeholder="Password" name="password" required>
					 <br>

					 <button class="btn btn-success btn-block" name="login_admin">Login</button>

		        </form>


		         
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</button>
		        </div>
		      </div>
		      
		    </div>
  		</div>

  		<div class="modal fade" id="managerModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">
		          	Enter your Credentials (Manager)   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		          	
		          </h4>
		        </div>
		        <div class="modal-body">

		          <form method="POST">
		        	
					 <input type="text" class="form-control" placeholder="Username" name="user_id" required>
						
					 <br>
					
					 <input type="password" class="form-control" placeholder="Password" name="password" required>
					 <br>

					 <button class="btn btn-success btn-block" name="login_manager">Login</button>

		        </form>


		         
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</button>
		        </div>
		      </div>
		      
		    </div>
  		</div>

  		<div class="modal fade" id="userModal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">
		          	Enter your Credentials (User)   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		          	
		          </h4>
		        </div>
		        <div class="modal-body">

		          <form method="POST">
		        	
					 <input type="text" class="form-control" placeholder="Username" name="user_id" required>
						
					 <br>
					
					 <input type="password" class="form-control" placeholder="Password" name="password" required>
					 <br>

					 <button class="btn btn-success btn-block" name="login_user">Login</button>

		        </form>


		         
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal"> <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</button>
		        </div>
		      </div>
		      
		    </div>
  		</div>



</body>
</html>