<?php
session_start();
if(isset($_POST["sub"]))
{
	$con=mysqli_connect("localhost","id5123334_aadi","123456");
	mysqli_select_db($con,"id5123334_home");

	$name=$_POST["uname"];
	$pass=$_POST["upass"];

	$_SESSION['name'] = $name;

	$qry = "SELECT * FROM user WHERE name = '$name' " ;


	$rs=mysqli_query($con,$qry)or die("Error while loading");

	if(mysqli_num_rows($rs)>=1)
	{
		$rw = mysqli_fetch_assoc($rs);
		if ($rw['name'] == $name) 
		{
			
		
			if ($pass==$rw['password']  ) 
			{
				header("location:device.php");
			}
			else
			{
				echo "<script>alert('Wrong Password')</script>";
			}
		}
		else 
		{
		echo "<script>alert('User Name Does Not Exits')</script>";
		}
	}
	
}
?>	
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home Automation</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  		<style type="text/css">
  			.Cover{
  				background-image: url("circuit8.png");
  				height:100vh;
  				background-attachment: fixed;
    			background-position: center center;
    			background-repeat: no-repeat;
    			background-size: cover;
    			padding-top: 128px;
 	       		padding-right: 16px;
    	    	padding-bottom: 128px;
        		padding-left: 16px;
				font-weight: bold;
  				font-family: "Montserrat","Rockwell","Verdana",sans-serif;
  				color: #fff;
  			}
  			.log{
  				background-color: #00141a;
  				color: white;
  			}
  		
  		</style>
	</head>
	<body>
		<nav class = 'navbar navbar-inverse navbar-fixed-top'>
			<div class = 'container-fluid'>
				<div class = 'navbar-header'>
					<a class = 'navbar-brand' href = "#">Home Page</a>
					<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#menu'>
		        		<span class='icon-bar'></span>
		        		<span class='icon-bar'></span>
		        		<span class='icon-bar'></span>
	        		</button>
				</div>

				<div  class = 'nav navbar-right collapse navbar-collapse' id = 'menu'>
					<ul class="nav navbar-nav">
        				<li class="active"><a href="#">Home</a></li>
        				<li><a href="about.html">About</a></li>
        				<li><a href="about.html#pro">The Project</a></li>
        				<li><a href="about.html#team">Our Team</a></li>
      				</ul>
				</div>
			</div>
		</nav>
		<div class = 'Cover'>
			<center>
				<div class = "container-fluid">
					<h3 font-family:serif;">IoT based</h3>
					<br>
					<h1>HOME AUTOMATION</h1>
					<br><br><br> 
					<button type="button" class="btn btn-primary btn-lg" onclick = "location.href='#lgin'">Proceed to Login</button>

				</div>
			</center>
				
		</div>
		<div class = "container-fluid jumbotron log">
				<center>
					<h4 id = "lgin">Login Details</h4>
					<form class= "form-inline" method="post" action="">
						<div class = 'form-group'>
							<div class ="form-group">
								<label for ='uname'>Username:</label>
								<input type = 'text' name = 'uname' class = 'form-control'>
							</div>
							<div class = "form-group">
								<label for = 'upass'>Password:</label>
								<input type="password" name="upass" class = 'form-control'>
							</div>
							<div class = "form-group">
								<input type="submit" name="sub" class="btn btn-default" value="Login">
							</div>
						</div>
					</form>
				</center>
		</div>
	</body>
</html>