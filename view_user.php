<?php
	require('config.php');
	//error_reporting(0);
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

$manger_query = mysqli_query($con,"SELECT * FROM user WHERE manager = '$userLoggedIn' ");

?>
<!DOCTYPE html>
<html>
<head>
	<title>View User</title>
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
        <center><h4 style="color:green;">Users registered under you</h4></center>

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Projects Assigned</th>
                  </tr>
                </thead>
                <tbody>
            <?php
            $count = 1;
             
            while($results = mysqli_fetch_array($manger_query)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
            	$temp = $results['registered_user_id'];
            	$get_project_assigned = mysqli_query($con,"SELECT * FROM project_assignment WHERE user_id = '$temp' ");
            	$store_project = array();

            	while($store_query = mysqli_fetch_array($get_project_assigned))
            	{
            		array_push($store_project, $store_query['project_id']);
            	}
                          /*echo "<tr>
                <td> ".$count++."</td>
                <td>".$results['registered_user_id']."</td>
                <td>".$results['registered_user_id']."</td>
                

                </tr>";*/
                 echo '<tr>
                <td> '.$count++.'</td>
                <td>'.$results['registered_user_id'].'</td>';
                echo '<td>'; if(sizeof($store_project)== 0){ echo "No project assigned!!";}else{foreach($store_project as $value){ echo $value." | ";}} echo'</td>';
                

                echo '</tr>';
                
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }

            ?>
            </tbody>
            </table>
        </div>
    </div>

	</body>
	</html>