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
					        		<button type="button" class="btn btn-success  btn-block mod1" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Admin</button>
					        		<br>
					        	</center>
					        </th>

					        
					      </tr>

					      <tr>

					        <th>
					        	<center>
					        		<button type="button" class="btn btn-primary  btn-block mod1" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;Manager</button>
					        		<br>
					        	</center>
					        </th>

					        
					      </tr>

					      <tr>

					        <th>
					        	<center>
					        		<button type="button" class="btn btn-warning btn-block mod1" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;User</button>
					        		<br>
					        	</center>
					        </th>

					        
					      </tr>
					    </thead>
					</table>
				
				
			</div>
		</div>

</body>
</html>