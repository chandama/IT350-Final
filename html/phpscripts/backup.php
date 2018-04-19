<?php
	$string = 'python ../scripts/mysqlbackup.py';
	$cmd = escapeshellcmd($string);
	shell_exec($cmd);
	if (!shell_exec($cmd)) {
		echo "There was a problem with your request";
		print "Eror!";
		header ('location:../dba.php');
	}

	else {
		print "Success!";
		header ('location:../dba.php');
	}

?>