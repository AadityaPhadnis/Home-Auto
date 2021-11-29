<?php
	session_start();
	$name = $_SESSION['name'];
    
    $con=mysqli_connect("localhost","id5123334_aadi","123456");
	mysqli_select_db($con,"id5123334_home");
	
	if (isset($_POST["sub"]))
	{
		if (empty($_POST["LED1"])){
			$d1 = 0;
		}
		else if ($_POST["LED1"] == 'on') $d1 = 1;
		
		if (empty($_POST["LED2"])){
			$d2 = 0;
		}
		else if ($_POST["LED2"] == 'on') $d2 = 1;
		
		if (empty($_POST["LED3"])){
			$d3 = 0;
		}
		else if ($_POST["LED3"] == 'on') $d3 = 1;
		
		if (empty($_POST["FAN1"])){
			$d4 = 0;
		}
		else if ($_POST["FAN1"] == 'on') $d4 = 1;
		$qry = "UPDATE user SET d1 = '$d1', d2 = '$d2', d3 = '$d3', d4 = '$d4' WHERE name = '$name' ";
		$rs = mysqli_query($con,$qry);

		if (!$rs){
			echo "<script>alert('Error')</script>";
		}		
		else{
			echo "<script>alert('Updated')</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home Automation : <?php echo $name; ?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  	<style type="text/css">
		.paddtop
		{
			background-color: rgba(24,24,24,1);
			color: #fff;
			border-radius: 5px;
		}
		.imgCover{
  				background-image: url("circuit5.gif");
  				height:70vh;
  				background-attachment: fixed;
    			background-position: center bottom;
    			background-repeat: no-repeat;
    			background-size: cover;
    			padding-top: px;
  			}
  		.body{
  			background-color: #262626;
  		}
		</style>
</head>
<body>
	<nav class = "navbar navbar-inverse navbar-fixed-top">
		<div class = 'container-fluid'>
			<div class ="navbar-header">
				<a class = 'navbar-brand' href = "index.php">Home Page</a>
				<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#menu'>
		        	<span class='icon-bar'></span>
		        	<span class='icon-bar'></span>
		        	<span class='icon-bar'></span>
	        	</button>
			</div>
			<div  class = 'nav navbar-right collapse navbar-collapse' id = 'menu'>
					<ul class="nav navbar-nav">
        				<li><a href="index.php">Home</a></li>
        				<li><a href="about.html">About</a></li>
        				<li><a href="about.html#pro">The Project</a></li>
        				<li><a href="about.html#team">Our Team</a></li>
        				<li><a href="index.php">Log out</a></li>
      				</ul>
			</div>
		</div>
	</nav>
	<div class = 'imgCover'></div>
	<div class="jumbotron paddtop">
		<center>
			<form method="post" action = "" class="form-inline">
				<div class = 'form-group'>
					<label for = "LED1" >Lamp 1</label>
					<input data-toggle = "toggle" name = 'LED1' type = "checkbox">
				</div>
				<div class = 'form-group'>
					<label for = "LED1" >Lamp 2</label>
					<input data-toggle = "toggle" name = 'LED2' type = "checkbox">
				</div>
				<div class = 'form-group'>
					<label for = "LED1" >Fan 1</label>
					<input data-toggle = "toggle" name = 'LED3' type = "checkbox">
				</div>
				<div class = 'form-group'>
					<label for = "LED1" >Fan 2</label>
					<input data-toggle = "toggle" name = 'FAN1' type = "checkbox">
				</div>
				<br><br>
				<div class = 'form-group'>
					<input type="submit" name="sub" value="Submit" class="btn btn-primary">
				</div>
			</form>
		</center>
</body>
</html>