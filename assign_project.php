<?php
	require('config.php');
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

//$//stores error message of duplicate user

	  $check_unassigned_projects = mysqli_query($con,"SELECT * FROM project WHERE assigned = 0 OR manager = '$userLoggedIn'");


	  if(isset($_POST['assign']))
	  {
	  		$error_array = array();

			$project_name = strip_tags($_POST['project_name']);
		    $user_name_assigned = strip_tags($_POST['user_name_assigned']);

		    //check if this project is already assigned to the user enterd
		    $check_if = mysqli_query($con,"SELECT * FROM project_assignment WHERE project_id = '$project_name' AND user_id = '$user_name_assigned' AND manager = '$userLoggedIn'");

		    $check_if_unassigned = mysqli_query($con,"SELECT * FROM project WHERE project_id = '$project_name' AND assigned = 0");
		    if(mysqli_num_rows($check_if) > 0)
		    {
		    	array_push($error_array, "This project already assigned to the entered user!!<br>");
		    }
		    else
		    {
		    	if(mysqli_num_rows($check_if_unassigned) > 0)
		    	{
		    		$update_project = mysqli_query($con,"UPDATE project SET assigned = 1,manager = '$userLoggedIn' WHERE project_id = '$project_name' ");
		    		$insert_into_project_assignment = mysqli_query($con,"INSERT INTO project_assignment VALUES (NULL,'$project_name','$user_name_assigned','$userLoggedIn')");
		    	}
		    	else
		    	{
		    		$insert_into_project_assignment = mysqli_query($con,"INSERT INTO project_assignment VALUES (NULL,'$project_name','$user_name_assigned','$userLoggedIn')");
		    	}
		    }

		    //$password = md5($password);
		    //$_SESSION['user_id'] = $username;

		   
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
				<a href="welcome_manager.php"><button type="button" class="btn btn-danger" > <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back</button></a>
			</div>
		</div>
		<br>

		<div class="col-md-8 col-md-offset-2">
    <div class="well">
        <center><h4 style="color:green;">Unassigned or Projects previously assigned by you</h4></center>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Project</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>
            <?php
            $count = 1;
             
            while($results = mysqli_fetch_array($check_unassigned_projects)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                          echo "<tr>
                <td> ".$count++."</td>
                <td>".$results['project_id']."</td>
                 <td><button class = 'btn btn-success' name = 'assign_now' data-toggle='modal' data-target='#assign_projects'>Assign</button></td>

                </tr>";
                
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }

            ?>
            </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="assign_projects" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">
		          	Assign Pojects   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		          	
		          </h4>
		        </div>
		        <div class="modal-body">

		          <form method="POST">
		        	
					 <input type="text" class="form-control" placeholder="Project name" name="project_name" required>
						
					 <br>

					 <input type="text" class="form-control" placeholder="User to be assigned" name="user_name_assigned" required>

					 <span class="error">
		              <?php $error_array = array();if(in_array("This project already assigned to the entered user!!<br>", $error_array))  echo "This project already assigned to the entered user!!<br>";
		             ?></span>
						
					 <br>

					 <button class="btn btn-success btn-block" name="assign">Assign</button>

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

