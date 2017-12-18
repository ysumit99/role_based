<?php

$timezone = date_default_timezone_set("Asia/Kolkata");
 $con = mysqli_connect("localhost","root","","login_based");  //connection variable
 if(mysqli_connect_errno())
 {
 	echo "Failed to connect ".mysqli_connect_errno();
 }
 
 ?>