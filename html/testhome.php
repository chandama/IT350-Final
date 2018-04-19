<!DOCTYPE html>
<!-- 
TO DO:
Make sure that an employee is logged in before accessing this page or else redirect them
back to the login page. 

Goals:
1. Display all tables in the database similar to PHPmyadmin or sqlliteonline.com

-->
<?php
	include ("settings.php");
	session_start();

	//If session variable logged_in !true redirect to login
	/*!isset session var*/
				if($_SESSION['logged_in'] == 1) {
					$user_email = $_SESSION['username'];
				}
?>

<html>
<head >
	<div class="w3-container w3-black" style="position:fixed; width:100%;height:13%;">
  		<h1>BlueHalo Fly Shop</h1>
  		<p>
  			<?php 
				if($_SESSION['logged_in'] == 1) {
					echo "Welcome ".$_SESSION['username']."!";
				}
				else {
					echo "Welcome guest!";
				}
			?>
  		</p>
	</div>
</head>	
<body>

	<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%;top:13%;">

		<h3 class="w3-bar-item">Menu</h3>
		<?php 	if($_SESSION['logged_in'] == 1) {	?>
			<a href="/phpscripts/customer_logout.php" class="w3-bar-item w3-button">Logout</a>
		<?php	  	} else {	  ?>
		  	<a href="/customer_login.php" class="w3-bar-item w3-button">Customer Login</a>
		  	<a href="/register.php" class="w3-bar-item w3-button">Register</a>
		<?php		}	  ?>
		<a href="/productpage.php" class="w3-bar-item w3-button">Products</a>
		<a href="/cart.php" class="w3-bar-item w3-button">Cart</a>

	</div>
	<div style="margin-left:25%;">
	<br><br><br><br><br><br><br>


		<?php 


			$sql = "SELECT * FROM products";
			$result = mysqli_query($db,$sql);

			if ($result->num_rows > 0) {
				//Print the table headers

				while ($row = $result->fetch_assoc()) {
					//Insert pulled data from mysqli_query

					?>

					<div class="productdiv" style="display:inline-block;margin:10px;height:400px;width:400px;">
					<img src="<?php echo $row['image'];	?>" height="300" width ="300" style="margin-left:auto; margin-right:auto;">
						<h4 style="color:white;">
							<?php
								$product_name = $row['name'];
								$JSON = shell_exec('bash elasticadd.sh ' . $product_name);
								$array = json_decode($JSON, true);
								$parse = $array["hits"]["hits"];
								echo $row['name'];
								foreach ($parse as $key => $value) {
									echo "$" . $value["_source"]["price"];
								}	
							?>
						</h4>
						<form action="/phpscripts/additemtocart.php" method="post">			
							<input type="hidden" name="hidden_name" value="<?php echo $row['name'] ?>">
							<input type="hidden" name="hidden_price" value="<?php echo $row['price'] ?>">				
							<button type="submit">Add to Cart</button>
						</form>
					</div>

					<?php

				}
			echo "</table>";
			}
			else {
				echo "0 results";
			}
			$db->close();
		?>
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
