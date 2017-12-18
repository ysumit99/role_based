<?php
require('config.php');

$error_array = array();//stores error message of duplicate user

if(isset($_POST['create_project']))
  {
    $project_id = strip_tags($_POST['project_id']);
    

    //check if already exists
	$check_query = mysqli_query($con,"SELECT * FROM project WHERE project_id = '$project_id'");
	
	if(mysqli_num_rows($check_query) == 0)
	{
		$insert_query = mysqli_query($con,"INSERT INTO project VALUES (NULL,'$project_id')");
	}
	else
	{
		array_push($error_array, "This project already exists!!<br>");
	}
		

    

    
   }


?>
<!DOCTYPE html>
<html>
<head>
	<title>Register New Manager</title>
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

			   <?php 
					
					session_start();
					  if(isset($_SESSION['user_id'])) {
					  $userLoggedIn = $_SESSION['user_id'];
					  
					 }
					 else {
					    header("Location: login.php");
					 }
					  if(isset($_POST['logout']))
					  {
					    
					  session_destroy();
					  header('location: login.php');
					  }

				?>

		<div class = "collapse navbar-collapse">
				 
				  <div class = "nav navbar-nav navbar-right">
				    <li><a ><?php echo "Welcome " . $userLoggedIn; ?></a></li>

					   <li>
					    <form method="POST">
					      <input type="submit" class="btn btn-default navbar-btn btn-right mod1" value="logout" name="logout">
					    </form>
					  </li>
				   
				  </div>

  
  		</div>

			
			</div>
		</nav>
		<div class="row">
			<div class="col-md-2 col-md-offset-1">
				<a href="welcome_admin.php"><button type="button" class="btn btn-danger" > <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</button></a>
			</div>
		</div>
		<br>

		<div class="col-md-6 col-md-offset-3">
			<form method="POST">
		        	
					 <input type="text" class="form-control" placeholder="project name" name="project_id" required>
						<span class="error">
              <?php if(in_array("This project already exists!!<br>", $error_array))  echo "This project already exists!!<br>";
             ?></span>
					 <br>
					
					 

					 <button class="btn btn-success btn-block" name="create_project">Create Project</button>

		        </form>

		</div>



	</body>
	</html>

