<!DOCTYPE html>

<?php
	include ("settings.php");
	session_start();

	if(!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
	    header("location: login.php");
	}
?>

<html>
<head>
	<div class="w3-container w3-black">
  		<h1>Admin</h1>
	</div>
</head>	
<body>
	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%,margin-left:25%">
	  <h3 class="w3-bar-item">Menu</h3>
	  <a href="/admin.php" class="w3-bar-item w3-button">Admin</a>
	  <a href="/customers.php" class="w3-bar-item w3-button">Customers</a>
	  <a href="/products.php" class="w3-bar-item w3-button">Products</a>
	  <a href="/dba.php" class="w3-bar-item w3-button">DB Status</a>
	  <a href="/logout.php" class="w3-bar-item w3-button">Logout</a>
	</div>

	<div class ="statusclass" style="margin-left:25%;margin-right:25%;">
		<h1>DB Statuses</h1>
		<h3>Mongo</h3>
		<?php
		    //Show statuses of MongoDB, MySQL, and Elastic Search
		    $shell_stmt = shell_exec('./bashscripts/mongostatus.sh');
		    echo $shell_stmt;
		?>
		<h3>MySQL</h3>
		<?php
		    $shell_stmt = shell_exec('./bashscripts/mysqlstatus.sh');
		    echo $shell_stmt;	    
		?>
		<h3>Elastic Search</h3>
		<?php
		    $shell_stmt = shell_exec('./bashscripts/elasticstatus.sh');
		    echo $shell_stmt;
		?>
	</div><br>

	<div class ="statusclass" style="margin-left:25%;margin-right:25%;">

		<h1>Backup Services</h1>
		<form action="/phpscripts/backup.php" method="post">					
			<button type="submit">Back Up Services</button>
		</form>

	</div>
</body>

        <!-- CSS Links -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- JS Links -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</html>
