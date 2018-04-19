<?php
	session_start();

	$user = $_SESSION['username'];
	$name = $_POST['hidden_name'];
	$price = $_POST['hidden_price'];
	$string = 'python ../scripts/cart.py ' .$user." ".$name." ".$price; 
	echo $string;
	$cmd = escapeshellcmd($string);
	$add = shell_exec($cmd);
	header("Location:../home.php");

?>