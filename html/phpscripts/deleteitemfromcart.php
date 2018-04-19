<?php
	session_start();

	$user = $_SESSION['username'];
	$string = 'python ../scripts/deleteitem.py ' .$user; 
	echo $string;
	$cmd = escapeshellcmd($string);
	$add = shell_exec($cmd);
	header("Location:../home.php");

?>